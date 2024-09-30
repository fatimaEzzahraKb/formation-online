<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Souscategory;
class SouscategoryController extends Controller
{
    public function index(){
        $souscategories  = Souscategory::with('user','category','formations')->get();

        return response()->json( ['souscategories'=>$souscategories]);
    }
    public function store(Request $request){
        Log::info($request->all());
        $request->validate([
            'nom'=>'required|string|unique:souscategories',
            'description'=>'required | string',
            'category_id'=>'required|integer|exists:categories,id'
        ]);
            Souscategory::create([
                "category_id"=>$request->category_id,
                "nom"=>$request->nom,
                "description"=>$request->description,
            ]);
            return redirect()->route('categories.index');
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
        $request->validate([
            'nom'=>'string|unique:souscategories,nom,   '.$id,
            'description'=>'required | string',
        ]);
        $souscategory =  Souscategory::findOrFail($id);
        if(!$souscategory){
            return redirect()->route('notfound');
        }
        else{
            $souscategory->update([
                'nom'=>$request->nom,
                'description'=>$request->description,
            ]);
            $souscategory->save();
            return redirect()->route('categories.index');
            
        };
    }
    public function destroy( $id){
        $souscategory = Souscategory::findOrFail($id);
        $souscategory->delete();
        return redirect()->route('categories.index'); 
    }
}
