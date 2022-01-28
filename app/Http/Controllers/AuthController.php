<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function create(){
        return view('register.create');
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
        return redirect('/')->with('success', "Welcome Dear , $user->name");
    }
}
