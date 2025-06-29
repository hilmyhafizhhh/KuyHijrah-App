<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
         if (Auth::guard('admin')->check()) {
        return redirect('/dashboard');
    }

        return view('login.index', ['title' => 'Login']);
    }

    public function authenticate(Request $request) {
        $credential = $request->validate(rules: [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        };

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerate();

        return redirect('/');
    }
}
