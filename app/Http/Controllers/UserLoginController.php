<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserLoginController extends Controller
{
    /**
     * Show the login form for users
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            switch ($user->role) {
                case 'user':
                    return redirect()->intended(route('welcome'))
                        ->with('success', 'Login berhasil! Selamat datang ' . $user->name);
                    
                case 'dokter':
                    return redirect()->route('doctor.search')
                        ->with('success', 'Login berhasil! Selamat datang Dr. ' . $user->name);
                    
                case 'admin':
                    // Logout dan redirect ke admin filament
                    Auth::logout();
                    return redirect()->route('filament.admin.auth.login')
                        ->with('info', 'Silakan gunakan halaman admin untuk login.');
                    
                default:
                    // Role tidak dikenal
                    Auth::logout();
                    return redirect()->route('login')
                        ->with('error', 'Role pengguna tidak valid. Silakan hubungi administrator.');
            }
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password yang Anda masukkan salah.'],
        ]);
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('welcome')
            ->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'terms' => 'required|accepted',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // Login the user
        Auth::login($user);

        return redirect()->route('welcome')
            ->with('success', 'Akun berhasil dibuat! Selamat datang ' . $user->name);
    }
}