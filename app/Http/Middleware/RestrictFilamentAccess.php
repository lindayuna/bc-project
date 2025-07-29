<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RestrictFilamentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }
        
        // $user = Auth::user();
        
        // // Only allow admin, superadmin, and dokter to access Filament admin panel
        // $allowedRoles = ['admin', 'superadmin', 'dokter'];
        
        // if (!in_array($user->role, $allowedRoles)) {
        //     // If user role is 'user', redirect to prediction form
        //     if ($user->role === 'user') {
        //         return redirect()->route('prediction.form')
        //             ->with('info', 'Anda tidak memiliki akses ke admin panel. Silakan gunakan form prediksi.');
        //     }
            
        //     // For other roles, show 403 error
        //     abort(403, 'Anda tidak memiliki akses ke admin panel.');
        // }
        
        return $next($request);
    }
}