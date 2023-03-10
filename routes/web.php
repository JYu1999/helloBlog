<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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


Route::post('/newsletter',\App\Http\Controllers\NewsletterController::class);



Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/posts/{post:title}', [PostController::class,'show']);

Route::post('posts/{post:title}/comments', [CommentController::class,'store']);


Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login', [SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');


Route::middleware('can:admin')->controller(AdminPostController::class)->group(function(){
    Route::get('admin/posts/create', 'create');
    Route::post('admin/posts',  'store');
    Route::get('admin/posts',  'index');
    Route::get('admin/posts/{post}/edit', 'edit');
    Route::patch('admin/posts/{post}', 'update');
    Route::delete('admin/posts/{post}', 'destroy');
});

