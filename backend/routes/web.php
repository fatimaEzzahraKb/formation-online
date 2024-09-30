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
    Route::resource('categories', CategoryController::class);
    Route::resource('souscategories', SouscategoryController::class);

    // Admin routes 
    Route::middleware('admin')->group(function() {
        Route::get('admin', [DashboardController::class,'datavisualisation'])->name('admin');
        Route::resource('formations', FormationsController::class)->except(['destroy']);
        Route::post('ajouter_videos/{id}', [FormationsController::class, 'add_videos'])->name('ajouter_videos');

        // Super Admin routes
        Route::middleware('superadmin')->group(function() {
            Route::resource('users', UsersController::class);
            Route::resource('formations', FormationsController::class);
            Route::resource('formation_videos', FormationVideoController::class);
        });
    });
    Route::middleware('stagiaire')->group(function(){
       
        Route::get('home', function() {
            return view('index');
            })->name('home');
        });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Fallback route
Route::fallback(function() {
    return view('notfound');
})->name('notfound');
