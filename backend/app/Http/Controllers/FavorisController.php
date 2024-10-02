<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Favoris;
class FavorisController extends Controller
{
    //
    public function index(){
        $favoris  = Favoris::with('user','formation')->where('user_id',Auth::user()->id)->get();
        
            return view('user/favoris',compact('favoris'));
        
    }
    public function store(Request $request){
        
            $favoris= Favoris::create([
                "user_id"=>Auth::user()->id,
                "formation_id"=>$request->formation_id,
            ]);
            return back();
        
    }
    
    public function destroy( $id){
        $favoris = Favoris::findOrFail($id);
        $favoris->delete();
        return back(); 
    }
}
