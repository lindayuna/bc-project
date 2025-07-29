<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if user is authenticated
        // if (!Auth::check()) {
        //     return redirect('/')
        //         ->with('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
        // }

        // $user = Auth::user();
        
        // // Check if user has the required role using direct field access
        // if ($user->role !== $role) {
        //     abort(403, 'Akses ditolak. oleh checkRole');
        // }

        return $next($request);
    }
}