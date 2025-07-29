<!-- filepath: d:\dev\breast-cancer-web\resources\views\doctor\profile\index.blade.php -->
@extends('layouts.app')

@section('title', 'Profil Dokter - BreastCare')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-pink-50 pt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">

                <!-- Header Section -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Dokter</h1>
                            <p class="text-gray-600">Selamat datang kembali, kelola profil dan aktivitas Anda</p>
                        </div>
                        <div class="hidden md:flex items-center space-x-3">
                            <div class="flex items-center space-x-2 bg-blue-100 px-4 py-2 rounded-full">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-blue-700 font-medium text-sm">Online</span>
                            </div>
                            <div
                                class="flex items-center space-x-2 bg-white px-4 py-2 rounded-full border border-gray-200 shadow-sm">
                                <i class="fas fa-user-md text-blue-600"></i>
                                <span class="text-gray-700 font-medium text-sm">Dokter Spesialis</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert Messages -->
                @if (session('success'))
                    <div class="bg-white border-l-4 border-green-500 rounded-r-lg shadow-sm mb-6 overflow-hidden">
                        <div class="flex items-center p-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-green-800 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Main Profile Section -->
                    <div class="lg:col-span-8 space-y-6">

                        <!-- Profile Card -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <!-- Header with gradient -->
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8">
                                <div class="flex items-center space-x-6">
                                    <!-- Avatar -->
                                    <div class="relative">
                                        @if ($user->avatar)
                                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar"
                                                class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                                        @else
                                            <div
                                                class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                                                <i class="fas fa-user-md text-3xl text-blue-600"></i>
                                            </div>
                                        @endif
                                        <div
                                            class="absolute -bottom-1 -right-1 w-8 h-8 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                                            <i class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>

                                    <!-- Profile Info -->
                                    <div class="flex-1 text-white">
                                        <h2 class="text-2xl font-bold mb-1">Dr. {{ $user->name }}</h2>
                                        <p class="text-blue-100 mb-2">{{ $user->email }}</p>
                                        @if ($doctor && $doctor->specialization)
                                            <div
                                                class="inline-flex items-center bg-blue-500 bg-opacity-30 px-3 py-1 rounded-full">
                                                <i class="fas fa-stethoscope text-blue-100 text-xs mr-2"></i>
                                                <span
                                                    class="text-blue-100 text-sm font-medium">{{ $doctor->specialization }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Edit Button -->
                                    <div class="hidden md:block">
                                        <a href="{{ route('doctor.profile.edit') }}"
                                            class="bg-white text-blue-600 px-6 py-3 rounded-xl hover:bg-blue-50 transition-all duration-200 flex items-center space-x-2 font-medium shadow-sm">
                                            <i class="fas fa-edit text-sm"></i>
                                            <span>Edit Profil</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Details -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                                    <!-- Personal Information -->
                                    <div class="space-y-4">
                                        <h4
                                            class="text-sm font-semibold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-2">
                                            Informasi Personal</h4>

                                        <div class="space-y-3">
                                            <div>
                                                <label class="text-xs font-medium text-gray-500 uppercase">No.
                                                    Telepon</label>
                                                <p class="text-gray-900 font-medium">{{ $user->phone ?: 'Belum diisi' }}</p>
                                            </div>
                                            <div>
                                                <label class="text-xs font-medium text-gray-500 uppercase">Tanggal
                                                    Lahir</label>
                                                <p class="text-gray-900 font-medium">
                                                    {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d F Y') : 'Belum diisi' }}
                                                </p>
                                            </div>
                                            @if ($doctor)
                                                <div>
                                                    <label class="text-xs font-medium text-gray-500 uppercase">Jenis
                                                        Kelamin</label>
                                                    <p class="text-gray-900 font-medium">
                                                        @if ($doctor->gender === 'male')
                                                            <span class="inline-flex items-center">
                                                                <i class="fas fa-mars text-blue-500 mr-1"></i>
                                                                Laki-laki
                                                            </span>
                                                        @elseif($doctor->gender === 'female')
                                                            <span class="inline-flex items-center">
                                                                <i class="fas fa-venus text-pink-500 mr-1"></i>
                                                                Perempuan
                                                            </span>
                                                        @else
                                                            Belum diisi
                                                        @endif
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Professional Information -->
                                    @if ($doctor)
                                        <div class="space-y-4">
                                            <h4
                                                class="text-sm font-semibold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-2">
                                                Informasi Profesional</h4>

                                            <div class="space-y-3">
                                                <div>
                                                    <label class="text-xs font-medium text-gray-500 uppercase">NIN</label>
                                                    <p class="text-gray-900 font-medium">{{ $doctor->nin ?: 'Belum diisi' }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <label class="text-xs font-medium text-gray-500 uppercase">Nomor
                                                        STR</label>
                                                    <p class="text-gray-900 font-medium">
                                                        {{ $doctor->str_number ?: 'Belum diisi' }}</p>
                                                </div>
                                                <div>
                                                    <label class="text-xs font-medium text-gray-500 uppercase">Tempat
                                                        Praktik</label>
                                                    <p class="text-gray-900 font-medium">
                                                        {{ $doctor->practice_location ?: 'Belum diisi' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Contact Information -->
                                    <div class="space-y-4">
                                        <h4
                                            class="text-sm font-semibold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-2">
                                            Kontak & Alamat</h4>

                                        <div class="space-y-3">
                                            <div>
                                                <label class="text-xs font-medium text-gray-500 uppercase">Email</label>
                                                <p class="text-gray-900 font-medium break-all">{{ $user->email }}</p>
                                            </div>
                                            <div>
                                                <label class="text-xs font-medium text-gray-500 uppercase">Alamat</label>
                                                <p class="text-gray-900 font-medium">{{ $user->address ?: 'Belum diisi' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education History (if exists) -->
                                @if ($doctor && $doctor->education_history)
                                    <div class="mt-8 pt-6 border-t border-gray-100">
                                        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">
                                            Riwayat Pendidikan</h4>
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <p class="text-gray-900 leading-relaxed">{{ $doctor->education_history }}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Mobile Edit Button -->
                                <div class="md:hidden mt-6 pt-6 border-t border-gray-100">
                                    <a href="{{ route('doctor.profile.edit') }}"
                                        class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all duration-200 flex items-center justify-center space-x-2 font-medium">
                                        <i class="fas fa-edit text-sm"></i>
                                        <span>Edit Profil</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-4 space-y-6">

                        <!-- Statistics Card -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-chart-bar text-blue-600 mr-2"></i>
                                    Statistik Aktivitas
                                </h3>
                            </div>

                            <div class="p-6 space-y-4">
                                <div
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl border border-green-200">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-sm">
                                            <i class="fas fa-clock text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Aktivitas Terakhir</p>
                                            <p class="text-xs text-gray-600">
                                                {{ isset($lastActivity) && $lastActivity ? $lastActivity->diffForHumans() : 'Belum ada aktivitas' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                                    Aksi Cepat
                                </h3>
                            </div>

                            <div class="p-6 space-y-3">
                                <a href="{{ route('doctor.search') }}"
                                    class="group w-full flex items-center space-x-4 p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 border border-transparent hover:border-blue-200">
                                    <div
                                        class="w-12 h-12 bg-blue-100 group-hover:bg-blue-200 rounded-xl flex items-center justify-center transition-colors">
                                        <i class="fas fa-search text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm">Pencarian Prediksi</p>
                                        <p class="text-xs text-gray-500">Cari hasil prediksi pasien</p>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 ml-auto"></i>
                                </a>

                                <a href="{{ route('doctor.profile.edit') }}"
                                    class="group w-full flex items-center space-x-4 p-4 text-gray-700 hover:text-purple-600 hover:bg-purple-50 rounded-xl transition-all duration-200 border border-transparent hover:border-purple-200">
                                    <div
                                        class="w-12 h-12 bg-purple-100 group-hover:bg-purple-200 rounded-xl flex items-center justify-center transition-colors">
                                        <i class="fas fa-user-edit text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-sm">Edit Profil</p>
                                        <p class="text-xs text-gray-500">Perbarui informasi profil</p>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600 ml-auto"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Account Security -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                                    Keamanan Akun
                                </h3>
                            </div>

                            <div class="p-6">
                                <div
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl border border-yellow-200">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center shadow-sm">
                                            <i class="fas fa-lock text-white"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Password</p>
                                            <p class="text-xs text-gray-600">Terakhir diubah:
                                                {{ $user->updated_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <button onclick="openPasswordModal()"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium text-sm transition-colors">
                                        Ubah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Change Modal -->
    <div id="passwordModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-lock text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Ubah Password</h3>
                    </div>
                    <button onclick="closePasswordModal()" class="text-gray-400 hover:text-gray-600 p-2">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('doctor.profile.password') }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password Saat Ini
                        </label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password"
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Masukkan password saat ini" required>
                            <i class="fas fa-lock absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Masukkan password baru" required>
                            <i class="fas fa-key absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Ulangi password baru" required>
                            <i class="fas fa-check-circle absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="flex space-x-3 mt-8">
                        <button type="button" onclick="closePasswordModal()"
                            class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openPasswordModal() {
            document.getElementById('passwordModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            // Reset form
            document.querySelector('#passwordModal form').reset();
        }

        // Close modal when clicking outside
        document.getElementById('passwordModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePasswordModal();
            }
        });

        // ESC key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePasswordModal();
            }
        });
    </script>
@endsection
