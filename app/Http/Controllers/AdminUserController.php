<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Gate;

class AdminUserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function indexUser()
    {
        $users = User::all();
        return view('admin.users.indexuser', compact('users'));
    }

    // Admin + Super Admin: Update user details
    public function edit(User $user)
{
    // Only admin or super_admin
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    if (!in_array(Auth::user()->role, ['admin', 'super_admin'])) {
        abort(403);
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'address_line_1' => 'nullable|string|max:255',
        'address_line_2' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:20',
        'password' => 'nullable|min:8|confirmed',
    ]);

    $userData = $request->only(['name', 'email', 'phone']);

    if ($request->filled('password')) {
        $userData['password'] = Hash::make($request->password);
    }

    $user->update($userData);

    $address = $user->address()->latest()->first();

    if ($address) {
        $address->update([
            'address_line_1' => $request->address_line_1 ?? '',
            'address_line_2' => $request->address_line_2 ?? '',
            'postcode' => $request->postcode ?? '',
        ]);
    } elseif (
        $request->filled('address_line_1') ||
        $request->filled('address_line_2') ||
        $request->filled('postcode')
    ) {
        \App\Models\Address::create([
            'user_id' => $user->id,
            'address_line_1' => $request->address_line_1 ?? '',
            'address_line_2' => $request->address_line_2 ?? '',
            'postcode' => $request->postcode ?? '',
        ]);
    }

    return redirect()->route('admin.users.indexuser')->with('success', 'User updated successfully');
}

    public function makeAdmin(User $user)
    {
        if ($user->role === 'user') {
            $user->update(['role' => 'admin']);
        }

        return back();
    }

    public function removeAdmin(User $user)
    {
        if ($user->role === 'admin') {
            $user->update(['role' => 'user']);
        }

        return back();
    }

    public function sendReset(User $user)
    {
        Password::sendResetLink(['email' => $user->email]);

        return back()->with('success', 'Password reset link sent.');
    }

    public function destroy(User $user)
{
    // Prevent deleting self (VERY IMPORTANT)
    if ($user->id === Auth::id()) {
        return back()->with('error', 'You cannot delete your own account.');
    }

    if ($user->role === 'super_admin') {
        return back()->with('error', 'Super admin cannot be deleted.');
    }

    $user->delete();

    return redirect()->route('admin.users.indexuser')->with('success', 'User deleted successfully.');
}
}

