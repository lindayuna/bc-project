@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <!-- Profile Header - Kurangi padding-top -->
    <section class="pt-20 pb-20 bg-gray-50"> <!-- Ubah dari pt-32 ke pt-20 -->
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ url('/') }}"
                                class="breadcrumb-link inline-flex items-center text-sm font-medium text-gray-500 hover:text-pink-600 transition-colors">
                                <i class="fas fa-home mr-2"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                                <span class="ml-1 text-sm font-medium text-gray-700">Profil Saya</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Success Message -->
                @if (session('success'))
                    <div
                        class="bg-green-50 border-l-4 border-green-400 text-green-800 px-6 py-4 rounded-r-lg mb-8 shadow-sm animate-fade-in">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-500"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Profile Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Sidebar - Avatar & Quick Info -->
                    <div class="lg:col-span-1">
                        <!-- Profile Card -->
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden sticky top-8 card-hover">
                            <!-- Header with gradient -->
                            <div class="bg-gradient-to-r from-pink-50 to-purple-50 p-6 text-center">
                                <!-- Avatar -->
                                <div class="relative inline-block mb-4">
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                            alt="Avatar {{ $user->name }}"
                                            class="w-24 h-24 rounded-full object-cover shadow-lg ring-4 ring-white hover-scale">
                                    @else
                                        <div
                                            class="w-24 h-24 rounded-full bg-gradient-to-br from-pink-200 to-purple-300 flex items-center justify-center shadow-lg ring-4 ring-white hover-scale">
                                            <span class="text-2xl font-bold text-white">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                    <!-- Online Status -->
                                    <div
                                        class="absolute bottom-1 right-1 bg-green-500 w-6 h-6 rounded-full border-3 border-white shadow-sm flex items-center justify-center animate-pulse">
                                        <div class="w-2 h-2 bg-white rounded-full"></div>
                                    </div>
                                </div>

                                <!-- User Info -->
                                <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $user->name }}</h2>
                                <p class="text-sm text-gray-500 mb-1">{{ $user->email }}</p>
                                <div
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-4">
                                    <i class="fas fa-circle text-green-500 mr-1" style="font-size: 6px;"></i>
                                    Online
                                </div>
                            </div>

                            <!-- Enhanced Stats - Only Membership Info -->
                            <div class="p-6 border-b border-gray-100">
                                <div
                                    class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200 hover-lift">
                                    <div
                                        class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-star text-white text-lg"></i>
                                    </div>
                                    <div class="text-lg font-bold text-purple-600 mb-1">
                                        {{ $user->created_at->format('M Y') }}
                                    </div>
                                    <div class="text-sm text-gray-600 font-medium">Bergabung Sejak</div>
                                    <div class="mt-3 pt-3 border-t border-purple-200">
                                        <div class="text-xs text-purple-600">
                                            Member selama {{ $user->created_at->diffInDays(now()) }} hari
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="p-6">
                                <div class="space-y-3">
                                    <!-- Edit Profile Button -->
                                    <a href="{{ route('user.profile.edit') }}"
                                        class="w-full inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-semibold rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Profil
                                    </a>

                                    @if (auth()->user()->role === 'user')
                                        @if (Route::has('prediction.form'))
                                            <!-- Primary CTA -->
                                            <a href="{{ route('prediction.form') }}"
                                                class="w-full inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                                <i class="fas fa-heartbeat mr-2"></i>
                                                Mulai Deteksi
                                            </a>
                                        @endif

                                        @if (Route::has('prediction.history'))
                                            <!-- Secondary Action -->
                                            <a href="{{ route('prediction.history') }}"
                                                class="w-full inline-flex items-center justify-center px-4 py-3 bg-white text-gray-700 font-medium rounded-xl border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-200">
                                                <i class="fas fa-history mr-2"></i>
                                                Riwayat Deteksi
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Welcome Banner -->
                        <div
                            class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100 card-hover">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 mb-2">
                                        Selamat datang, {{ explode(' ', $user->name)[0] }}! 👋
                                    </h1>
                                    <p class="text-gray-600">
                                        Kelola informasi pribadi Anda dan mulai perjalanan deteksi kesehatan Anda.
                                    </p>
                                </div>
                                <div class="hidden md:block">
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-blue-600">
                                            {{ $user->created_at->format('M Y') }}</div>
                                        <div class="text-sm text-gray-500">Member Sejak</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information Card -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 card-hover">
                            <!-- Header -->
                            <div class="px-6 py-4 border-b border-gray-100">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-blue-600"></i>
                                        </div>
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-900">Informasi Akun</h2>
                                            <p class="text-sm text-gray-500">Status dan detail akun Anda</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Stats Grid -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Account Status -->
                                    <div
                                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200 hover-lift">
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-shield-check text-white text-xl"></i>
                                            </div>
                                            <span
                                                class="text-xs font-medium text-green-600 bg-green-200 px-2 py-1 rounded-full">Aktif</span>
                                        </div>
                                        <div class="text-lg font-bold text-gray-900 mb-1">Status Akun</div>
                                        <div class="text-sm font-medium text-gray-600">Terverifikasi & Aktif</div>
                                        <div class="mt-3 pt-3 border-t border-green-200">
                                            <div class="text-xs text-green-600">
                                                Email terverifikasi ✓
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Membership -->
                                    <div
                                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 hover-lift">
                                        <div class="flex items-center justify-between mb-4">
                                            <div
                                                class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-star text-white text-xl"></i>
                                            </div>
                                            <span
                                                class="text-xs font-medium text-purple-600 bg-purple-200 px-2 py-1 rounded-full">Member</span>
                                        </div>
                                        <div class="text-lg font-bold text-gray-900 mb-1">
                                            {{ $user->created_at->diffForHumans() }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-600">Bergabung Sejak</div>
                                        <div class="mt-3 pt-3 border-t border-purple-200">
                                            <div class="text-xs text-purple-600">
                                                Member selama {{ $user->created_at->diffInDays(now()) }} hari
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 card-hover">
                            <!-- Header -->
                            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h2>
                                        <p class="text-sm text-gray-500">Data pribadi dan kontak Anda</p>
                                    </div>
                                </div>
                                <a href="{{ route('user.profile.edit') }}"
                                    class="text-sm text-pink-600 hover:text-pink-700 font-medium flex items-center">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Full Name -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                        <div
                                            class="p-4 bg-gray-50 rounded-xl border border-gray-200 hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-user-circle text-gray-400 mr-3"></i>
                                                <span
                                                    class="text-gray-900 font-medium">{{ $user->name ?: 'Belum diisi' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <div
                                            class="p-4 bg-gray-50 rounded-xl border border-gray-200 hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-envelope text-gray-400 mr-3"></i>
                                                <span
                                                    class="text-gray-900 font-medium">{{ $user->email ?: 'Belum diisi' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                        <div
                                            class="p-4 bg-gray-50 rounded-xl border border-gray-200 hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-phone text-gray-400 mr-3"></i>
                                                <span
                                                    class="text-gray-900 font-medium">{{ $user->phone ?: 'Belum diisi' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Birth Date -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                        <div
                                            class="p-4 bg-gray-50 rounded-xl border border-gray-200 hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-calendar text-gray-400 mr-3"></i>
                                                <span class="text-gray-900 font-medium">
                                                    {{ $user->birth_date ? $user->birth_date->format('d F Y') : 'Belum diisi' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="md:col-span-2 space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <div
                                            class="p-4 bg-gray-50 rounded-xl border border-gray-200 hover:bg-gray-100 transition-colors">
                                            <div class="flex items-start">
                                                <i class="fas fa-map-marker-alt text-gray-400 mr-3 mt-1"></i>
                                                <span
                                                    class="text-gray-900 font-medium">{{ $user->address ?: 'Belum diisi' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Tips -->
                        <div
                            class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 border border-amber-200 card-hover">
                            <div class="flex items-start">
                                <div
                                    class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-lightbulb text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tips untuk Anda</h3>
                                    <ul class="text-sm text-gray-700 space-y-2">
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Lengkapi profil Anda untuk pengalaman yang lebih personal
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Gunakan fitur deteksi untuk monitoring kesehatan rutin
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Simpan riwayat deteksi untuk analisis jangka panjang
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Konsultasikan hasil dengan tenaga medis profesional
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Perbaiki sticky positioning */
        .sticky {
            position: sticky;
            top: 6rem;
            /* Sesuaikan dengan tinggi navbar (h-16 = 4rem) + margin */
        }

        @media (max-width: 1024px) {
            .sticky {
                position: relative;
                top: auto;
            }
        }

        /* Pastikan navbar tidak terpengaruh */
        nav {
            position: sticky !important;
            top: 0 !important;
            z-index: 50 !important;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .hover-lift {
            transition: all 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .hover-scale {
            transition: transform 0.2s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .breadcrumb-link {
            transition: all 0.2s ease;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
        }

        .breadcrumb-link:hover {
            background-color: rgba(236, 72, 153, 0.05);
            transform: translateY(-1px);
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
