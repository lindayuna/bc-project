<!-- filepath: d:\dev\breast-cancer-web\resources\views\doctor\prediction-detail.blade.php -->
@extends('layouts.app')

@section('title', 'Detail Prediksi - ' . $prediction->examination_code)

@section('content')
    <div class="min-h-screen bg-gray-50 pt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">

                <!-- Header -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 no-print">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Detail Hasil Prediksi</h1>
                                <p class="text-gray-600 mt-1">Kode: <code
                                        class="bg-gray-100 px-2 py-1 rounded">{{ $prediction->examination_code }}</code></p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('doctor.search') }}"
                                    class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                                </a>
                                <button onclick="printDoctorReport()"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-print mr-2"></i>Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Print Header (Only visible in print) -->
                <div class="print-only mb-8">
                    <div class="text-center border-b-2 border-blue-600 pb-6 mb-6">
                        <div class="flex items-center justify-center mb-4">
                            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user-md text-white text-2xl"></i>
                            </div>
                            <div class="text-left">
                                <h1 class="text-3xl font-bold text-blue-800">BreastCare</h1>
                                <p class="text-blue-600 font-medium">Sistem Prediksi Kanker Payudara</p>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">LAPORAN HASIL PREDIKSI</h2>
                        <p class="text-gray-600">Kode Pemeriksaan: <strong>{{ $prediction->examination_code }}</strong></p>
                        <p class="text-gray-600">Tanggal Cetak: <strong>{{ now()->format('d F Y, H:i') }} WIB</strong></p>
                    </div>

                    <!-- Patient Information for Print -->
                    <div class="bg-white border border-gray-300 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-200 pb-2">Informasi Pasien</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-600">Nama Pasien:</label>
                                <p class="text-gray-900 font-semibold">{{ $prediction->user->name }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Email:</label>
                                <p class="text-gray-900 font-semibold">{{ $prediction->user->email }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Kode Pemeriksaan:</label>
                                <p class="text-gray-900 font-semibold font-mono">{{ $prediction->examination_code }}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Tanggal Tes:</label>
                                <p class="text-gray-900 font-semibold">{{ $prediction->created_at->format('d F Y, H:i') }}
                                    WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Patient Information (Screen only) -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 no-print">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Informasi Pasien</h2>
                            </div>
                            <div class="p-6">
                                <div class="text-center mb-6">
                                    <div
                                        class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-user text-2xl text-gray-500"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-900">{{ $prediction->user->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $prediction->user->email }}</p>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="text-sm text-gray-600">User ID</span>
                                        <span class="text-sm font-medium">#{{ $prediction->user->id }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="text-sm text-gray-600">Kode Pemeriksaan</span>
                                        <code
                                            class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">{{ $prediction->examination_code }}</code>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="text-sm text-gray-600">Tanggal Tes</span>
                                        <span
                                            class="text-sm font-medium">{{ $prediction->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-sm text-gray-600">Status</span>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>Selesai
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 no-print">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Aksi Cepat</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                <button onclick="printDoctorReport()"
                                    class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-print mr-2"></i>Cetak Laporan
                                </button>
                                <button onclick="copyExaminationCode('{{ $prediction->examination_code }}')"
                                    class="w-full flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-copy mr-2"></i>Salin Kode
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Prediction Results & Details -->
                    <div class="lg:col-span-2">

                        <!-- Result Summary -->
                        @if ($prediction->result)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <h2 class="text-lg font-semibold text-gray-900">Hasil Prediksi</h2>
                                </div>
                                <div class="p-6">
                                    <div
                                        class="text-center p-6 rounded-lg border-2 {{ $prediction->result->prediction === 'breast cancer' ? 'bg-red-50 border-red-300' : 'bg-green-50 border-green-300' }}">
                                        <div class="mb-4">
                                            <i
                                                class="fas {{ $prediction->result->prediction === 'breast cancer' ? 'fa-exclamation-triangle text-red-500' : 'fa-check-circle text-green-500' }} text-4xl"></i>
                                        </div>
                                        <h3
                                            class="text-xl font-bold mb-2 {{ $prediction->result->prediction === 'breast cancer' ? 'text-red-800' : 'text-green-800' }}">
                                            {{ $prediction->result->prediction === 'breast cancer' ? 'POTENSI KANKER PAYUDARA' : 'TIDAK TERDETEKSI KANKER PAYUDARA' }}
                                        </h3>
                                        <p
                                            class="text-sm {{ $prediction->result->prediction === 'breast cancer' ? 'text-red-700' : 'text-green-700' }} font-medium">
                                            Prediksi: {{ ucfirst($prediction->result->prediction) }}
                                        </p>
                                    </div>

                                    <!-- Statistics -->
                                    <div class="grid grid-cols-2 gap-4 mt-6">
                                        @if ($prediction->result->confidence_score)
                                            <div class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200">
                                                <div class="text-2xl font-bold text-purple-600 mb-1">
                                                    @php
                                                        $confidenceScore = $prediction->result->confidence_score;
                                                        if ($confidenceScore <= 1) {
                                                            $percentage = number_format($confidenceScore * 100, 1);
                                                        } else {
                                                            $percentage = number_format($confidenceScore, 1);
                                                        }
                                                        $percentage = min($percentage, 100);
                                                    @endphp
                                                    {{ $percentage }}%
                                                </div>
                                                <h4 class="text-sm font-medium text-purple-700">Confidence Score</h4>
                                            </div>
                                        @endif
                                        <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                                            <div class="text-lg font-bold text-gray-600 mb-1">
                                                {{ $prediction->created_at->format('d/m/Y') }}
                                            </div>
                                            <h4 class="text-sm font-medium text-gray-700">Tanggal Tes</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Patient Input Details -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Detail Input Pasien</h2>
                                <p class="text-sm text-gray-600 mt-1">Data yang diinput oleh pasien saat melakukan prediksi
                                </p>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <!-- Medical History -->
                                    <div>
                                        <h3
                                            class="text-base font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                                            Riwayat & Faktor Risiko</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Faktor Risiko</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->faktor_risiko === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->faktor_risiko) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Benjolan di Payudara</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->benjolan_di_payudara === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->benjolan_di_payudara) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Kecepatan Tumbuh
                                                    Benjolan</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->kecepatan_tumbuh === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->kecepatan_tumbuh) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Benjolan Ketiak</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->benjolan_ketiak === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->benjolan_ketiak) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Physical Symptoms -->
                                    <div>
                                        <h3
                                            class="text-base font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                                            Gejala Fisik</h3>
                                        <div class="space-y-3">
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Nipple Discharge</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->nipple_discharge === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->nipple_discharge) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Retraksi Putting
                                                    Susu</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->retraksi_putting_susu === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->retraksi_putting_susu) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Krusta</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->krusta === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->krusta) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Dimpling</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->dimpling === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->dimpling) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Advanced Symptoms -->
                                    <div>
                                        <h3
                                            class="text-base font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                                            Gejala Lanjutan</h3>
                                        <div class="space-y-3">
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Peau d'Orange</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->peau_dorange === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->peau_dorange) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Ulserasi</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->ulserasi === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->ulserasi) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Venektasi</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->venektasi === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->venektasi) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Edema Lengan</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->edema_lengan === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->edema_lengan) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Systemic Symptoms -->
                                    <div>
                                        <h3
                                            class="text-base font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                                            Gejala Sistemik</h3>
                                        <div class="space-y-3">
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Nyeri Tulang</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->nyeri_tulang === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->nyeri_tulang) }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                                <span class="text-sm text-gray-700 font-medium">Sesak Napas</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $prediction->sesak === 'ya' ? 'bg-red-100 text-red-800 border border-red-300' : 'bg-green-100 text-green-800 border border-green-300' }}">
                                                    {{ strtoupper($prediction->sesak) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Removed: Summary Stats section completely -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Print Footer -->
                <div class="print-only mt-12 pt-8 border-t-2 border-gray-300">
                    <div class="text-center text-gray-600">
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>© {{ date('Y') }} BreastCare - Sistem Prediksi Kanker Payudara</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function printDoctorReport() {
                window.print();
            }

            function copyExaminationCode(code) {
                navigator.clipboard.writeText(code).then(function() {
                    const successMsg = document.createElement('div');
                    successMsg.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg z-50';
                    successMsg.innerHTML = '<i class="fas fa-check mr-2"></i>Kode berhasil disalin!';
                    document.body.appendChild(successMsg);

                    setTimeout(() => {
                        document.body.removeChild(successMsg);
                    }, 3000);
                }).catch(function() {
                    alert('Gagal menyalin kode. Silakan salin manual: ' + code);
                });
            }
        </script>
    @endpush

    @push('styles')
        <style>
            /* Print Styles */
            @media print {

                /* Hide elements that shouldn't be printed */
                .no-print,
                .no-print *,
                button,
                nav,
                footer,
                .fixed,
                .sticky {
                    display: none !important;
                }

                /* Show print-only elements */
                .print-only {
                    display: block !important;
                }

                /* Reset print styles */
                * {
                    -webkit-print-color-adjust: exact !important;
                    color-adjust: exact !important;
                }

                body {
                    background: white !important;
                    font-size: 12px !important;
                    line-height: 1.4 !important;
                    color: black !important;
                }

                .container {
                    max-width: none !important;
                    padding: 0 !important;
                    margin: 0 !important;
                }

                /* Card styles for print */
                .bg-white {
                    background: white !important;
                    border: 1px solid #e5e7eb !important;
                }

                .rounded-xl,
                .rounded-lg {
                    border-radius: 8px !important;
                }

                .shadow-sm {
                    box-shadow: none !important;
                }

                /* Grid adjustments for print */
                .grid {
                    display: grid !important;
                }

                .lg\:col-span-3 {
                    grid-column: span 3 / span 3 !important;
                }

                .lg\:col-span-2 {
                    grid-column: span 2 / span 2 !important;
                }

                .lg\:col-span-1 {
                    grid-column: span 1 / span 1 !important;
                }

                .md\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                }

                .md\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
                }

                /* Typography for print */
                .text-3xl {
                    font-size: 1.875rem !important;
                }

                .text-2xl {
                    font-size: 1.5rem !important;
                }

                .text-xl {
                    font-size: 1.25rem !important;
                }

                .text-lg {
                    font-size: 1.125rem !important;
                }

                .text-sm {
                    font-size: 0.875rem !important;
                }

                .text-xs {
                    font-size: 0.75rem !important;
                }

                /* Colors for print */
                .text-blue-800 {
                    color: #1e40af !important;
                }

                .text-blue-600 {
                    color: #2563eb !important;
                }

                .text-red-800 {
                    color: #991b1b !important;
                }

                .text-green-800 {
                    color: #166534 !important;
                }

                .text-purple-600 {
                    color: #9333ea !important;
                }

                /* Background colors for print */
                .bg-red-50 {
                    background-color: #fef2f2 !important;
                }

                .bg-green-50 {
                    background-color: #f0fdf4 !important;
                }

                .bg-blue-50 {
                    background-color: #eff6ff !important;
                }

                .bg-purple-50 {
                    background-color: #faf5ff !important;
                }

                .bg-gray-50 {
                    background-color: #f9fafb !important;
                }

                /* Border colors for print */
                .border-red-300 {
                    border-color: #fca5a5 !important;
                }

                .border-green-300 {
                    border-color: #86efac !important;
                }

                .border-blue-200 {
                    border-color: #bfdbfe !important;
                }

                .border-purple-200 {
                    border-color: #e9d5ff !important;
                }

                /* Page breaks */
                .break-before {
                    page-break-before: always !important;
                }

                .break-after {
                    page-break-after: always !important;
                }

                .break-inside-avoid {
                    page-break-inside: avoid !important;
                }

                /* Print page setup */
                @page {
                    margin: 1cm;
                    size: A4;
                }

                /* Spacing for print */
                .p-6 {
                    padding: 1rem !important;
                }

                .p-4 {
                    padding: 0.75rem !important;
                }

                .p-3 {
                    padding: 0.5rem !important;
                }

                .mb-6 {
                    margin-bottom: 1rem !important;
                }

                .mb-4 {
                    margin-bottom: 0.75rem !important;
                }

                .gap-6 {
                    gap: 1rem !important;
                }

                .gap-4 {
                    gap: 0.75rem !important;
                }
            }

            /* Hide print-only elements by default */
            .print-only {
                display: none;
            }

            /* Ensure good contrast for screen viewing */
            @media screen {
                .bg-red-100 {
                    background-color: #fee2e2;
                }

                .bg-green-100 {
                    background-color: #dcfce7;
                }

                .text-red-800 {
                    color: #991b1b;
                }

                .text-green-800 {
                    color: #166534;
                }
            }
        </style>
    @endpush
@endsection
