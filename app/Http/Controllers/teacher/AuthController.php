<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher.dashboard');
        }
        
        return view('teacher.auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('teacher')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended(route('teacher.dashboard'));
        }
        
        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('landing-page');
    }
}
