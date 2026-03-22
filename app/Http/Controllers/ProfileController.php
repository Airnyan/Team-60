<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;    


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'postcode' => 'required|string|max:20',
            'phone' => 'required|string|max:20'
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','current_password'],
            'password' => ['required','confirmed', Password::min(8)],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Password updated successfully.');
    }
    public function destroy()
    {
        $user = Auth::user();

        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}