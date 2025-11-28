<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('signUp');
    }

    public function register(Request $request)
    {
        // 1. Validate input
        $request->validate(
            ['name' => ['required', 'regex:/^[A-Za-z\s]{2,30}$/'],
            'email' => ['required','email','unique:users,email','regex:/^[A-Za-z0-9._%+-]+@(gmail|yahoo|outlook|icloud)\.com$/i'],
            'password' => ['required','confirmed','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/'],
        ]);

        // 2. Create user record in DB
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // secure hashing
        ]);

        // 3. Redirect after success
        return redirect('/login')->with('success', 'Account created successfully! You may now login.');
    }
}