<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Formation;
use App\Models\FormationVideo;
class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'titre'=>'required|string|unique:formations',
            'description'=>'required|string',
            'image_url'=>'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
            'category_id'=>'required|exists:categories,id',
            'souscategory_id'=>'required|exists:souscategories,id',
            'videos'=>'required|array',
            'videos.*' => 'file|max:20480'
        ]);
            $file = $request->file('image_url');
            $name = $request->file('image_url')->getClientOriginalName();
            $image_path =$file ->storeAs($name,'public');
            $formation= Formation::create([
                "titre"=>$request->titre,
                "description"=>$request->description,
                "image_url"=>$image_path,
                "category_id"=>$request->category_id,
                "souscategory_id"=>$request->souscategory_id,
            ]);
            
            foreach($request->videos as $video){
                $file = $video->getClientOriginalName();
                $video_path = $file->store->store('videos', ['disk' => 'my_files']);
                FormationVideo::create([
                    'video_path'=>$video_path,
                    'formation_id'=>$formation->id
                ]);
            };

            return $this->index();
        
    }
    public function show($id){
        $formation = Formation::with('category','souscategory','histories','videos','videos')->find($id)->get();
        if(!$formation){
          return response()->json([
            'status'=>404,
            'message'=>'Formation Non trouvé'
          ]);  
        }
        else{
            return response()->json([
                'formation'=>$formation
            ]);
        }
    }
    public function update(Request $request , $id){
        $validate = Validator::make($request->all(),[
            'titre'=>'string||unique:formations,titre,' . $formation->id,
            'description'=>' string',
            'image_url'=>'image|mimes:jpeg,png,jpg,gif,webp',
            'category_id'=>'  exists: categories,id',
            'souscategory_id'=>'  exists: souscategories,id',

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
        return response()->json([
            'status'=>200,
            'message'=>'Formation  modifié avec succée',
            'formation'=>$formation
        ]);
        };     

    }
    public function delete( $id){
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Formation supprimée avec succée'
        ]); 
    }
}
