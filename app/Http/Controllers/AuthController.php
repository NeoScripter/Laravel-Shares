<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function store()
    {
        $validated = request()->validate([
            'username' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
            'data-consent' => 'required'
        ]);

        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Successfully logged in!')->with('details', 'Welcome to our community where we share our thoughts!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('home')->with('success', 'Successfully logged in!')->with('details', 'Welcome to our community where we share our thoughts!');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password'
        ]);
    }

    public function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Successfully logged out!')->with('details', 'Come back when you are ready!');
    }
}
