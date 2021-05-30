<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\MypostController;
use App\Http\Controllers\Frontend\MycategoryController;

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
    return view('frontend.layout');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/{anypath}', [HomeController::class, 'index'])->where('path','.*');

//category
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('/get-category', [CategoryController::class, 'index']);
Route::get('/remove-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{slug}', [CategoryController::class, 'edit']);
Route::post('/update-category/{slug}', [CategoryController::class, 'update']);
Route::get('/get-active-category', [CategoryController::class, 'getActivecategory']);

//post
Route::post('/add-post', [PostController::class, 'store']);
Route::get('/get-post', [PostController::class, 'index']);
Route::get('/remove-post/{id}', [PostController::class, 'destroy']);
Route::get('/edit-post/{slug}', [PostController::class, 'edit']);
Route::post('/update-post/{slug}', [PostController::class, 'update']);



//frontsite
Route::get('/get-frontsite-post', [MypostController::class, 'allPost']);
Route::get('/show-single-post/{slug}', [MypostController::class, 'edit']);
Route::get('/get-post-by-category/{slug}', [MypostController::class, 'getpostbycategory']);
Route::get('/get-frontsite-active-category', [MycategoryController::class, 'getfrontsiteActivecategory']);

