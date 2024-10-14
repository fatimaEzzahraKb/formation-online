<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Formation;
use App\Models\FormationVideo;
use App\Models\FormationAudio;
use App\Services\VimeoService;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $vimeoService;

    public function __construct(VimeoService $vimeoService){
        $this->vimeoService = $vimeoService;
    }
    public function index(){
        $formationsAudios  = Formation::with('category','souscategory','videos','audios')->where('type',"audio")->get();
        $formationsVideos  = Formation::with('category','souscategory','videos','audios')->where('type',"vidéo")->get();
        return view('admin/formations')->with(['formationsVideos'=>$formationsVideos,"formationsAudios"=>$formationsAudios]);
    }
    public function create(){
        $categories = Category::with('souscategories')->get();
        return view('admin/formations_vid_add')->with('categories',$categories);
    }
    public function create_audio(){
        $categories = Category::with('souscategories')->get();
        return view('admin/formations_audio_add')->with('categories',$categories);
    }
    public function store(Request $request){
        Log::info($request->all());
        $validateData = $request->validate([
            'titre' => 'required|string|unique:formations',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'category_id' => 'required|exists:categories,id',
            'souscategory_id' => 'required|exists:souscategories,id',
            'videos' => 'sometimes|array',
            'videos.*.video' => 'file|nullable',
            'videos.*.titre' => 'string|nullable',
            'videos.*.ordre' => 'integer|nullable|min:1',
            'audios' => 'sometimes|array',
            'audios.*.audio' => 'file|nullable',
            'audios.*.titre' => 'string|nullable',
            'audios.*.ordre' => 'integer|nullable|min:1',
            ], [
                'titre.required' => 'Le titre est requis.',
                'titre.string' => 'Le titre doit être une chaîne de caractères.',
                'titre.unique' => 'Le titre doit être unique.',
                'description.required' => 'La description est requise.',
                'description.string' => 'La description doit être une chaîne de caractères.',
                'image_url.required' => 'L\'image est requise.',
                'image_url.image' => 'Le fichier doit être une image.',
                'image_url.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou webp.',
                'image_url.max' => 'L\'image ne peut pas dépasser 20 Mo.',
                'category_id.required' => 'La catégorie est requise.',
                'category_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
                'souscategory_id.required' => 'La sous-catégorie est requise.',
                'souscategory_id.exists' => 'La sous-catégorie sélectionnée n\'existe pas.',
                'videos.*.file' => 'Chaque vidéo doit être un fichier.'
        ]);
        
        $imagePath = $request->file('image_url')->store('images', 'public');
            $formation= Formation::create([
                "titre"=>$request->titre,
                "description"=>$request->description,
                "image_url"=>$imagePath,
                "category_id"=>$request->category_id,
                "souscategory_id"=>$request->souscategory_id,
                "type"=>$request->type,
            ]);
        Log::info($formation);

        if($request->type==="vidéo"){
            if($request->videos)  {  
            foreach($request->videos as $videoData){
                $orders = collect($request->videos)->pluck('ordre');
                if ($orders->count() !== $orders->unique()->count()) {
                    return redirect()->back()->withErrors(['videos.*.ordre' => 'Les ordres des vidéos doivent être uniques.'])->withInput();
                }
                $video = $videoData['video'];
                if (isset($videoData) && $video && $video->isValid()) 
                {
                    $videoUri = $video->store('videos', 'public');
                    FormationVideo::create([
                        'video_path'=>$videoUri,
                        'formation_id'=>$formation->id,
                        'titre'=>$videoData['titre'],
                        'ordre'=>$videoData['ordre']
                    ]);
                }
            };
            }
        }
        elseif($request->type==="audio") {
            if($request->audios)  {  
                foreach($request->audios as $audioData){
                    $orders = collect($request->audios)->pluck('ordre');
                    if ($orders->count() !== $orders->unique()->count()) {
                        return redirect()->back()->withErrors(['audios.*.ordre' => 'Les ordres des vidéos doivent être uniques.'])->withInput();
                    }
                    $audio = $audioData['audio'];
                    if (isset($audioData) && $audio && $audio->isValid()) 
                    {
                        $audio_path = $audio->store('audios', 'public');
                        FormationAudio::create([
                            'audio'=>$audio_path,
                            'formation_id'=>$formation->id,
                            'titre'=>$audioData['titre'],
                            'ordre'=>$audioData['ordre']
                        ]);
                    }
                };
                }
                
            }
            toast('Formation ajourtée avec succés!','success')->autoClose(2500);

            return $this->index();
        
    }
    public function show($id){
        $formation = Formation::with('category','souscategory','videos','audios')->find($id)    ;
        if(!$formation){
          return response()->json([
            'status'=>404,
            'message'=>'Formation Non trouvé'
          ]);  
        }
        if($formation->type==="audio"){
            return view('admin/formation_audio_show')->with('formation',$formation);
        }
        return view('admin/formation_vid_show')->with('formation',$formation);
        
    }
    public function edit($id){
        $formation = formation::with('category','souscategory','videos','audios')->find($id);
        $categories = Category::with('souscategories')->get();
        return view('admin/formation_update')->with(['formation' => $formation, 'categories' => $categories]);
    }
    public function update(Request $request , $id){
        $validate = Validator::make($request->all(),[
            'titre'=>'sometimes|string||unique:formations,titre,' . $id,
            'description'=>'sometimes| string',
            'image_url'=>'sometimes|image|mimes:jpeg,png,jpg,gif,webp',
            'category_id'=>'sometimes|exists:categories,id',
            'souscategory_id'=>'sometimes|exists:souscategories,id',
        ]);
        
        $formation =  Formation::findOrFail($id);
        if(!$formation){
            return redirect()->route('notfound');

        }
        else{
          
            $formation->update($request->only(['titre', 'description']));
            if ($request->file('image_url')) {
                $formation->image_url = $request->file('image_url')->store('images', 'public');
            }
            if($request->category_id !== null){
                $formation->category_id = $request->category_id;
                $formation->souscategory_id = $request->souscategory_id;
            }
            $formation->save();
            toast('Formation modifiée avec succés!','success')->autoClose(2500);
            return $this->index();    

    }
}

    public function destroy( $id){
        $formation = Formation::findOrFail($id);
        $formation->delete();
        toast('Formation supprimée avec succés!','success')->autoClose(2500);

        return $this->index();
    }
    public function add_videos(Request $request, $id){
       $request->validate([
            'videos' => 'required|array',
            'videos.*.video' => 'required|file',
            'videos.*.titre' => 'required|string',
            'videos.*.ordre' => 'required|integer|min:1',
        ],[
            'videos.*.ordre' => 'chaque video doit avoir un ordre spécifié',
            'videos.*.titre' => 'Chaque vidéo doit avoir un titre'
        ]);
        foreach($request->videos as $videoData){
            $existingVideo = FormationVideo::where('formation_id',$id)
            ->where('ordre',$videoData['ordre'])
            ->first();
            if($existingVideo){
                return redirect()->back()->withErrors(['order'=>'Il y a déjà une vidéo de cette ordre']);
            }
            
            $video = $videoData['video'];
            if (isset($videoData) && $video && $video->isValid()) 
            {
                $videoUri = $video->store('videos', 'public');
                FormationVideo::create([
                    'video_path'=>$videoUri,
                    'formation_id'=>$id,
                    'titre'=>$videoData['titre'],
                    'ordre'=>$videoData['ordre']
                ]);
            }
        };
        toast('Vidéo ajourtée avec succés!','success')->autoClose(2500);

        return back();
    }
    public function add_audios(Request $request, $id){
        $request->validate([
             'audios' => 'required|array',
             'audios.*.audio' => 'required|file',
             'audios.*.titre' => 'required|string',
             'audios.*.ordre' => 'required|integer|min:1',
         ],[
             'audios.*.ordre' => 'chaque audio doit avoir un ordre spécifié',
             'audios.*.titre' => 'Chaque audio doit avoir un titre'
         ]);
         foreach($request->audios as $audioData){
             $existingAudio = FormationAudio::where('formation_id',$id)
             ->where('ordre',$audioData['ordre'])
             ->first();
             if($existingAudio){
                 return redirect()->back()->withErrors(['order'=>'Il y a déjà un audio de cette ordre']);
             }
             
             $audio = $audioData['audio'];
             if (isset($audioData) && $audio && $audio->isValid()) 
             {
                 $audio_path = $audio->store('audios', 'public');
                FormationAudio::create([
                     'audio'=>$audio_path,
                     'formation_id'=>$id,
                     'titre'=>$audioData['titre'],
                     'ordre'=>$audioData['ordre']
                 ]);
             }
         };
         toast('Audio ajourtée avec succés!','success')->autoClose(2500);

         return back();
     }
}
