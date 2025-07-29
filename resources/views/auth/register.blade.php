@extends('layouts.app')

@section('title', 'Daftar - Breast Cancer Detection')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-12 w-12 bg-pink-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-plus text-pink-600 text-xl"></i>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Buat Akun Baru
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                        class="font-medium text-pink-600 hover:text-pink-500 transition-colors">
                        Masuk di sini
                    </a>
                </p>
            </div>

            <!-- Google OAuth Button -->
            @if (config('services.google.client_id') && config('services.google.client_secret'))
                <div>
                    <a href="{{ route('auth.google') }}"
                        class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200 shadow-sm">
                        <svg class="h-5 w-5 mr-3" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC04"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path fill="#EA4335"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                        Daftar dengan Google
                    </a>
                </div>

                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-gray-50 text-gray-500">Atau daftar dengan email</span>
                    </div>
                </div>
            @endif

            <!-- Register Form -->
            <form class="mt-8 space-y-6" action="{{ route('user.register.submit') }}" method="POST">
                @csrf

                <!-- Form Fields -->
                <div class="space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400 text-sm"></i>
                            </div>
                            <input id="name" name="name" type="text" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 text-sm transition-all duration-200 @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input id="email" name="email" type="email" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 text-sm transition-all duration-200 @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="contoh@email.com" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 text-sm transition-all duration-200 @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Minimal 8 karakter">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <i id="password-icon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Password harus minimal 8 karakter</p>
                    </div>

                    <!-- Password Confirmation Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 text-sm transition-all duration-200"
                                placeholder="Ulangi password Anda">
                            <button type="button" onclick="togglePassword('password_confirmation')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <i id="password_confirmation-icon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Nomor Telepon <span class="text-gray-400 text-xs">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400 text-sm"></i>
                            </div>
                            <input id="phone" name="phone" type="tel"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 text-sm transition-all duration-200 @error('phone') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded transition-colors">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700">
                            Saya setuju dengan
                            <a href="#"
                                class="text-pink-600 hover:text-pink-500 font-medium transition-colors">syarat dan
                                ketentuan</a>
                            serta
                            <a href="#"
                                class="text-pink-600 hover:text-pink-500 font-medium transition-colors">kebijakan
                                privasi</a>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus text-pink-500 group-hover:text-pink-400 transition-colors"></i>
                        </span>
                        Buat Akun
                    </button>
                </div>
            </form>

            <!-- Support Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Butuh bantuan?
                    <a href="#" class="font-medium text-pink-600 hover:text-pink-500 transition-colors">Hubungi
                        support</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div
            class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50 max-w-sm">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div
            class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg z-50 max-w-sm">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Auto-hide notifications after 5 seconds
        setTimeout(function() {
            const notifications = document.querySelectorAll('.fixed.top-4.right-4');
            notifications.forEach(function(notification) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                setTimeout(function() {
                    notification.remove();
                }, 300);
            });
        }, 5000);
    </script>
@endsection
