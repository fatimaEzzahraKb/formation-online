<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Formation;
use App\Models\FormationVideo;
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
        $formations  = Formation::with('category','souscategory','histories','videos')->get();
        return view('admin/formations')->with(['formations'=>$formations]);
    }
    public function create(){
        $categories = Category::with('souscategories')->get();
        return view('admin/formations_add')->with('categories',$categories);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'titre' => 'required|string|unique:formations',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'category_id' => 'required|exists:categories,id',
            'souscategory_id' => 'required|exists:souscategories,id',
            'videos' => 'sometimes|array',
            'videos.*.video' => 'sometimes|file',
            'videos.*.titre' => 'sometimes|string',
            'videos.*.ordre' => 'sometimes|integer|min:1',
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
            'videos.required' => 'Vous devez saisir au moins une vidéo.',
            'videos.array' => 'Les vidéos doivent être un tableau.',
            'videos.*.file' => 'Chaque vidéo doit être un fichier.'
        ]);
        
        $imagePath = $request->file('image_url')->store('images', 'public');
            $formation= Formation::create([
                "titre"=>$request->titre,
                "description"=>$request->description,
                "image_url"=>$imagePath,
                "category_id"=>$request->category_id,
                "souscategory_id"=>$request->souscategory_id,
            ]);
            
                
            foreach($request->videos as $videoData){
                $orders = collect($request->videos)->pluck('ordre');
                if ($orders->count() !== $orders->unique()->count()) {
                    return redirect()->back()->withErrors(['videos.*.ordre' => 'Les ordres des vidéos doivent être uniques.'])->withInput();
                }
                $video = $videoData['video'];
                if (isset($videoData) && $video && $video->isValid()) 
                {
                    $videoUri = $this->vimeoService->uploadVideo($video);
                }
                FormationVideo::create([
                    'video_path'=>$videoUri,
                    'formation_id'=>$formation->id,
                    'titre'=>$videoData['titre'],
                    'ordre'=>$videoData['ordre']
                ]);
            };

            return $this->index();
        
    }
    public function show($id){
        $formation = Formation::with('category','souscategory','histories','videos')->find($id)    ;
        if(!$formation){
          return response()->json([
            'status'=>404,
            'message'=>'Formation Non trouvé'
          ]);  
        }
        return view('admin/formation_show')->with('formation',$formation);
        
    }
    public function edit($id){
        $formation = formation::with('category','souscategory','histories','videos')->find($id);
        return view('admin/formation_update')->with('formation',$formation);
    }
    public function update(Request $request , $id){
        $validate = Validator::make($request->all(),[
            'titre'=>'sometimes|string||unique:formations,titre,' . $formation->id,
            'description'=>'sometimes| string',
            'image_url'=>'sometimes|image|mimes:jpeg,png,jpg,gif,webp',
            'category_id'=>'sometimes|exists:categories,id',
            'souscategory_id'=>'sometimes|exists:souscategories,id',
        ]);
        
        $formation =  Formation::findOrFail($id);
        if(!$formation){
            return response()->json([
                'status'=>404,
                'message'=>'Formation non trouvé'
            ]);

        }
        else{
          
            $formation->update($request->only(['titre', 'description', 'category_id', 'souscategory_id']));
            if ($request->file('image_url')) {
                $formation->image_url = $request->file('image_url')->store('images', 'public');
            }
            
            $formation->save();
            return $this->index();     

    }
}

    public function destroy( $id){
        $videos = FormationVideo::where('formation_id',$id)->delete(); 
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return $this->index();
    }
    public function add_videos(Request $request, $id){
        Log::info($request->all());
        $validateData = $request->all([
            'videos' => 'required|array',
            'videos.*.video' => 'required|file',
            'videos.*.titre' => 'required|string',
            'videos.*.ordre' => 'required|integer|min:1',
        ],[
            'videos.*.ordre' => 'chaque video doit avoir un ordre spécifié',
            'videos.*.titre' => 'Chaque vidéo doit avoir un titre'
        ]);
        foreach($request->videos as $videoData){
            $orders = collect($request->videos)->pluck('ordre');
            if ($orders->count() !== $orders->unique()->count()) {
                return redirect()->back()->withErrors(['videos.*.ordre' => 'Les ordres des vidéos doivent être uniques.'])->withInput();
            }
            $video = $videoData['video'];
            if (isset($videoData) && $video && $video->isValid()) 
            {
                $videoUri = $this->vimeoService->uploadVideo($video);
            }
            FormationVideo::create([
                'video_path'=>$videoUri,
                'formation_id'=>$id,
                'titre'=>$videoData['titre'],
                'ordre'=>$videoData['ordre']
            ]);
        };
        return $this->show($id);
    }
}
