<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

//        dd(Auth::check());
        if (Auth::check()){
            return redirect()->intended(route('user.home'));
        }

        $formFields = $request->only(['email','password']);

        if (Auth::attempt($formFields)){
            return redirect()->intended(route('user.home'));
        }

        return redirect(route('user.login'))->with([
            'email' => 'Failed to log in!'
        ]);
    }
}
