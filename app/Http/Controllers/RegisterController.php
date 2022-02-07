<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){

        return view('index.register');

    }
    public function save(){

        if (Auth::check()){
            return redirect()->route('user.login');
        }

        $attributes = request()->validate([
            'full_name' => 'required|min:5|max:255',
            'birthday' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:4|max:255'
        ]);

        $user = User::create($attributes);

//        \auth()->login($user);

//        return redirect()->route('login')->with('success','Your account has been created.');


        if ($user){
            Auth::login($user);
            return redirect()->route('user.login');
        }
        return redirect()->route('user.login')->withErrors([
            'formError' => 'An error occurred while saving the user.'
        ]);
    }
}
