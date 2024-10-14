<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormationAudio;
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
        $audio =  FormationAudio::findOrFail($id);
        if(!$audio){
            return response()->json([
                'status'=>404,
                'message'=>'audio non trouvé'
            ]);

        }
        else{
            $existingAudio = FormationAudio::where('formation_id',$audio->formation_id)
            ->where('ordre',$request->ordre)
            ->where('id','!=',(int)$id)
            ->first();
            if($existingAudio){
                return redirect()->back()->withErrors(['order'=>'Il y a déjà une vidéo de cette ordre']);
            }
            $audio->update($request->only(['titre', 'ordre','lien_video']));
            
        $audio->save();
        toast('Audio modifié avec succés!','success')->autoClose(2500);
        return redirect()->back();
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $audio = FormationAudio::findOrFail($id);
        $formation_id = $audio->formation_id;
        Storage::disk('public')->delete($audio->audio);

        $audio->delete();
        toast('Audio supprimée avec succés!','success')->autoClose(2500);
        
        return back();
    
    }
}
