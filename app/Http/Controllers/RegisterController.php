<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
       return view('register/create');
    }

    public function store()
    {
        //create the user
        $attributes = \request()->validate([
           'name'=>'required|max:255',
           'username'=>'required|max:255|min:3|unique:users, username',
           'email'=>'required|email|max:255',
           'password'=>'required|min:7|max:255'
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
