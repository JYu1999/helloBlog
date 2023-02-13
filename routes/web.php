<?php

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

Route::post('/newsletter',function (){
    request()->validate(['email'=>'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('6f29cdb076',[
            'email_address'=>request('email'),
            'status'=>'subscribed'
        ]);
    }catch(Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
           'email'=>'Sorry, this email can not be added to our newsletter list.'
        ]);
    }


    return redirect('/')->with('success','You are now signed up for our newsletter');
});

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('/posts/{post:title}', [PostController::class,'show']);
Route::post('posts/{post:title}/comments', [CommentController::class,'store']);


Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::get('login', [SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');
