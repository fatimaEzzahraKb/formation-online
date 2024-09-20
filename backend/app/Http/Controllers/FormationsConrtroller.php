<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Formations;
class FormationsConrtroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $formations  = Formation::with('category','souscategory','histores','videos')->get();

        return response()->json( ['formations'=>$formations]);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'titre'=>'required|string|unique:formatuions',
            'description'=>'required | string',
            'image_url'=>'required  |image|mimes:jpeg,png,jpg,gif,webp',
            'category_id'=>'required  | exists: categories,id',
            'souscategory_id'=>'required  | exists: souscategories,id',
        ]);
        if(!$validate->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validate->messages()   
            ]);
        }
        else {
            $image_path = $request->file('image_url')->store('images','public');
            $formation= Formation::create([
                "titre"=>$request->titre,
                "description"=>$request->description,
                "image_url"=>$image_path,
                "category_id"=>$request->category_id,
                "souscategory_id"=>$request->souscategory_id,
            ]);
            return response()->json([
                'status'=>200,
                'formation'=>$formation
            ]);
        }
    }
    public function show($id){
        $formation = Formation::with('category','souscategory','histores','videos','videos')->find($id)->get();
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
