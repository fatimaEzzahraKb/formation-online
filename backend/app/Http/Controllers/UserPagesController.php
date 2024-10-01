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
        $formations = Formation::with('category','souscategory')->get();
        return view('user/index',compact('formations'));
    }
    public function subcategory_show($id){

    }
    public function formation_show($id){
        $formation = Formation::with('category','souscategory','histories','videos')->find($id);
        $souscategoriesIds = Auth::user()->souscategoriesList->pluck('id')->toArray();
        if(!in_array($formation->souscategory_id,$souscategoriesIds) || !$formation){
            return view('notfound');
        }
        return view('user/formation_show',compact('formation'));
    }
    public function search_bar(){
        
    }
    public function favoris_show(){
        
    }
}
