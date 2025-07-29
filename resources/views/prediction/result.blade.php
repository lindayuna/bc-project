@extends('layouts.app')

@section('title', 'Hasil Prediksi - Breast Cancer Prediction')

@section('content')
    <!-- Result Section -->
    <section id="result-prediksi" class="pt-24 pb-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                <!-- Header Card -->
                <div class="bg-white rounded-lg shadow-lg mb-6 print:shadow-none print:border print:border-gray-300">
                    <div class="px-6 py-4 border-b border-gray-200 print:border-gray-400">
                        <div class="flex items-center justify-between print:block">
                            <h2 class="text-2xl font-bold text-gray-900 print:text-center print:text-xl print:mb-2">Hasil
                                Prediksi Kanker Payudara</h2>
                            <div class="text-sm text-gray-500 print:text-center print:text-xs">
                                {{ $prediction->created_at->format('d M Y H:i') }}
                            </div>
                        </div>

                        <!-- Print Header (Only visible when printing) -->
                        <div class="hidden print:block print:mt-4 print:pt-4 print:border-t print:border-gray-300">
                            <div class="text-center">
                                <!-- Logo -->
                                <div class="mb-3">
                                    <img src="{{ asset('img/logo.png') }}" alt="Breast Cancer Detection Logo"
                                        class="mx-auto h-16 w-auto print:h-12 object-contain">
                                </div>
                                <h1 class="text-lg font-bold text-gray-800 mb-1">SISTEM PREDIKSI KANKER PAYUDARA</h1>
                                <p class="text-sm text-gray-600">Laporan Hasil Deteksi Dini</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Result Content -->
                <div class="bg-white rounded-lg shadow-lg print:shadow-none print:border print:border-gray-300">
                    <div class="p-6 print:p-4">
                        @if ($prediction->result)
                            <!-- Main Result -->
                            <div
                                class="text-center mb-8 p-6 rounded-lg print:p-4 print:mb-6 print:border print:border-gray-400 {{ $prediction->result->prediction === 'breast cancer' ? 'bg-red-50 border border-red-200 print:bg-red-50' : 'bg-green-50 border border-green-200 print:bg-green-50' }}">
                                <div class="mb-4 print:mb-3">
                                    <i
                                        class="fas {{ $prediction->result->prediction === 'breast cancer' ? 'fa-exclamation-triangle text-red-500' : 'fa-check-circle text-green-500' }} text-6xl print:text-4xl"></i>
                                </div>
                                <h3
                                    class="text-2xl font-bold mb-2 print:text-xl print:mb-2 {{ $prediction->result->prediction === 'breast cancer' ? 'text-red-800' : 'text-green-800' }}">
                                    {{ $prediction->result->prediction === 'breast cancer' ? 'ANDA MEMILIKI PELUANG UNTUK MENGALAMI KANKER PAYUDARA' : 'SAAT INI ANDA TIDAK MEMILIKI PELUANG UNTUK MENGALAMI KANKER PAYUDARA' }}
                                </h3>
                                <p
                                    class="text-lg print:text-base {{ $prediction->result->prediction === 'breast cancer' ? 'text-red-700' : 'text-green-700' }}">
                                    {{ $prediction->result->prediction === 'breast cancer' ? 'Hasil ini berdasarkan tanda-tanda dan gejala yang anda isikan. Untuk memastikan kondisi anda secara akurat, disarankan melakukan pemeriksaan lanjutan ke tenaga medis atau fasilitas kesehatan.' : 'Hasil ini berdasarkan tanda-tanda dan gejala yang anda isikan. Namun demikian, tetap disarankan untuk rutin melakukan pemeriksaan payudara secara mandiri sebagai langkah pencegahan dan deteksi dini.' }}
                                </p>
                            </div>

                            <!-- Statistics -->
                            <div
                                class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 print:grid-cols-3 print:gap-4 print:mb-6">
                                <!-- Examination Code - Replaced Accuracy -->
                                <div
                                    class="text-center p-4 bg-blue-50 rounded-lg border border-blue-200 print:p-3 print:bg-blue-50 print:border-blue-400">
                                    <div class="text-lg font-bold text-blue-600 mb-2 print:text-base print:mb-1">
                                        <i class="fas fa-barcode mr-2 print:mr-1"></i>
                                        <code class="bg-white px-2 py-1 rounded border text-blue-700">
                                            {{ $prediction->examination_code ?? 'N/A' }}
                                        </code>
                                    </div>
                                    <h4 class="text-sm font-medium text-blue-700 print:text-xs">Kode Pemeriksaan</h4>
                                    <p class="text-xs text-blue-600 mt-1 print:hidden">Kode unik untuk konsultasi dokter</p>
                                </div>

                                @if ($prediction->result->confidence_score)
                                    <div
                                        class="text-center p-4 bg-purple-50 rounded-lg border border-purple-200 print:p-3 print:bg-purple-50 print:border-purple-400">
                                        <div class="text-3xl font-bold text-purple-600 mb-2 print:text-2xl print:mb-1">
                                            @php
                                                $confidenceScore = $prediction->result->confidence_score;

                                                // Cek apakah nilai sudah dalam bentuk persentase atau masih desimal
                                                if ($confidenceScore > 100) {
                                                    // Jika lebih dari 100, kemungkinan sudah dikalikan 100 di database
                                                    $displayScore = min($confidenceScore / 100, 100);
                                                } elseif ($confidenceScore > 1) {
                                                    // Jika antara 1-100, sudah dalam bentuk persentase
                                                    $displayScore = min($confidenceScore, 100);
                                                } else {
                                                    // Jika 0-1, konversi ke persentase
                                                    $displayScore = $confidenceScore * 100;
                                                }

                                                echo number_format($displayScore, 1);
                                            @endphp%
                                        </div>
                                        <h4 class="text-sm font-medium text-purple-700 print:text-xs">Confidence Score</h4>
                                        <p class="text-xs text-purple-600 mt-1 print:hidden">Tingkat kepercayaan prediksi
                                        </p>
                                    </div>
                                @endif

                                <div
                                    class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200 print:p-3 print:bg-gray-50 print:border-gray-400">
                                    <div class="text-xl font-bold text-gray-600 mb-2 print:text-lg print:mb-1">
                                        <i class="fas fa-calendar-alt mr-2 print:mr-1"></i>
                                        {{ $prediction->created_at->format('d/m/Y') }}
                                    </div>
                                    <h4 class="text-sm font-medium text-gray-700 print:text-xs">Tanggal Tes</h4>
                                    <p class="text-xs text-gray-600 mt-1 print:text-xs">
                                        {{ $prediction->created_at->format('H:i') }} WIB</p>
                                </div>
                            </div>

                            <!-- Examination Code Highlight Section -->
                            <div
                                class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-6 mb-6 print:p-4 print:mb-4 print:bg-blue-50 print:border-blue-400">
                                <div class="text-center">
                                    <h4 class="text-lg font-semibold text-blue-800 mb-3 print:text-base print:mb-2">
                                        <i class="fas fa-clipboard-check mr-2"></i>
                                        Kode Pemeriksaan Anda
                                    </h4>
                                    <div class="flex items-center justify-center space-x-3 mb-3">
                                        <code
                                            class="text-2xl font-mono font-bold text-blue-700 bg-white px-4 py-2 rounded-lg border border-blue-300 print:text-xl print:px-3 print:py-1">
                                            {{ $prediction->examination_code ?? 'Tidak tersedia' }}
                                        </code>
                                        <button onclick="copyExaminationCode('{{ $prediction->examination_code }}')"
                                            class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition-colors print:hidden"
                                            title="Salin kode">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                    <p class="text-sm text-blue-700 print:text-xs">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Simpan kode ini untuk konsultasi dengan dokter atau rujukan medis
                                    </p>
                                    <div class="mt-3 text-xs text-blue-600 print:text-xs print:mt-2">
                                        <p>• Tunjukkan kode ini kepada dokter saat konsultasi</p>
                                        <p>• Kode dapat digunakan untuk mencari riwayat pemeriksaan</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Recommendations -->
                            <div
                                class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-6 print:p-4 print:mb-4 print:bg-yellow-50 print:border-yellow-400">
                                <h4
                                    class="flex items-center text-lg font-semibold text-yellow-800 mb-3 print:text-base print:mb-2">
                                    <i class="fas fa-lightbulb mr-2"></i>
                                    Rekomendasi
                                </h4>
                                @if ($prediction->result->prediction === 'breast cancer')
                                    <div class="space-y-2 text-yellow-700 print:space-y-1 print:text-sm">
                                        <p class="flex items-start">
                                            <i class="fas fa-exclamation-circle mt-1 mr-2 text-red-500 print:text-xs"></i>
                                            <strong>Segera konsultasi dengan dokter spesialis</strong> untuk pemeriksaan
                                            lebih lanjut
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-stethoscope mt-1 mr-2 text-blue-500 print:text-xs"></i>
                                            Lakukan pemeriksaan imaging (mammografi, USG, atau MRI) sesuai anjuran dokter
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-heart mt-1 mr-2 text-pink-500 print:text-xs"></i>
                                            Jaga pola hidup sehat dan mental yang positif selama proses pemeriksaan
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-clipboard-check mt-1 mr-2 text-blue-500 print:text-xs"></i>
                                            <strong>Berikan kode pemeriksaan {{ $prediction->examination_code }}</strong>
                                            kepada dokter untuk referensi
                                        </p>
                                    </div>
                                @else
                                    <div class="space-y-2 text-yellow-700 print:space-y-1 print:text-sm">
                                        <p class="flex items-start">
                                            <i class="fas fa-check-circle mt-1 mr-2 text-green-500 print:text-xs"></i>
                                            <strong>Tetap lakukan pemeriksaan rutin</strong> sebagai tindakan pencegahan
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-calendar-check mt-1 mr-2 text-blue-500 print:text-xs"></i>
                                            Jadwalkan pemeriksaan SADARI (Periksa Payudara Sendiri) setiap bulan
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-apple-alt mt-1 mr-2 text-green-600 print:text-xs"></i>
                                            Pertahankan gaya hidup sehat dengan olahraga dan pola makan bergizi
                                        </p>
                                        <p class="flex items-start">
                                            <i class="fas fa-clipboard-check mt-1 mr-2 text-blue-500 print:text-xs"></i>
                                            Simpan kode pemeriksaan <strong>{{ $prediction->examination_code }}</strong>
                                            untuk konsultasi rutin
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <!-- Patient Info for Print -->
                            <div class="hidden print:block print:mb-4">
                                <div class="border border-gray-400 rounded p-4 bg-gray-50">
                                    <h4 class="font-semibold text-base mb-2">Informasi Pemeriksaan</h4>
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="font-medium">Kode Pemeriksaan:</span>
                                            <code
                                                class="bg-white px-2 py-1 rounded border ml-1">{{ $prediction->examination_code ?? 'N/A' }}</code>
                                        </div>
                                        <div>
                                            <span class="font-medium">ID Prediksi:</span> {{ $prediction->id }}
                                        </div>
                                        <div class="col-span-2">
                                            <span class="font-medium">Tanggal & Waktu:</span>
                                            {{ $prediction->created_at->format('d/m/Y H:i') }} WIB
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Disclaimer -->
                            <div
                                class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6 print:p-3 print:mb-4 print:bg-gray-50 print:border-gray-400">
                                <p class="text-sm text-gray-600 text-center print:text-xs print:text-justify">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    <strong>Disclaimer:</strong> Hasil prediksi ini hanya sebagai alat bantu deteksi dini
                                    dan tidak menggantikan diagnosis medis profesional.
                                    Selalu konsultasikan dengan dokter untuk pemeriksaan yang akurat.
                                </p>
                            </div>

                            <!-- Print Footer -->
                            <div class="hidden print:block print:mt-6 print:pt-4 print:border-t print:border-gray-400">
                                <div class="text-center text-xs text-gray-600">
                                    <p>Dokumen ini dicetak pada {{ now()->format('d/m/Y H:i') }} WIB</p>
                                    <p class="mt-1">Sistem Prediksi Kanker Payudara - Teknologi AI untuk Deteksi Dini</p>
                                    <p class="mt-1 font-medium">Kode Pemeriksaan: {{ $prediction->examination_code }}</p>
                                </div>
                            </div>
                        @else
                            <!-- No Result Available -->
                            <div class="text-center py-12 print:py-8">
                                <i
                                    class="fas fa-exclamation-triangle text-6xl text-yellow-400 mb-4 print:text-4xl print:mb-3"></i>
                                <h3 class="text-xl font-semibold text-gray-700 mb-2 print:text-lg">Hasil Prediksi Belum
                                    Tersedia</h3>
                                <p class="text-gray-500 mb-6 print:text-sm print:mb-4">Data sedang diproses atau terjadi
                                    kesalahan sistem</p>
                                <a href="{{ route('prediction.form') }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 print:hidden">
                                    <i class="fas fa-redo mr-2"></i>
                                    Ulangi Prediksi
                                </a>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div
                            class="flex flex-col sm:flex-row gap-4 justify-center pt-6 border-t border-gray-200 print:hidden">
                            <a href="{{ route('prediction.form') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                                <i class="fas fa-plus mr-2"></i>
                                Prediksi Baru
                            </a>

                            <button onclick="printF4Report()"
                                class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200">
                                <i class="fas fa-print mr-2"></i>
                                Cetak Hasil (F4)
                            </button>

                            <a href="{{ url('/') }}"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                                <i class="fas fa-home mr-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* F4 Paper Size: 210mm x 330mm */
        @media print {
            @page {
                size: 210mm 330mm;
                /* F4 Paper Size */
                margin: 20mm 15mm 20mm 15mm;
                /* Top, Right, Bottom, Left */
                font-family: 'Arial', sans-serif;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            body {
                background: white !important;
                font-size: 12px !important;
                line-height: 1.4 !important;
                color: #333 !important;
            }

            .container {
                max-width: none !important;
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            section {
                padding: 0 !important;
                margin: 0 !important;
                background: white !important;
            }

            /* Hide elements from print */
            .print\:hidden {
                display: none !important;
            }

            /* Hide navigation and footer */
            nav,
            footer,
            .navbar,
            .footer,
            .action-buttons,
            [class*="nav"],
            [class*="footer"] {
                display: none !important;
            }

            /* Hide any elements that might be footer-related */
            .bg-gradient-to-r,
            .text-pink-200,
            .text-pink-100,
            .bg-gradient-to-br {
                display: none !important;
            }

            /* Only show main content */
            .print\:block {
                display: block !important;
            }

            .print\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }

            /* Typography for print */
            .print\:text-xs {
                font-size: 10px !important;
            }

            .print\:text-sm {
                font-size: 11px !important;
            }

            .print\:text-base {
                font-size: 12px !important;
            }

            .print\:text-lg {
                font-size: 14px !important;
            }

            .print\:text-xl {
                font-size: 16px !important;
            }

            .print\:text-2xl {
                font-size: 18px !important;
            }

            .print\:text-4xl {
                font-size: 24px !important;
            }

            /* Spacing for print */
            .print\:p-3 {
                padding: 12px !important;
            }

            .print\:p-4 {
                padding: 16px !important;
            }

            .print\:mb-1 {
                margin-bottom: 4px !important;
            }

            .print\:mb-2 {
                margin-bottom: 8px !important;
            }

            .print\:mb-3 {
                margin-bottom: 12px !important;
            }

            .print\:mb-4 {
                margin-bottom: 16px !important;
            }

            .print\:mb-6 {
                margin-bottom: 24px !important;
            }

            .print\:mt-1 {
                margin-top: 4px !important;
            }

            .print\:mt-4 {
                margin-top: 16px !important;
            }

            .print\:mt-6 {
                margin-top: 24px !important;
            }

            .print\:pt-4 {
                padding-top: 16px !important;
            }

            .print\:gap-4 {
                gap: 16px !important;
            }

            .print\:space-y-1>*+* {
                margin-top: 4px !important;
            }

            /* Borders for print */
            .print\:border {
                border-width: 1px !important;
            }

            .print\:border-t {
                border-top-width: 1px !important;
            }

            .print\:border-gray-300 {
                border-color: #d1d5db !important;
            }

            .print\:border-gray-400 {
                border-color: #9ca3af !important;
            }

            .print\:border-blue-400 {
                border-color: #60a5fa !important;
            }

            .print\:border-purple-400 {
                border-color: #a78bfa !important;
            }

            .print\:border-yellow-400 {
                border-color: #fbbf24 !important;
            }

            /* Background colors for print */
            .print\:bg-red-50 {
                background-color: #fef2f2 !important;
            }

            .print\:bg-green-50 {
                background-color: #f0fdf4 !important;
            }

            .print\:bg-blue-50 {
                background-color: #eff6ff !important;
            }

            .print\:bg-purple-50 {
                background-color: #faf5ff !important;
            }

            .print\:bg-yellow-50 {
                background-color: #fefce8 !important;
            }

            .print\:bg-gray-50 {
                background-color: #f9fafb !important;
            }

            /* Text alignment for print */
            .print\:text-center {
                text-align: center !important;
            }

            .print\:text-justify {
                text-align: justify !important;
            }

            .print\:shadow-none {
                box-shadow: none !important;
            }

            /* Remove shadows and rounded corners for print */
            .shadow-lg {
                box-shadow: none !important;
            }

            .rounded-lg {
                border-radius: 8px !important;
            }

            /* Page break controls */
            .break-before-page {
                page-break-before: always !important;
            }

            .break-after-page {
                page-break-after: always !important;
            }

            .break-inside-avoid {
                page-break-inside: avoid !important;
            }

            /* Print specific adjustments */
            .max-w-4xl {
                max-width: none !important;
            }

            /* Grid adjustments for print */
            .grid {
                display: grid !important;
            }

            .gap-6 {
                gap: 16px !important;
            }

            /* Ensure only result content is printed */
            body>*:not(main):not(section):not([id="result-prediksi"]) {
                display: none !important;
            }

            /* Hide any potential website elements */
            .container>*:not(.max-w-4xl) {
                display: none !important;
            }
        }

        .result-animation {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to result cards
            const resultCards = document.querySelectorAll('.bg-white');
            resultCards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('result-animation');
                }, index * 200);
            });

            // Auto scroll to result if URL has hash
            if (window.location.hash === '#result') {
                document.getElementById('result-prediksi').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });

        // F4 Print Function
        function printF4Report() {
            // Show loading state
            const printBtn = event.target.closest('button');
            const originalContent = printBtn.innerHTML;
            printBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyiapkan...';
            printBtn.disabled = true;

            // Add print-specific classes
            document.body.classList.add('printing');

            // Wait a moment for any dynamic content to load
            setTimeout(() => {
                // Trigger print dialog
                window.print();

                // Restore button after print dialog closes
                setTimeout(() => {
                    printBtn.innerHTML = originalContent;
                    printBtn.disabled = false;
                    document.body.classList.remove('printing');
                }, 1000);
            }, 500);
        }

        // Print event listeners
        window.addEventListener('beforeprint', function() {
            document.title = 'Hasil_Prediksi_Kanker_Payudara_' + new Date().toISOString().slice(0, 10);
        });

        window.addEventListener('afterprint', function() {
            document.title = 'Hasil Prediksi - Breast Cancer Prediction';
        });

        // Keyboard shortcut for print (Ctrl+P)
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                printF4Report();
            }
        });
    </script>
@endpush
