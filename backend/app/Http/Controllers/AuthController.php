<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Souscategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
    
class AuthController extends Controller
{
    //

    public function register(Request $request){
        $validatedData =Validator::make($request->all(),[
            'username' =>"required|string|unique:users",
            'email' => "required|string|unique:users",
            'password' => "required|string",
            'permission' => "required|string|in:admin,super_admin,stagiaire",
            'category_id' => 'required|in:categories',
            'souscategory_id' => 'required|in:souscategories',
        ]);
        if($validatedData->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validatedData->messages()
            ]);
        }
        else{

        $user = User::create([
            'username' =>$validatedData->username,
            'email' =>$validatedData->email,
            'password' =>Hash::make($validatedData->password),
            'permession' =>$validatedData->permession,
            'category_id' =>$validatedData->category_id,
            'souscategory_id' =>$validatedData->souscategory_id,
        ]);
        
        return response()->json(['user' => $user], 201);
        
    }
    }
    public function login(Request $request){
        $validatedData =  Validator::make($request->all(),[
            'email'=>"required|email|exists:users",
            'password'=>"required",
        ],[
            'email.required'=>"L'email est obligatoire",
            'email.exists'=>"Ce compte n'existe pas"
        ]);
        if($validatedData->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validatedData->messages()
            ]);
        }else{
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid login details'], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;


            return response()->json([
                'user'=>$user,
                'access_token'=>$token,
                'token_type'=>'Bearer',
            ]);
        }
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function try(){
        dd('reeechead');
    }
}

