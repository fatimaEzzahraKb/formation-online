<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Services\VimeoService;
use App\Models\FormationVideo;
use App\Models\Video;

class FormationVideoController extends Controller
{
    protected $vimeoService;

    public function __construct(VimeoService $vimeoService){
        $this->vimeoService = $vimeoService;
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'formation_id'=>'required | exists: formations,id',
            'video_url'=>'required  |file|mimes:mp4,mov,avi,wmv',
        ]);
        if(!$validate->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validate->messages()   
            ]);
        }
        else {
            $video_path = $request->file('video_url')->store('videos','public');
            $formation_video= FormationVideo::create([
                'formation_id'=>$request->formation_id,
                "video_path"=>$video_path,
            ]);
            return response()->json([
                'status'=>200,
                'formation_video'=>$formation_video
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'titre'=>'string|nullable',
            'ordre'=>'number|min:1|nullable'
        ]);
        $video =  Video::findOrFail($id);
        $video->update($request->only('titre'));
        $video->save();
        if(!$video){
            return response()->json([
                'status'=>404,
                'message'=>'video non trouvé'
            ]);

        }
        else{
            $video_formation = FormationVideo::findOrFail($request->pivot_id);
            $existingVideo = FormationVideo::where('formation_id',$video_formation->formation_id)
            ->where('order',$request->order)
            ->where('id','!=',(int)$request->pivot_id)
            ->first();
            if($existingVideo){
                return redirect()->back()->withErrors(['order'=>'Il y a déjà une vidéo de cette ordre']);
            }
            else{
            $video_formation->update($request->only('order'));
            $video_formation->save();
        }
            
    
        toast('Vidéo modifié avec succés!','success')->autoClose(2500);
        return back();
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        
        Storage::disk('public')->delete($video->video_path);
        
        $video->delete();
        toast('Vidéo supprimée avec succés!','success')->autoClose(2500);
        
        return back();
    
    }
    public function show_course_videos($formation_id){
        $videos = FormationVideo::where('formation_id',$formation_id)->get();
        return back();

    }
    public function initialize_course($formation_id){
        $videos = FormationVideo::where('formation_id',$formation_id)->delete();
        return route('formations.index');
    }
    public function add_coursevideos(Request $request){
        $validate = $request->validate([
            'formation_id'=>'required|exists: formations,id',
            'video_url'=>'required|file|mimes:mp4,mov,avi,wmv',
        ]);
        $videoUri = $this->vimeoService->uploadVideo($video);
        FormationVideo::create([
            'video_path'=>$videoUri,
            'formation_id'=>$formation->id
        ]);
    }
}
