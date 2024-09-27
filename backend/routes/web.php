<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\FormationVideoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/',)
Route::middleware('guest')->group(function(){
Route::get('/login_form', function () {return view('login');})->name('login');
Route::post('login',[AuthController::class,'login']);
});
Route::get('/', function () {
    return redirect()->route('login'); // Redirect to login if not authenticated
});
Route::get('/user_info',[AuthController::class,'user']);
Route::resource('categories', CategoryController::class);
Route::get('formations',[FormationsController::class,'index'])->name('formations.index');
Route::get('formations/{id}',[FormationsController::class,'show'])->name('formations.show');
Route::resource('formation_videos',FormationVideos::class)->except(['destroy']);
Route::resource('videos_formation',FormationVideoController::class)->only(['index',"show"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('formation_modif',function(){
        return view('admin/formation_update');
    });
    Route::middleware('admin')->group(function(){
        Route::get('admin',function(){
            return view('admin/admin_dashboard');
        })->name('admin');
        Route::get('/souscategories/{id}', function ($id) {
            return Souscategory::where('category_id', $id)->get();
        });
        Route::middleware('superadmin')->group(function(){
            Route::resource('users',UsersController::class);
        Route::resource('formations',FormationsController::class);
        Route::resource('formation_videos',FormationVideoController::class);
        Route::post('ajouter_videos/{id}', [FormationsController::class, 'add_videos'])->name('ajouter_videos');


        });
        Route::resource('users',UsersController::class)->except(['destroy','create']);
        Route::resource('formations',FormationsController::class)->except(['destroy']);
        Route::resource('videos_formation',FormationVideoController::class)->except(['destroy']);
        Route::post('ajouter_videos/{id}', [FormationsController::class, 'add_videos'])->name('ajouter_videos');
    });
    
    Route::get('home',function(){
        return view('index');
    })->name('home')->middleware('stagiaire');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    

});

Route::fallback(function(){
    return view('notfound');
});
