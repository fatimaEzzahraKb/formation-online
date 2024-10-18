<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormationAudio;
use App\Models\Audio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FormationAudioController extends Controller
{
    //
    
        public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'titre'=>'string|nullable',
            'lien_video'=>'string|nullable',
            'ordre'=>'number|min:1|nullable'
        ]);

        $audio =  Audio::findOrFail($id);
        if(!$audio){
            return response()->json([
                'status'=>404,
                'message'=>'audio non trouvé'
            ]);

        }
        else{
            $audio->update($request->only('titre'));
            $audio->save();
            $audio_formation = FormationAudio::findOrFail($request->pivot_id);
            $existingAudio = FormationAudio::where('formation_id',$audio->formation_id)
            ->where('ordre',$request->ordre)
            ->where('id','!=',(int)$id)
            ->first();
            if($existingAudio){
                return redirect()->back()->withErrors(['order'=>'Il y a déjà une vidéo de cette ordre']);
            }
            $audio_formation->update($request->only(['ordre']));
            $audio_formation->save();

            toast('Audio modifié avec succés!','success')->autoClose(2500);
            return redirect()->back();
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $audios_formations = FormationAudio::where('audio_id',$id)->get();
        foreach($audios_formations as $audio_formation){
            $audio_formation->delete();
        }
        
        $audio = Audio::findOrFail($id);
        
        Storage::disk('public')->delete($audio->audio_path);
        
        $audio->delete();
        toast('Audio supprimée avec succés!','success')->autoClose(2500);
        
        return back();
    
    }
}
