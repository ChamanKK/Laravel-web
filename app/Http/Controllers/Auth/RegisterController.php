<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show the registration form
    public function show()
    {
        return view('auth.register'); // Blade template at resources/views/auth/register.blade.php
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // confirms password_confirmation
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1, // optional: assign default role if you have roles
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to home or plants page
        return redirect('/plants')->with('success', 'Registration successful!');
    }
}
