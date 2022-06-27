<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))) {

            return redirect('/home');
        } else {
            Alert::error('Error', 'Username atau password salah.');
            
            return view('auth.login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
