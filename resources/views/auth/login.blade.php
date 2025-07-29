
<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Sign In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-pattern {
            background-image:
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.15) 1px, transparent 0);
            background-size: 20px 20px;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>



<body class="h-full bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 bg-pattern">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full opacity-20 animate-pulse">
        </div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-blue-400 to-indigo-400 rounded-full opacity-20 animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="relative min-h-full flex">
        <!-- Left Side - Branding/Info -->
        <div
            class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 items-center justify-center p-12">
            <div class="max-w-md text-center text-white slide-in">
                <div class="mb-8">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full backdrop-blur-sm mb-6">
                        <i class="fas fa-heartbeat text-3xl text-white"></i>
                    </div>
                    <h1 class="text-4xl font-bold mb-4">Breast Cancer Detection</h1>
                    <p class="text-lg text-indigo-100 leading-relaxed">
                        Advanced early detection system for breast cancer screening using artificial intelligence
                        technology.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 mt-8">
                    <div class="flex items-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-shield-heart text-white"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold">Early Detection</p>
                            <p class="text-sm text-indigo-100">AI-powered screening</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white/10 rounded-xl backdrop-blur-sm">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-user-doctor text-white"></i>
                        </div>
                        <div class="text-left">
                            <p class="font-semibold">Expert Guidance</p>
                            <p class="text-sm text-indigo-100">Professional recommendations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex-1 flex items-center justify-center p-6 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-4">
                        <i class="fas fa-heartbeat text-2xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Breast Cancer Detection</h2>
                </div>

                <!-- Login Card -->
                <div class="glass-effect rounded-2xl p-8 shadow-2xl fade-in">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                        <p class="text-gray-600">Sign in to access your account</p>
                    </div>

                    <!-- Custom Alert Component -->
                    <div id="customAlert" class="hidden mb-6">
                        <div class="p-4 rounded-xl border" id="alertContent">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i id="alertIcon" class="text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium" id="alertMessage"></p>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" onclick="hideCustomAlert()"
                                        class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('user.login.submit') }}" method="POST" class="space-y-6" id="loginForm">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-500 mr-2"></i>
                                Email Address
                            </label>
                            <div class="relative">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email"
                                    class="input-focus block w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Enter your email address" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock text-indigo-500 mr-2"></i>
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password"
                                    class="input-focus block w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                    placeholder="Enter your password" />
                                <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                                    <i id="passwordToggleIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn-hover w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300"
                            id="submitBtn">
                            <span id="submitText">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Sign In
                            </span>
                            <span id="loadingText" class="hidden">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Signing In...
                            </span>
                        </button>
                    </form>

                    <!-- Google Login Button -->
                    @if (config('services.google.client_id') && config('services.google.client_secret'))
                        <div class="mt-6">
                            <a href="{{ route('auth.google') }}"
                                class="btn-hover w-full bg-white border border-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-xl shadow-sm hover:shadow-md focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition-all duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC04"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                </svg>
                                Continue with Google
                            </a>
                        </div>
                    @endif

                    <!-- Divider -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">or</span>
                            </div>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('user.register') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
                                Sign up now
                            </a>
                        </p>
                    </div>

                    <!-- Admin Login Link -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('filament.admin.auth.login') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-200 rounded-xl text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                            <i class="fas fa-user-shield mr-2 text-indigo-500"></i>
                            Admin Access
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 text-center">
                        <p class="text-xs text-gray-500">
                            Protected by advanced security measures
                            <i class="fas fa-shield-alt text-green-500 ml-1"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('passwordToggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Custom Alert Functions
        function showCustomAlert(message, type = 'error') {
            const alertDiv = document.getElementById('customAlert');
            const alertContent = document.getElementById('alertContent');
            const alertIcon = document.getElementById('alertIcon');
            const alertMessage = document.getElementById('alertMessage');

            // Set message
            alertMessage.textContent = message;

            // Set styles based on type
            alertContent.className = 'p-4 rounded-xl border';
            alertIcon.className = 'text-xl';

            switch (type) {
                case 'success':
                    alertContent.classList.add('bg-green-50', 'border-green-200');
                    alertIcon.classList.add('fas', 'fa-check-circle', 'text-green-500');
                    break;
                case 'error':
                    alertContent.classList.add('bg-red-50', 'border-red-200');
                    alertIcon.classList.add('fas', 'fa-exclamation-circle', 'text-red-500');
                    break;
                case 'warning':
                    alertContent.classList.add('bg-yellow-50', 'border-yellow-200');
                    alertIcon.classList.add('fas', 'fa-exclamation-triangle', 'text-yellow-500');
                    break;
                case 'info':
                    alertContent.classList.add('bg-blue-50', 'border-blue-200');
                    alertIcon.classList.add('fas', 'fa-info-circle', 'text-blue-500');
                    break;
            }

            // Show alert with animation
            alertDiv.classList.remove('hidden');
            alertDiv.style.animation = 'fadeIn 0.3s ease-out';

            // Auto hide after 5 seconds
            setTimeout(hideCustomAlert, 5000);
        }

        function hideCustomAlert() {
            const alertDiv = document.getElementById('customAlert');
            alertDiv.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                alertDiv.classList.add('hidden');
            }, 300);
        }

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingText = document.getElementById('loadingText');

            // Show loading state
            submitText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            submitBtn.disabled = true;

            // Validate form
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                showCustomAlert('Please fill in all required fields.', 'error');

                // Reset button state
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
                submitBtn.disabled = false;
                return;
            }

            if (!isValidEmail(email)) {
                e.preventDefault();
                showCustomAlert('Please enter a valid email address.', 'error');

                // Reset button state
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
                submitBtn.disabled = false;
                return;
            }
        });

        // Email validation
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Add focus effects to inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-indigo-500');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-indigo-500');
            });
        });

        // Add fadeOut animation to styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: translateY(0); }
                to { opacity: 0; transform: translateY(-10px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>



</html>
