<?php

namespace App\Http\Controllers;

use App\Models\address;
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
            'phone' => ['required', 'regex:/^[0-9+\-\s]{7,20}$/'],
            'password' => ['required','confirmed','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/'],
        ]);
        
    
        // 2. Create user record in DB
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            
        ]);

        // 3. Redirect after success
        return redirect('/login')->with('success', 'Account created successfully! You may now login.');
    }
}