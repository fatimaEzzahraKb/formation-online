<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Formation;
use App\Models\User;
use App\Models\Souscategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function datavisualisation(){
        $formations  = Formation::with('category','souscategory','histories','videos')->paginate(5);
        $users = User::with('category','souscategoriesList','favoris','histories')->paginate(5);
        $souscategories = Souscategory::with('users');
        $categories = Category::with('souscategories');
        $categories_chart = DB::table('formations')
        ->select('souscategories.nom', DB::raw('count(formations.id) as total'))
        ->leftJoin('souscategories', 'formations.souscategory_id', '=', 'souscategories.id')
        ->groupBy('souscategories.nom')  
        ->get();
        $users_chart = DB::table('users')
        ->select('categories.nom', DB::raw('count(users.id) as total'))
        ->leftJoin('categories', 'users.category_id', '=', 'categories.id')
        ->groupBy('categories.nom')  
        ->where('categories.nom','!=','null')
        ->get();

        return view('admin/admin_dashboard', compact('formations', 'users','users_chart', 'souscategories', 'categories','categories_chart'));
    }
}
