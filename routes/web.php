<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\PostController::class,'index'])->name('home');

Route::get('/posts/{post:title}', [\App\Http\Controllers\PostController::class,'show']);



Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::get('login', [SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');
