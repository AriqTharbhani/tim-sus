<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('username', $credentials['username'])->first();
    
        if (!$user) {
            Log::warning('Login failed for username: ' . $credentials['username']);
            return back()->with('error', 'Username atau password salah');
        }
    
        if (Auth::attempt($credentials)) {
            $user = User::where('username', $credentials['username'])->first();
    
            if ($user->status == 1) {
                $request->session()->regenerate();
    
                Log::info('Authenticated user:', ['id' => $user->id, 'username' => $user->username, 'role' => $user->role]);
    
                $request->session()->put('role', $user->role);
    
                $user->update(['last_login' => now()]);
    
                if ($user->role === 1) {
                    Log::info('Redirecting to admin dashboard');
                    return redirect()->route('dashboard.admin');
                } elseif ($user->role === 2) {
                    Log::info('Redirecting to guru dashboard');
                    return redirect()->route('dashboard.guru');
                } elseif ($user->role === 3) {
                    Log::info('Redirecting to siswa dashboard');
                    return redirect()->route('dashboard.siswa');
                } else {
                    return redirect('/login');
                }
            } else {
                Log::warning('Login failed for username: ' . $credentials['username'] . ' due to status: ' . $user->status);
                return redirect('/unauthorized');
            }
        }
    
        Log::warning('Login failed for username: ' . $credentials['username']);
        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}