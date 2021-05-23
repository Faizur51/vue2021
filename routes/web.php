<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/{anypath}', [HomeController::class, 'index'])->where('path','.*');

//category
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('/get-category', [CategoryController::class, 'index']);
Route::get('/remove-category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{slug}', [CategoryController::class, 'edit']);
Route::post('/update-category/{slug}', [CategoryController::class, 'update']);
