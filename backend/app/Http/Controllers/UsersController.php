<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Category;
use App\Models\Souscategory;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('category','souscategory','favoris','histories')->get();
        
        return view('admin/users_index',compact('users'));
    }
    public function create()
    {
        $categories = Category::with('souscategories')->get();
        return view('admin/user_add',compact('categories'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'permission' => 'required|string|in:admin,super_admin,stagiaire',
            'category_id' => 'nullable|exists:categories,id',
            'souscategory_id' => 'nullable|exists:souscategories,id',
        ], [
            'username.required' => 'Le nom d’utilisateur est requis.',
            'username.unique' => 'Ce nom d’utilisateur est déjà pris.',
            'email.required' => 'L’adresse e-mail est requise.',
            'email.email' => 'L’adresse e-mail doit être une adresse valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est requis.',
            'password_confirmation.required' => 'Veuillez confirmer le mot de passe.',
            'password_confirmation.same' => "Les mots de passe ne sont pas les mêmes .",
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'permission.required' => 'Le rôle est requis.',
            'permission.in' => 'Le rôle doit être l’un des suivants : admin, super_admin, stagiaire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'souscategory_id.exists' => 'La sous-catégorie sélectionnée est invalide.',
        ]);
        if(!$validatedData){
        return back()->withErrors($validatedData)->withInput();
        }
        else{
           $user = User::create([
                'username' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'permission' => $validatedData['permission'],
        'category_id' => $validatedData['category_id'],
        'souscategory_id' => $validatedData['souscategory_id'],
            ]);
            
            return $this->index();
        }
            
            
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
        return $this->index();
    }
}
