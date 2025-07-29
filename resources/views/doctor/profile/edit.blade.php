<!-- filepath: d:\dev\breast-cancer-web\resources\views\doctor\profile\edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Profil Dokter - BreastCare')

@section('content')
    <div class="min-h-screen bg-gray-50 pt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-2xl mx-auto">

                <!-- Header -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Edit Profil Dokter</h1>
                                <p class="text-gray-600 mt-1">Perbarui informasi profil dokter Anda</p>
                            </div>
                            <a href="{{ route('doctor.profile') }}"
                                class="text-gray-600 hover:text-gray-900 flex items-center space-x-2">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alert Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <h4 class="font-medium mb-2">Terdapat kesalahan:</h4>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Edit Form -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="p-6">

                            <!-- Avatar Section -->
                            <div class="mb-8">
                                <label class="block text-sm font-medium text-gray-700 mb-4">Foto Profil</label>
                                <div class="flex items-center space-x-6">
                                    <div class="flex-shrink-0">
                                        @if ($user->avatar)
                                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar"
                                                id="avatar-preview"
                                                class="w-20 h-20 rounded-full object-cover border-4 border-blue-100">
                                        @else
                                            <div id="avatar-preview"
                                                class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center border-4 border-blue-200">
                                                <i class="fas fa-user-md text-2xl text-blue-600"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden"
                                            onchange="previewAvatar(this)">
                                        <label for="avatar"
                                            class="cursor-pointer bg-blue-50 text-blue-600 px-4 py-2 rounded-lg border border-blue-200 hover:bg-blue-100 transition-colors inline-flex items-center space-x-2">
                                            <i class="fas fa-camera"></i>
                                            <span>Pilih Foto</span>
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">JPG, PNG atau GIF. Maksimal 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pribadi</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Name -->
                                    <div class="md:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                            Nama Lengkap <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="name" name="name"
                                            value="{{ old('name', $user->name) }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                                            required>
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="md:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                            Email <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $user->email) }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                                            required>
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                            No. Telepon
                                        </label>
                                        <input type="text" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone) }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror"
                                            placeholder="Contoh: 08123456789">
                                        @error('phone')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Birth Date -->
                                    <div>
                                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1">
                                            Tanggal Lahir
                                        </label>
                                        <input type="date" id="birth_date" name="birth_date"
                                            value="{{ old('birth_date', $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') : '') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('birth_date') border-red-500 @enderror">
                                        @error('birth_date')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- NIN -->
                                    <div>
                                        <label for="nin" class="block text-sm font-medium text-gray-700 mb-1">
                                            NIN (Nomor Induk Nasional)
                                        </label>
                                        <input type="text" id="nin" name="nin"
                                            value="{{ old('nin', $doctor->nin ?? '') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nin') border-red-500 @enderror"
                                            placeholder="Contoh: 1234567890123456">
                                        @error('nin')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Gender -->
                                    <div>
                                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">
                                            Jenis Kelamin
                                        </label>
                                        <select id="gender" name="gender"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('gender') border-red-500 @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="male"
                                                {{ old('gender', $doctor->gender ?? '') === 'male' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="female"
                                                {{ old('gender', $doctor->gender ?? '') === 'female' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="md:col-span-2">
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                                            Alamat
                                        </label>
                                        <textarea id="address" name="address" rows="3"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('address') border-red-500 @enderror"
                                            placeholder="Masukkan alamat lengkap">{{ old('address', $user->address) }}</textarea>
                                        @error('address')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Information -->
                            <div class="mb-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Profesional</h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Specialization -->
                                    <div>
                                        <label for="specialization" class="block text-sm font-medium text-gray-700 mb-1">
                                            Spesialisasi
                                        </label>
                                        <input type="text" id="specialization" name="specialization"
                                            value="{{ old('specialization', $doctor->specialization ?? '') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('specialization') border-red-500 @enderror"
                                            placeholder="Contoh: Onkologi, Bedah, dll">
                                        @error('specialization')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- STR Number -->
                                    <div>
                                        <label for="str_number" class="block text-sm font-medium text-gray-700 mb-1">
                                            Nomor STR
                                        </label>
                                        <input type="text" id="str_number" name="str_number"
                                            value="{{ old('str_number', $doctor->str_number ?? '') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('str_number') border-red-500 @enderror"
                                            placeholder="Nomor Surat Tanda Registrasi">
                                        @error('str_number')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Practice Location -->
                                    <div class="md:col-span-2">
                                        <label for="practice_location"
                                            class="block text-sm font-medium text-gray-700 mb-1">
                                            Tempat Praktik
                                        </label>
                                        <input type="text" id="practice_location" name="practice_location"
                                            value="{{ old('practice_location', $doctor->practice_location ?? '') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('practice_location') border-red-500 @enderror"
                                            placeholder="Nama rumah sakit/klinik">
                                        @error('practice_location')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Education History -->
                                    <div class="md:col-span-2">
                                        <label for="education_history"
                                            class="block text-sm font-medium text-gray-700 mb-1">
                                            Riwayat Pendidikan
                                        </label>
                                        <textarea id="education_history" name="education_history" rows="4"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('education_history') border-red-500 @enderror"
                                            placeholder="Contoh: S1 Kedokteran Universitas Indonesia (2010-2016), Spesialis Onkologi RS Cipto Mangunkusumo (2017-2021)">{{ old('education_history', $doctor->education_history ?? '') }}</textarea>
                                        @error('education_history')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-4 pt-6 border-t border-gray-200">
                                <a href="{{ route('doctor.profile') }}"
                                    class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 text-center rounded-lg hover:bg-gray-50 transition-colors">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-2">
                                    <i class="fas fa-save"></i>
                                    <span>Simpan Perubahan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewAvatar(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const preview = document.getElementById('avatar-preview');
                    preview.innerHTML =
                        `<img src="${e.target.result}" alt="Avatar Preview" class="w-20 h-20 rounded-full object-cover">`;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
