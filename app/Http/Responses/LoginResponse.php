<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        // Jika role user, redirect ke form prediksi
        if ($user->role === 'user') {
            return redirect()->route('prediction.form');
        }

        // Default untuk admin/super_admin/dokter
        return redirect()->intended(filament()->getUrl());
    }
}