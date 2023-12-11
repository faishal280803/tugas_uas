<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admin/dashboard')->with(['success' => 'Anda berhasil login']);
            } else {
                return redirect()->intended('/')->with('success', 'Anda berhasil login');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $validate = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Logout Berhasil');
    }
}
