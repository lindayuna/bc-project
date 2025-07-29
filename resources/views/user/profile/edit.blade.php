<!-- filepath: resources/views/user/profile/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <!-- Edit Profile Section -->
    <section class="pt-32 pb-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                                <i class="fas fa-home mr-2"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                                <a href="{{ route('user.profile') }}"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-700 transition-colors">
                                    Profil Saya
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                                <span class="ml-1 text-sm font-medium text-gray-700">Edit Profil</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Page Header -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Profil</h1>
                                <p class="text-gray-600">
                                    Perbarui informasi pribadi Anda untuk pengalaman yang lebih personal
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm">
                                    <i class="fas fa-user-edit text-blue-600 text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 text-red-800 px-6 py-4 rounded-r-lg mb-8 shadow-sm">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle mr-3 text-red-500 mt-0.5"></i>
                            <div>
                                <h4 class="font-medium mb-2">Terdapat beberapa kesalahan:</h4>
                                <ul class="list-disc list-inside text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Main Edit Form -->
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Profile Photo Section -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="px-8 py-6 border-b border-gray-100">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-camera text-purple-600"></i>
                                </div>
                                Foto Profil
                            </h2>
                        </div>

                        <div class="p-8">
                            <div
                                class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                                <!-- Current Avatar Display -->
                                <div class="flex-shrink-0 text-center">
                                    <div class="relative inline-block">
                                        @if ($user->avatar)
                                            <img id="avatar-preview" src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                                alt="Avatar {{ $user->name }}"
                                                class="w-32 h-32 rounded-2xl object-cover shadow-lg border-4 border-white ring-2 ring-gray-100">
                                        @else
                                            <div id="avatar-preview"
                                                class="w-32 h-32 rounded-2xl bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center shadow-lg border-4 border-white ring-2 ring-gray-100">
                                                <span class="text-3xl font-bold text-gray-600">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-500 mt-4 max-w-xs">
                                        Foto akan ditampilkan di profil dan sistem
                                    </p>
                                </div>

                                <!-- Upload Controls -->
                                <div class="flex-1 w-full">
                                    <div class="space-y-4">
                                        <!-- File Upload Button -->
                                        <div>
                                            <label for="avatar"
                                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-200 cursor-pointer shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                                <i class="fas fa-upload mr-2"></i>
                                                Pilih Foto Baru
                                            </label>
                                            <input type="file" id="avatar" name="avatar" accept="image/*"
                                                class="hidden" onchange="previewAvatar(this)">
                                        </div>

                                        <!-- File Info -->
                                        <div id="file-info" class="text-sm text-gray-600">
                                            <span id="file-name">Belum ada file dipilih</span>
                                        </div>

                                        <!-- Requirements -->
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-2">Persyaratan Foto:</h4>
                                            <ul class="text-sm text-gray-600 space-y-1">
                                                <li class="flex items-center">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    Format: JPG, PNG, GIF
                                                </li>
                                                <li class="flex items-center">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    Ukuran maksimal: 2MB
                                                </li>
                                                <li class="flex items-center">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    Resolusi optimal: 400x400px
                                                </li>
                                            </ul>
                                        </div>

                                        @error('avatar')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information Section - UPDATED -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden card-hover">
                        <div class="px-8 py-6 border-b border-gray-100">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                Informasi Pribadi
                            </h2>
                        </div>

                        <div class="p-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Full Name -->
                                <div class="space-y-3">
                                    <label for="name" class="block text-sm font-semibold text-gray-700">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                            <i class="fas fa-user-circle text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="text" id="name" name="name"
                                            value="{{ old('name', $user->name) }}"
                                            class="w-full pl-14 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900 bg-white"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    @error('name')
                                        <p class="text-red-500 text-sm flex items-center">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-3">
                                    <label for="email" class="block text-sm font-semibold text-gray-700">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                            <i class="fas fa-envelope text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $user->email) }}"
                                            class="w-full pl-14 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900 bg-white"
                                            placeholder="contoh@email.com" required>
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-sm flex items-center">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="space-y-3">
                                    <label for="phone" class="block text-sm font-semibold text-gray-700">
                                        Nomor Telepon
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                            <i class="fas fa-phone text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="tel" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone) }}"
                                            class="w-full pl-14 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900 bg-white"
                                            placeholder="08123456789">
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500 text-sm flex items-center">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Birth Date -->
                                <div class="space-y-3">
                                    <label for="birth_date" class="block text-sm font-semibold text-gray-700">
                                        Tanggal Lahir
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                            <i class="fas fa-calendar text-gray-400 text-lg"></i>
                                        </div>
                                        <input type="date" id="birth_date" name="birth_date"
                                            value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}"
                                            class="w-full pl-14 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900 bg-white">
                                    </div>
                                    @error('birth_date')
                                        <p class="text-red-500 text-sm flex items-center">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="lg:col-span-2 space-y-3">
                                    <label for="address" class="block text-sm font-semibold text-gray-700">
                                        Alamat Lengkap
                                    </label>
                                    <div class="relative">
                                        <div class="absolute top-4 left-4 pointer-events-none z-10">
                                            <i class="fas fa-map-marker-alt text-gray-400 text-lg"></i>
                                        </div>
                                        <textarea id="address" name="address" rows="4"
                                            class="w-full pl-14 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 resize-none text-gray-900 bg-white"
                                            placeholder="Masukkan alamat lengkap Anda">{{ old('address', $user->address) }}</textarea>
                                    </div>
                                    @error('address')
                                        <p class="text-red-500 text-sm flex items-center">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons - UPDATED -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 card-hover">
                        <div class="p-8">
                            <div class="flex flex-col sm:flex-row gap-4 justify-end">
                                <a href="{{ route('user.profile') }}"
                                    class="btn-secondary order-2 sm:order-1 inline-flex items-center justify-center px-8 py-4 bg-gray-100 text-gray-700 font-semibold rounded-xl border-2 border-gray-200 transition-all duration-300">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali
                                </a>

                                <button type="submit"
                                    class="btn-primary order-1 sm:order-2 inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold rounded-xl shadow-sm transition-all duration-300">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Change Password Section -->
                <div class=" bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-shield-alt text-red-600"></i>
                            </div>
                            Keamanan Akun
                        </h2>
                        <p class="text-gray-600 mt-2">Ubah password untuk menjaga keamanan akun Anda</p>
                    </div>

                    <form action="{{ route('user.profile.password') }}" method="POST" class="p-8">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Current Password -->
                            <div class="lg:col-span-2 space-y-3">
                                <label for="current_password" class="block text-sm font-semibold text-gray-700">
                                    Password Saat Ini <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-key text-gray-400"></i>
                                    </div>
                                    <input type="password" id="current_password" name="current_password"
                                        class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900"
                                        placeholder="Masukkan password saat ini" required>
                                </div>
                                @error('current_password')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="space-y-3">
                                <label for="password" class="block text-sm font-semibold text-gray-700">
                                    Password Baru <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input type="password" id="password" name="password"
                                        class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900"
                                        placeholder="Minimal 8 karakter" required>
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="space-y-3">
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
                                    Konfirmasi Password Baru <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200 text-gray-900"
                                        placeholder="Ulangi password baru" required>
                                </div>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="mt-8 p-6 bg-yellow-50 rounded-xl border border-yellow-200">
                            <h4 class="text-sm font-semibold text-yellow-800 mb-3 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Persyaratan Password:
                            </h4>
                            <ul class="text-sm text-yellow-700 space-y-2">
                                <li class="flex items-center">
                                    <i class="fas fa-check text-yellow-600 mr-3"></i>
                                    Minimal 8 karakter
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-yellow-600 mr-3"></i>
                                    Kombinasi huruf dan angka direkomendasikan
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-yellow-600 mr-3"></i>
                                    Hindari menggunakan informasi pribadi
                                </li>
                            </ul>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                <i class="fas fa-shield-alt mr-2"></i>
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function previewAvatar(input) {
            const fileName = document.getElementById('file-name');
            const fileInfo = document.getElementById('file-info');
            const preview = document.getElementById('avatar-preview');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                // Update file name display
                fileName.textContent = file.name;

                // Show file size
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                fileInfo.innerHTML = `
                <div class="flex items-center space-x-4 text-sm">
                    <span class="text-gray-600">📁 ${file.name}</span>
                    <span class="text-gray-500">📏 ${fileSize} MB</span>
                    <span class="text-green-600">✅ File dipilih</span>
                </div>
            `;

                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" class="w-full h-full rounded-2xl object-cover" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            } else {
                fileName.textContent = 'Belum ada file dipilih';
                fileInfo.innerHTML = '<span class="text-gray-500">Belum ada file dipilih</span>';
            }
        }

        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            // Add real-time validation feedback
            const inputs = document.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('border-red-300');
                        this.classList.remove('border-gray-300');
                    } else {
                        this.classList.add('border-green-300');
                        this.classList.remove('border-red-300', 'border-gray-300');
                    }
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Enhanced focus styles */
        input:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.15);
            transform: translateY(-1px);
            border-color: #ec4899;
        }

        /* Smooth transitions */
        input,
        textarea,
        button,
        label {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* File input styling */
        input[type="file"]::-webkit-file-upload-button {
            display: none;
        }

        /* Enhanced button hover effects */
        button:hover,
        .button:hover {
            transform: translateY(-3px);
        }

        /* Primary button (pink) hover effects */
        .btn-primary:hover {
            background: linear-gradient(135deg, #be185d 0%, #831843 100%);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.3);
            transform: translateY(-3px) scale(1.02);
        }

        /* Secondary button (gray) hover effects */
        .btn-secondary:hover {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            color: #374151;
            border-color: #d1d5db;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* File upload button enhanced hover */
        .file-upload-btn {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .file-upload-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .file-upload-btn:hover::before {
            left: 100%;
        }

        .file-upload-btn:hover {
            background: linear-gradient(135deg, #be185d 0%, #9d174d 100%);
            box-shadow: 0 8px 20px rgba(236, 72, 153, 0.4);
            transform: translateY(-3px) scale(1.05);
        }

        /* Input field hover effects */
        input:hover:not(:focus),
        textarea:hover:not(:focus) {
            border-color: #d1d5db;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }

        /* Form validation states with better colors */
        .border-green-300 {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }

        .border-red-300 {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }

        /* Enhanced card hover effects */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            border-color: #e5e7eb;
        }

        /* Icon hover effects */
        .icon-hover {
            transition: all 0.3s ease;
        }

        .icon-hover:hover {
            transform: scale(1.1) rotate(5deg);
            color: #ec4899;
        }

        /* Avatar preview hover effect */
        #avatar-preview {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        #avatar-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            filter: brightness(1.1);
        }

        /* Requirements list hover */
        .requirement-item {
            transition: all 0.2s ease;
            padding: 0.5rem;
            border-radius: 0.5rem;
        }

        .requirement-item:hover {
            background-color: rgba(34, 197, 94, 0.1);
            transform: translateX(5px);
        }

        /* Password requirements hover */
        .password-requirement {
            transition: all 0.2s ease;
            padding: 0.5rem;
            border-radius: 0.5rem;
        }

        .password-requirement:hover {
            background-color: rgba(245, 158, 11, 0.1);
            transform: translateX(5px);
        }

        /* Breadcrumb link hover */
        .breadcrumb-link {
            transition: all 0.2s ease;
        }

        .breadcrumb-link:hover {
            color: #ec4899 !important;
            transform: translateY(-1px);
        }

        /* Loading state for buttons */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Pulse animation for required fields */
        .required-pulse {
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.33);
            }

            40%,
            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: scale(1.2);
            }
        }

        /* Smooth gradient animations */
        .gradient-shift {
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
@endpush
