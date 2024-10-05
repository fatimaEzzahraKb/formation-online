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
            alert()->success('Ajoutée aux favoris', 'La formation a été ajouté à votre favoris ')->position('middle');

            return back();
        
    }
    
    public function destroy( $id){
        $favoris = Favoris::findOrFail($id);
        $favoris->delete();
            alert()->success('Supprimée des favoris', 'La formation a été supprimé de votre favoris')->position('middle');
            return back(); 
    }
}
