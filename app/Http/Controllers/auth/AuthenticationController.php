<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;


class AuthenticationController extends Controller
{

    public function registerpage()
    {
        return view('admin.pages.auth.register');
    }
    protected function createuser(Request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Create the user if validation passes
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Check if user creation was successful
        if ($user) {
            return redirect()->route('login')->with('message', 'User Created Successfully');
        } else {
            // Handle the case where user creation failed (e.g., database error)
            return redirect()->route('register')->with('error', 'User Creation Failed');
        }
    }
    

    public function index()
    {
        return view('admin.pages.auth.login');
    }

    public function authentication(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $userCredentials = $request->only('email', 'password');
        $adminCredentials = $request->only('email', 'password');
        // Attempt to authenticate the user
        if (Auth::attempt($userCredentials)) {
            return redirect()->route('index');
        }
        if (Auth::guard('admin')->attempt($adminCredentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('message', 'Invalid Credentials');
    }
    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect()->route('login');
    }
}
