<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Category;
use App\Models\Souscategory;
use App\Models\User;
use App\Models\Favoris;
use Illuminate\Support\Facades\Log;

class UserPagesController extends Controller
{
    public function acceuil(){
        $formations= Formation::with('category','souscategory')->get();
        $favoris  = Favoris::with('user','formation')->where('user_id',Auth::user()->id)->get();
        
        return view('user/index',compact('formations','favoris'));
    }
    public function subcategory_show($id){
        
        $souscategory = Souscategory::with('formations','category')->find($id);
        return view('user/subcategory_courses',compact('souscategory'));
        
    }

    public function formation_show(Request $request, $id){
        $formation = Formation::with('category','souscategory','videos')->find($id);
        $souscategoriesIds = Auth::user()->souscategoriesList->pluck('id')->toArray();
        $favorite = Favoris::where('formation_id',$formation->id)->where('user_id',Auth::user()->id)->first();
        if(!in_array($formation->souscategory_id,$souscategoriesIds) || !$formation){
            return view('notfound');
        }
        $isFavorite = $favorite ? true : false ;
        $fromSubCat = $request->has('fromSubCat') ? true : false;
        return view('user/formation_show',compact('formation','fromSubCat','isFavorite','favorite'));
    }
    public function search(Request $request){
        $query = $request->input('query');
        $souscategoriesIds = Auth::user()->souscategoriesList->pluck('id')->toArray();

        $results = Formation::where('titre','LIKE',"%{$query}%")->whereIn('souscategory_id',$souscategoriesIds)->get();

        return response()->json($results);
    }

}
