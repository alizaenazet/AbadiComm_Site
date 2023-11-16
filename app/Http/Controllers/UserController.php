<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $req){
        $credentials = $req->validate([
            'name' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (
            Auth::attempt($credentials)
        ) {
            $req->session()->regenerate();
            return redirect('dashboard');
        }



        return redirect('/login')->withErrors('');        

    }
}
