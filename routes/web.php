<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Models\Content;

// Welcome page (Home) - Public access
Route::get('/', function () {
    $newsContents = Content::where('category', 'news')
        ->where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
        
    return view('welcome', compact('newsContents'));
})->name('welcome');

// Google OAuth routes
Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Guest-only routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login'])->name('user.login.submit');
    Route::get('/register', [UserLoginController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [UserLoginController::class, 'register'])->name('user.register.submit');
});

// Protected routes (login required)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('user.logout');

    // User Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('user.profile.password');

    // Prediction Routes
    Route::get('/prediction/form', [PredictionController::class, 'index'])->name('prediction.form');
    Route::post('/prediction/store', [PredictionController::class, 'store'])->name('prediction.store');
    Route::get('/prediction/result/{id}', [PredictionController::class, 'result'])->name('prediction.result');
    Route::get('/prediction/history', [PredictionController::class, 'history'])->name('prediction.history');
});

// Doctor routes
Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/search', [PredictionController::class, 'doctorSearch'])->name('doctor.search');
    Route::post('/search', [PredictionController::class, 'searchByCode'])->name('doctor.search.result');
    Route::get('/prediction/{code}', [PredictionController::class, 'doctorViewPrediction'])->name('doctor.prediction.view');
});

Route::prefix('doctor')->middleware(['auth'])->name('doctor.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// News routes (Public access)
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('show');
});

// Events routes (Public access)
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', [App\Http\Controllers\EventsController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\EventsController::class, 'show'])->name('show');
});

// Self-care routes (Public access)
Route::prefix('selfcare')->name('selfcare.')->group(function () {
    Route::get('/breast-cancer-info', function () {
        $content = Content::where('category', 'breast-cancer-info')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.breast-cancer-info', compact('content'));
    })->name('breast-cancer-info');

    Route::get('/signs-symptoms', function () {
        $content = Content::where('category', 'signs-symptoms')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.signs-symptoms', compact('content'));
    })->name('signs-symptoms');

    Route::get('/risk-factors', function () {
        $content = Content::where('category', 'risk-factors')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.risk-factors', compact('content'));
    })->name('risk-factors');

    Route::get('/sadari', function () {
        $content = Content::where('category', 'sadari')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.sadari', compact('content'));
    })->name('sadari');

    Route::get('/detection-benefits', function () {
        $content = Content::where('category', 'detection-benefits')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.detection-benefits', compact('content'));
    })->name('detection-benefits');

    Route::get('/guidelines', function () {
        $content = Content::where('category', 'guidelines')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        return view('selfcare.guidelines', compact('content'));
    })->name('guidelines');
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('welcome');
});