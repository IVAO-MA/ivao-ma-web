<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function settings()
    {
        $user = Auth::user();
        return view('users.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'discord' => 'nullable|string|max:255',
            'notifications_enabled' => 'boolean',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update([
            'discord' => $request->discord,
            'notifications_enabled' => $request->has('notifications_enabled'),
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
