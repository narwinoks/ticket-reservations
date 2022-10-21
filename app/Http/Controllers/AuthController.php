<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function proscessLogin(Request  $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('login erorr', 'Login Faild!');
    }
}
