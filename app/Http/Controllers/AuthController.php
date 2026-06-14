<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('employees.index')
                ->with('success', 'Login successful.');
        }

        return back()
            ->withErrors(['email' => 'Invalid email or password.'])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['full_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('login')
            ->with('success', 'Account created successfully. Please log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been logged out.');
    }
}
