<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SouscategoryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\FormationVideoController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\UserPagesController;
// Guest Routes
Route::middleware('guest')->group(function() {
    Route::get('/login_form', function () {
        return view('login');
    })->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Redirect to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});
                    

// Authenticated middleware Routes
Route::middleware('auth:sanctum')->group(function () {
    // Trainee Routes 

    // Admin routes 
    Route::middleware('admin')->group(function() {
        Route::get('admin', [DashboardController::class,'datavisualisation'])->name('admin');
        Route::resource('formations', FormationsController::class)->except(['destroy']);
        Route::post('ajouter_videos/{id}', [FormationsController::class, 'add_videos'])->name('ajouter_videos');
        Route::resource('categories', CategoryController::class)->except(['destroy']);
        Route::resource('souscategories', SouscategoryController::class)->except(['destroy']);
        Route::resource('users', UsersController::class)->only(['show','index','create']);
        Route::get('settings',function(){
            return view('admin/settings');
        })->name('settings');
        // Super Admin routes
        Route::middleware('superadmin')->group(function() {
            
            Route::get('users/create',[ UsersController::class,'create'])->name('users.create');
            Route::resource('users', UsersController::class)->except(['show','index']);
            Route::resource('categories', CategoryController::class)->only(['destroy']);
            Route::resource('souscategories', SouscategoryController::class)->only(['destroy']);
            Route::resource('formations', FormationsController::class)->only(['destroy']);
            Route::resource('formation_videos', FormationVideoController::class)->only(['destroy']);
        });
    });
    Route::middleware('stagiaire')->group(function(){
        Route::resource('favoris',FavorisController::class);
        
        Route::get('home', function() {
            return view('user/index');
            })->name('home');
        Route::get('formation/{id}',[UserPagesController::class,'formation_show'])->name('user_formation.show');
        Route::get('acceuil',[UserPagesController::class,'acceuil'])->name('acceuil');
        Route::get('souscategories_formations/{id}',[UserPagesController::class,'subcategory_show'])->name('souscategories_formations');
        Route::get('search',[UserPagesController::class,'search'])->name('search');
    });
        
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Fallback route
Route::fallback(function() {
    return view('notfound');
})->name('notfound');
