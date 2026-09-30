<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Simpan Data Register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|string|min:4|max:8|unique:users,username',
            'password' => 'required|string|min:8|max:15',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'murid',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please sign in.');
    }

    // Menampilkan halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses Autentikasi Login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek login ke database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan Role User
            if (Auth::user()->role === 'pelatih') {
                return redirect()->route('dashboard')->with('success', 'Welcome, Trainer!');
            }

            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        // Jika username atau password salah
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}