<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Favoris;
class FavorisController extends Controller
{
    //
    public function userfavoris(){
        $favoris  = Favoris::with('users','formation')->where(auth()->id(),'user_id')->get();

        return response()->json( ['favoris'=>$favoris]);
    }
    public function store(Request $request){
        
            $favoris= Favoris::create([
                "user_id"=>$request->user_id,
                "formation_id"=>$request->formation_id,
            ]);
            return response()->json([
                'status'=>200,
                'favoris'=>$favoris
            ]);
        
    }
    
    public function delete( $id){
        $favoris = Favoris::findOrFail($id);
        $favoris->delete();
        return response()->json([
            'status'=>200,
            'message'=>'favoris deleted successfully'
        ]); 
    }
}
