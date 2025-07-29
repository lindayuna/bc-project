<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectUserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Jika user sudah login, redirect berdasarkan role
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return $next($request);
    }

    /**
     * Redirect user based on their role
     */
    private function redirectBasedOnRole($user)
    {
        $roleRedirects = [
            'user' => 'prediction.form',
            'doctor' => 'doctor.search',
        ];

        // Cek apakah role ada dalam mapping
        if (array_key_exists($user->role, $roleRedirects)) {
            $routeName = $roleRedirects[$user->role];
            
            // Cek apakah route exists
            if (Route::has($routeName)) {
                return redirect()->route($routeName);
            }
        }

        // Jika role tidak valid atau route tidak ada
        return $this->handleInvalidRole($user);
    }

    /**
     * Handle invalid role scenario
     */
    private function handleInvalidRole($user)
    {
        Auth::logout();
        
        return redirect()->route('login')
            ->with('error', 'Role pengguna "' . ($user->role ?? 'tidak ada') . '" tidak valid. Silakan hubungi administrator.');
    }
}