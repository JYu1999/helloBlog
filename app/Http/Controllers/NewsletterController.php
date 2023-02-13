<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email'=>'required|email']);


        try {
            $newsletter->subscribe(request('email'));
        }catch(Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email'=>'Sorry, this email can not be added to our newsletter list.'
            ]);
        }


        return redirect('/')->with('success','You are now signed up for our newsletter');
    }
}
