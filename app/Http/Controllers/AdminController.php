<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function LoginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('intern')->attempt($credentials)) {
            return redirect()->route('interns.index');
        }
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('interns.index'); 
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);


    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
