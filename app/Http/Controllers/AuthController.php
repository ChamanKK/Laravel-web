<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $userDetails = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($userDetails)) {
            $request->session()->regenerate();
            return redirect('/plants');
        }
        return back();
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
