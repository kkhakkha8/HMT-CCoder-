<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
        request()->validate([
            'name'=>['required','min:3','max:255'],
            'username'=>['required','max:255'],
            'email'=>['required','email'],
            'password'=>['required','min:8']
        ]);
    }
}
