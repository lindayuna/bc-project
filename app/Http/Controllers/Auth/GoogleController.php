<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        // Check if Google OAuth is configured
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            return redirect()->route('user.login')->with('error', 'Google OAuth belum dikonfigurasi. Silakan gunakan login biasa atau hubungi administrator.');
        }

        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            return redirect()->route('user.login')->with('error', 'Terjadi kesalahan saat menghubung ke Google. Silakan coba lagi atau gunakan login biasa.');
        }
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cek apakah user sudah ada berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if ($user) {
                // Jika user sudah ada, update google_id jika belum ada
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }
            } else {
                // Buat user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(24)), // Random password untuk user Google
                    'email_verified_at' => now(),
                ]);
            }
            
            // Login user
            Auth::login($user);
            
            return redirect()->route('welcome')->with('success', 'Berhasil masuk dengan Google!');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat masuk dengan Google.');
        }
    }
}