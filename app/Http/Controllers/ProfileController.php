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
        $address = $user->address()->latest()->first();
        return view('profile', compact('user', 'address'  ));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|string|max:20',
        'address1' => 'nullable|string|max:255',
        'address2' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:20',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);

    $address = $user->address()->latest()->first();

    if ($address) {
        $address->update([
            'address_line_1' => $request->address1 ?? '',
            'address_line_2' => $request->address2 ?? '',
            'postcode' => $request->postcode ?? '',
        ]);
    } elseif ($request->filled('address1') || $request->filled('address2') || $request->filled('postcode')) {
        \App\Models\Address::create([
            'user_id' => $user->id,
            'address_line_1' => $request->address1 ?? '',
            'address_line_2' => $request->address2 ?? '',
            'postcode' => $request->postcode ?? '',
        ]);
    }

    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
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