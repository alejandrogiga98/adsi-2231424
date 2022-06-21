<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('examplesblade', function (){
    return view('examples');
});

require __DIR__.'/auth.php';

/* Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

// CRUD Users
Route::resources([
    'users' => \App\Http\Controllers\UserController::class,
    /* 'games' => \App\Http\Controllers\GameController::class, */
    /* 'categories' => \App\Http\Controllers\CategoryController::class, */
]);

// Search Users
Route::post('users/search', [\App\Http\Controllers\UserController::class, 'search']);

// export Users
Route::get('export/users/pdf', [\App\Http\Controllers\UserController::class, 'pdf']);
Route::get('export/users/excel', [\App\Http\Controllers\UserController::class, 'excel']);

// import Users
Route::post('import/users', [\App\Http\Controllers\UserController::class, 'import']);


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

/* ---------------------------------------------------------------------------------------- */
// CRUD Categories
Route::resources([
    'categories' => \App\Http\Controllers\CategoryController::class,
]);

// Search Users
Route::post('categories/search', [\App\Http\Controllers\CategoryController::class, 'search']);

// export Categories
Route::get('export/categories/pdf', [CategoryController::class, 'pdf']);
Route::get('export/categories/excel', [\App\Http\Controllers\CategoryController::class, 'excel']);

// import Categories
Route::post('import/categories', [\App\Http\Controllers\CategoryController::class, 'import']);

/* ---------------------------------------------------------------------------------------- */
// Switch language
Route::get('locale/{locate}', function ($locale){
    session()->put('locale', $locale);
    return Redirect::back();
});