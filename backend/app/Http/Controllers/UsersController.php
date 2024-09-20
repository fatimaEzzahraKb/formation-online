<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('category','souscategory','favoris','histories')->get();
        return response()->json([
            'users'=>$users,
            
        ]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'message'=>'Not Found'
            ]);
        }
        return response()->json([
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    $user = User::find($id);
        if(!$user){
            return response()->json([
                'message'=>'Not Found'
            ]);
        }
        $validatedData =Validator::make($request->all(),[
            'username' =>"sometimes|string|unique:users,username,".$user->id,
            'email' => "sometimes|string|unique:users,email,".$user->id,
            'password' => "sometimes|string",
            'permission' => "string|in:admin,super_admin,stagiaire",
            'category_id' => 'exists:categories,id',
            'souscategory_id' => 'sometimes|nullable|exists:souscategories,id',
        ]);
        if($validatedData->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validatedData->messages()
            ]);
        }

        $user->update(array_filter([
            'username'=>$request->username,
            'email'=>$request->email,
            'permission'=>$request->permission , 
            'password'=>$request->password ? bcrypt($request->password) : $user->password,
            'category_id'=>$request->category_id,
            'souscategory_id'=>$request->souscategory_id,
        ]));
        $user->permission = $request->permission;
        return response()->json([
            'user'=>$user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
