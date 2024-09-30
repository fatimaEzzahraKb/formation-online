<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\VimeoService;
use App\Models\FormationVideo;

class FormationVideoController extends Controller
{
    protected $vimeoService;

    public function __construct(VimeoService $vimeoService){
        $this->vimeoService = $vimeoService;
    }
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
    public function edit($id){
        $video = FormartionVideo::with('formation')->find($id);
        return view('admin/video_update')->with('video',$video);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'formation_id'=>'required | exists: formations,id',
            'video_url'=>'sometimes|file|mimes:mp4,mov,avi,wmv',
            'titre'=>'string',
            'ordre'=>'number|min:1'
        ]);
        $video =  FormationVideo::findOrFail($id);
        if(!$video){
            return response()->json([
                'status'=>404,
                'message'=>'video non trouvé'
            ]);

        }
        else{
            $existingVideo = FormationVideo::where('formation_id',$video->formation_id)
            ->where('ordre',$request->ordre)
            ->where('id','!=',$id)
            ->first();
            if($existingVideo){
                return redirect()->back()->withErrors(['order'=>'Il y a déjà une vidéo de cette ordre']);
            }
            $video->update($request->only(['titre', 'ordre']));
            if (isset($request->video)  && $request->video->isValid()) 
            {
                $videoUri = $this->vimeoService->uploadVideo($request->video);
                $video->video_path = $videoUri ;
            }
            
        
        $video->save();
        return redirect()->route("formations.show",$video->formation_id);
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = FormationVideo::findOrFail($id);
        $formation_id = $video->formation_id;
        $this->vimeoService->deleteVideo($video->video_path);
        $video->delete();
        return redirect()->route("formations.show",$formation_id);
    
    }
    public function show_course_videos($formation_id){
        $videos = FormationVideo::where('formation_id',$formation_id)->get();
        return view('admin/fomation_videos')->with('videos',$videos);

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
