<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Prediction Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-900">Breast Cancer Prediction</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-700">Welcome, {{ auth()->user()->name }}</span>
                        <form action="{{ route('user.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-500">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <!-- Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-6 p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg border border-yellow-200">
                    {{ session('warning') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 text-sm text-red-700 bg-red-100 rounded-lg border border-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Formulir Prediksi Kanker Payudara</h2>
                    <p class="mt-1 text-sm text-gray-600">Lengkapi semua pertanyaan di bawah ini untuk mendapatkan prediksi.</p>
                </div>

                <form action="{{ route('prediction.store') }}" method="POST" class="p-6">
                    @csrf
                    
                    <!-- Section 1: Risiko & Benjolan -->
                    <div class="mb-8">
                        <h3 class="text-md font-medium text-gray-900 mb-4">1. Risiko & Benjolan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Faktor Risiko -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Faktor Risiko</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="faktor_risiko" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('faktor_risiko') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="faktor_risiko" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('faktor_risiko') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('faktor_risiko')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Benjolan di Payudara -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Benjolan di Payudara</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="benjolan_di_payudara" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('benjolan_di_payudara') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="benjolan_di_payudara" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('benjolan_di_payudara') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('benjolan_di_payudara')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kecepatan Tumbuh -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecepatan Tumbuh</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="kecepatan_tumbuh" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('kecepatan_tumbuh') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="kecepatan_tumbuh" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('kecepatan_tumbuh') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('kecepatan_tumbuh')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Benjolan Ketiak -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Benjolan Ketiak</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="benjolan_ketiak" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('benjolan_ketiak') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="benjolan_ketiak" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('benjolan_ketiak') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('benjolan_ketiak')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Gejala Putting & Kulit -->
                    <div class="mb-8">
                        <h3 class="text-md font-medium text-gray-900 mb-4">2. Gejala Putting & Kulit</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nipple Discharge -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nipple Discharge</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="nipple_discharge" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('nipple_discharge') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="nipple_discharge" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('nipple_discharge') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('nipple_discharge')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Retraksi Putting Susu -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Retraksi Putting Susu</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="retraksi_putting_susu" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('retraksi_putting_susu') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="retraksi_putting_susu" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('retraksi_putting_susu') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('retraksi_putting_susu')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Krusta -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Krusta</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="krusta" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('krusta') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="krusta" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('krusta') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('krusta')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dimpling -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Dimpling</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="dimpling" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('dimpling') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="dimpling" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('dimpling') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('dimpling')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Perubahan Kulit -->
                    <div class="mb-8">
                        <h3 class="text-md font-medium text-gray-900 mb-4">3. Perubahan Kulit</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Peau d'Orange -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Peau d'Orange</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="peau_dorange" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('peau_dorange') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="peau_dorange" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('peau_dorange') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('peau_dorange')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Ulserasi -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ulserasi</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="ulserasi" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('ulserasi') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="ulserasi" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('ulserasi') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('ulserasi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Venektasi -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Venektasi</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="venektasi" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('venektasi') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="venektasi" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('venektasi') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('venektasi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Gejala Sistemik -->
                    <div class="mb-8">
                        <h3 class="text-md font-medium text-gray-900 mb-4">4. Gejala Sistemik</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Edema Lengan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Edema Lengan</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="edema_lengan" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('edema_lengan') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="edema_lengan" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('edema_lengan') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('edema_lengan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nyeri Tulang -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nyeri Tulang</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="nyeri_tulang" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('nyeri_tulang') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="nyeri_tulang" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('nyeri_tulang') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('nyeri_tulang')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sesak -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sesak</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="radio" name="sesak" value="ya" class="text-indigo-600 focus:ring-indigo-500" {{ old('sesak') == 'ya' ? 'checked' : '' }} required>
                                        <span class="ml-2 text-sm text-gray-700">Ya</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="sesak" value="tidak" class="text-indigo-600 focus:ring-indigo-500" {{ old('sesak') == 'tidak' ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">Tidak</span>
                                    </label>
                                </div>
                                @error('sesak')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200"
                        >
                            Kirim Prediksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>