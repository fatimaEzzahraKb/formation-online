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
        $formations  = Formation::with('category','souscategory','histories','videos')->get();
        $users = User::with('category','souscategoriesList','favoris','histories')->get();
        $souscategories = Souscategory::with('users');
        $categories = Category::with('souscategories');
        $categories_chart = DB::table('formations')
        ->select('souscategories.nom', DB::raw('count(formations.id) as total'))
        ->leftJoin('souscategories', 'formations.souscategory_id', '=', 'souscategories.id')
        ->groupBy('souscategories.nom')  
        ->get();

        return view('admin/admin_dashboard', compact('formations', 'users', 'souscategories', 'categories','categories_chart'));
    }
}
