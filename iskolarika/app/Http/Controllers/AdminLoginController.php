<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = strtolower(trim($request->email));
        $password = $request->password;

        // Fetch user by email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Account not found.');
        }

        // Check role
        if ($user->role !== 'admin') {
            return back()->with('error', 'Access denied. Admins only.');
        }

        // Check account status
        if ($user->status !== 'active') {
            return back()->with('error', 'Your account is currently ' . $user->status . '.');
        }

        // Attempt login
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/dashboard-admin')->with('success', 'Welcome Admin!');
        }

        return back()->with('error', 'Invalid email or password.');



    }


    public function logout(Request $request)
{
    Auth::logout(); // Log the user out

    // Invalidate the session and regenerate CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login')->with('success', 'You have been logged out.');
}

}
