<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validate the input data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Protect against session fixation
            return redirect()->intended('/dashboard'); // Or any page after login
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The email address or password is incorrect.',
        ]);
    }
}
