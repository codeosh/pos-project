<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return response()->json([
                    'message' => 'Login successful!',
                    'redirect' => route('admin.dashboard'),
                ]);
            } elseif ($user->role == 'user') {
                return response()->json([
                    'message' => 'Login successful!',
                    'redirect' => route('user.dashboard'),
                ]);
            }

            return response()->json([
                'message' => 'Invalid role assigned to the user.',
            ], 403);
        }

        // Return error if authentication fails
        return response()->json([
            'message' => 'Invalid email or password.',
        ], 401);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully.');
    }
}
