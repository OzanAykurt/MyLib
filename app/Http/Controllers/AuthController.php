<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ucwords
        $name = ucwords(strtolower($request->name));
        $last_name = ucwords(strtolower($request->last_name));

        $user = User::create([
            'name' => $name,
            'last_name' => $last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0, // Default 0
        ]);


        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Incorrect login details.'])->withInput();
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
