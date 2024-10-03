<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Souscategory;
use App\Models\UserSubcategory;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('category','souscategoriesList','favoris')->get();
        $souscategories = Souscategory::with('users');
        $success = null;
        return view('admin/users_index',compact('users','souscategories','success'));
    }
    public function create()
    {
        $categories = Category::with('souscategories')->get();
        return view('admin/user_add',compact('categories'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
            'permission' => 'required|string|in:admin,super_admin,stagiaire',
            'category_id' => 'sometimes|nullable|exists:categories,id',
            "souscategories"=>'array|nullable',
            "souscategories.*"=>'exists:souscategories,id'
        ], [
            'username.required' => 'Le nom d’utilisateur est requis.',
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
            ]);
            if (isset($validatedData['souscategories'])){
                foreach ($validatedData['souscategories'] as $souscategoryId){
                    UserSubcategory::create([
                        'user_id'=>$user->id,
                        'souscategory_id'=>$souscategoryId
                    ]);
                }
            }
           
            
        $users = User::with('category','souscategoriesList','favoris')->get();
        $souscategories = Souscategory::with('users');
        $success = "success";
        return view('admin/users_index',compact('users','souscategories','success'));
        }
            
            
    }
    public function show(User $user)
    {
        return view('admin.user_show', compact('user'));
    }
    public function edit(string $id)
    {
        $user = User::with('category','souscategoriesList','favoris')->find($id);
        $categories = Category::with('souscategories')->get();
        return view('admin/user_update',compact('user','categories'));
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
        $validatedData =$request->validate([
            'username' =>"sometimes|string",
            'email' => "sometimes|string|unique:users,email,".$user->id,
            'password' => "sometimes|nullable|string",
            'permission' => "string|in:admin,super_admin,stagiaire",
            'category_id' => 'sometimes|nullable|exists:categories,id',
        ]);
        if(!$validatedData){
            return back()->withErrors($validatedData)->withInput();
        }

        $user->update(array_filter([
            'username'=>$request->username,
            'email'=>$request->email,
            'permission'=>$request->permission , 
            'password'=>$request->password ? bcrypt($request->password) : $user->password,
            'category_id'=>$request->category_id,
        ]));
        $user->permission = $request->permission;
        return $this->index();

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
