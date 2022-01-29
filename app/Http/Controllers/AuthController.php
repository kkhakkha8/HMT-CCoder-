<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $userData = request()->validate([
            'name'=>['required','min:3','max:255'],
            'username'=>['required','max:255',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);

        $user = User::create($userData);
        //session()->flash('success',"Welcome Dear , $user->name");
        auth()->login($user);
        return redirect('/')->with('success', "Welcome Dear , $user->name");
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login() {
        $formData = request()->validate([
            'email'=> ['required','max:255','email',Rule::exists('users','email')],
            'password'=>['required','min:8']
        ],[
            'email.required'=>'user need to provide email address',
            'password.min'=>'password should be more than 8 characters'
        ]);

        dd($formData);
    }
}
