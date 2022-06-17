<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\support\Facades\Auth;

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

// Route::get('/', 'ProductController@index');
// Route::get('/add-product','ProductController@create');
// Route::post('/add-product','ProductController@store');

Route::get('/', function () {
    return view('welcome');
});
 Route::resource('admin',AdminController::class );  
 Route::resource('category',CategoryController::class );
 Route::resource('product',ProductController::class);
 
//  Route::resource('welcome',WelcomeController::class);

//  Route::get('/category', 'CategoryController@index');
//  Route::get('/add-category','CategoryController@create');
//  Route::post('/add-category','CategoryController@store');


Auth::routes();
Route::get('/filterProduct', [App\Http\Controllers\WelcomeController::class, 'filterProduct']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

//Route::get('/filterProduct', [App\Http\Controllers\HomeController::class, 'filterProduct']);