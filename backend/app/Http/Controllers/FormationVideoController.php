<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormationVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formation_videos  = FormationVideo::with('formation')->get();

        return response()->json( ['formation_videos'=>$formation_videos]);
    }

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
    public function show(string $id)
    {
        $video = FormationVideo::with('formation')->find($id);
        if(!$video){
          return response()->json([
            'status'=>404,
            'message'=>'video Non trouvé'
          ]);  
        }
        else{
            return response()->json([
                'video'=>$video
            ]);
        }
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'formation_id'=>'required | exists: formations,id',
            'video_url'=>'  file|mimes:mp4,mov,avi,wmv',

        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validate->messages()
            ]);
        }
        $video =  FormationVideo::findOrFail($id);
        if(!$video){
            return response()->json([
                'status'=>404,
                'message'=>'video non trouvé'
            ]);

        }
        else{
            $video->formation_id = $request->formation_id;

        if ($request->file('video_url')) {
            $video->video_path = $request->file('video_url')->store('videos', 'public');
        }
    
        
        $video->save();
        return response()->json([
            'status'=>200,
            'message'=>'video  modifié avec succée',
            'video'=>$video
        ]);
        };     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = FormationVideo::findOrFail($id);
        $video->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Video supprimée avec succès'
        ]);
    
    }
}
