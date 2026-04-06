<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email','password');
    
        if(Auth::attempt($credentials))
        {
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }
    
            if(Auth::user()->role == 'petugas'){
                return redirect('/petugas');
            }
    
            if(Auth::user()->role == 'manajer'){
                return redirect('/manajer');
            }
        }
    
        return back()->with('error','Email atau password salah');
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
