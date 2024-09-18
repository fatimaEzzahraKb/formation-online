<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories  = Category::with('users','souscategories','formations')->get();

        return response()->json( ['categories'=>$categories]);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'nom'=>'required|string|unique:categories',
            'description'=>'required | string',
        ]);
        if(!$validate->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validate->messages()   
            ]);
        }
        else {
            $category= Category::create([
                "nom"=>$request->nom,
                "description"=>$request->description,
            ]);
            return response()->json([
                'status'=>200,
                'category'=>$category
            ]);
        }
    }
    public function show($id){
        $category = Category::with('users','souscategories','formations')->find($id);
        if(!$category){
          return response()->json([
            'status'=>404,
            'message'=>'Catégorie Non trouvé'
          ]);  
        }
        else{
            return response()->json([
                'category'=>$category
            ]);
        }
    }
    public function update(Request $request , $id){
        $validate = Validator::make($request->all(),[
            'nom'=>'string|unique:categories,nom'.$id,
            'description'=>'required | string',

        ]);
        $category =  Category::findOrFail($id);
        if(!$category){
            return response()->json([
                'status'=>404,
                'message'=>'Catégorie non trouvé'
            ]);

        }
        else{
            $category->update([
                'nom'=>$request->nom,
                'description'=>$request->description,
            ]);
            $category->save();
            return response()->json([
                'status'=>200,
                'message'=>'Catégorie modifié avec succée '
            ]);
            
        };
    }
    public function delete( $id){
        $category = Category::findOrFail($id)
        ;
        $category->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Category deleted successfully'
        ]); 
    }
}
