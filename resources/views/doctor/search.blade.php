<!-- filepath: d:\dev\breast-cancer-web\resources\views\doctor\search.blade.php -->
@extends('layouts.app')

@section('title', 'Pencarian Hasil Prediksi - Doctor Panel')

@section('content')
    <div class="min-h-screen bg-gray-50 pt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">

                <!-- Header -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Panel Dokter</h1>
                                <p class="text-gray-600 mt-1">Pencarian Hasil Prediksi Pasien</p>
                            </div>
                            <div class="flex items-center space-x-2 bg-blue-50 px-4 py-2 rounded-lg">
                                <i class="fas fa-user-md text-blue-600"></i>
                                <span class="text-blue-700 font-medium">Dr. {{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Form -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6">
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                <i class="fas fa-search text-2xl text-blue-600"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">Cari Hasil Prediksi</h2>
                            <p class="text-gray-600">Masukkan kode pemeriksaan untuk melihat hasil prediksi pasien</p>
                        </div>

                        <!-- Search Form -->
                        <form action="{{ route('doctor.search.result') }}" method="POST" class="max-w-md mx-auto">
                            @csrf
                            <div class="mb-6">
                                <label for="examination_code" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kode Pemeriksaan
                                </label>
                                <div class="relative">
                                    <input type="text" id="examination_code" name="examination_code"
                                        value="{{ old('examination_code') }}" placeholder="Contoh: BC-202407-A1B2"
                                        class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono text-center text-lg @error('examination_code') border-red-500 @enderror"
                                        required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-barcode text-gray-400"></i>
                                    </div>
                                </div>
                                @error('examination_code')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors font-medium flex items-center justify-center space-x-2">
                                <i class="fas fa-search"></i>
                                <span>Cari Hasil Prediksi</span>
                            </button>
                        </form>

                        <!-- Format Info -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Format Kode Pemeriksaan:</h3>
                            <div class="text-sm text-gray-600 space-y-1">
                                <p>• Format: <code class="bg-white px-2 py-1 rounded border">BC-YYYYMM-XXXX</code></p>
                                <p>• BC = Breast Cancer</p>
                                <p>• YYYY = Tahun, MM = Bulan</p>
                                <p>• XXXX = Kode unik</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Searches (Optional) -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Tips Pencarian</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Kode Valid</h4>
                                    <p class="text-sm text-gray-600">Pastikan format kode sesuai dengan yang diberikan
                                        pasien</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-eye text-blue-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Detail Lengkap</h4>
                                    <p class="text-sm text-gray-600">Lihat hasil prediksi dan inputan lengkap pasien</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-print text-purple-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Cetak Laporan</h4>
                                    <p class="text-sm text-gray-600">Cetak hasil untuk dokumentasi medis</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div
                                    class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-shield-alt text-yellow-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Privasi Terjaga</h4>
                                    <p class="text-sm text-gray-600">Data pasien hanya dapat diakses dengan kode valid</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in">
            <div class="flex items-center space-x-2">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @push('scripts')
        <script>
            // Auto remove alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.animate-fade-in');
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(100%)';
                    setTimeout(() => alert.remove(), 300);
                });
            }, 5000);

            // Format kode input
            document.getElementById('examination_code').addEventListener('input', function(e) {
                let value = e.target.value.toUpperCase();
                // Remove any non-alphanumeric characters except hyphens
                value = value.replace(/[^A-Z0-9-]/g, '');
                e.target.value = value;
            });
        </script>
    @endpush

    @push('styles')
        <style>
            .animate-fade-in {
                animation: fadeIn 0.3s ease-in-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateX(100%);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
        </style>
    @endpush
@endsection
