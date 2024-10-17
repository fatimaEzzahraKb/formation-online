<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories  = Category::with('users','formations','souscategories')->get();

        return view('admin/categories')->with(['categories'=>$categories]);
    }
    public function create(){
        return view('admin/category_add');
    }
    public function store(Request $request){
        $request->validate([
            'nom'=>'required|string|unique:categories',
            'description'=>'required|string',
        ],[
            'nom.required'=>'Le nom est requis.',
            'nom.string'=>'Le nom doit être au format de caractères.',
            'nom.unique'=>'Le nom doit être unique.',
            'description.required'=>'Le description est requise.',
            'description.string'=>'La description doit être au format de caractères.'
        ]);
            $category= Category::create([
                "nom"=>$request->nom,
                "description"=>$request->description,
            ]);
            toast('Catégorie ajoutée avec succés!','success')->autoClose(2500);
            return redirect()->route('categories.index');
        
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
            return redirect()->route('notfound');

        }
        else{
            $category->update([
                'nom'=>$request->nom,
                'description'=>$request->description,
            ]);
            $category->save();
            toast('Catégorie modifiée avec succés!','success')->autoClose(2500);
            return back();

            
        };
    }
    public function destroy( $id){
        $category = Category::findOrFail($id);
        foreach($category->souscategories as $soucategory){
            $soucategory->formations()->delete();
        }
        $category->souscategories()->delete();
        $category->delete();
        toast('Catégorie suuprimée avec succés!','success')->autoClose(2500);
        return back(); 
    }
}
