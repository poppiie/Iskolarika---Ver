<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomRegisterController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            // 'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            // 'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Important!
        ]);

         return redirect()->route('register')->with('success', 'Registered successfully!');
    }

    public function show()
    {
        return view('auth.register'); 
        
    }
}

