<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Souscategory;
class SouscategoryController extends Controller
{
    public function index(){
        $souscategories  = Souscategory::with('user','category','formations')->get();

        return response()->json( ['souscategories'=>$souscategories]);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'nom'=>'required|string|unique:souscategories',
            'description'=>'required | string',
        ]);
        if(!$validate->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validate->messages()   
            ]);
        }
        else {
            $souscategory= Souscategory::create([
                "nom"=>$request->nom,
                "description"=>$request->description,
            ]);
            return response()->json([
                'status'=>200,
                'souscategory'=>$souscategory
            ]);
        }
    }
    public function show($id){
        $souscategory = Souscategory::with('users','category','formations')->find($id);
        if(!$souscategory){
          return response()->json([
            'status'=>404,
            'message'=>'Catégorie Non trouvé'
          ]);  
        }
        else{
            return response()->json([
                'souscategory'=>$souscategory
            ]);
        }
    }
    public function update(Request $request , $id){
        $validate = Validator::make($request->all(),[
            'nom'=>'string|unique:souscategories,nom'.$id,
            'description'=>'required | string',

        ]);
        $souscategory =  Souscategory::findOrFail($id);
        if(!$souscategory){
            return response()->json([
                'status'=>404,
                'message'=>'Catégorie non trouvé'
            ]);

        }
        else{
            $souscategory->update([
                'nom'=>$request->nom,
                'description'=>$request->description,
            ]);
            $souscategory->save();
            return response()->json([
                'status'=>200,
                'message'=>'Catégorie modifié avec succée '
            ]);
            
        };
    }
    public function delete( $id){
        $souscategory = Souscategory::findOrFail($id)
        ;
        $souscategory->delete();
        return response()->json([
            'status'=>200,
            'message'=>'souscategory deleted successfully'
        ]); 
    }
}
