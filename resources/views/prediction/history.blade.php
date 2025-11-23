{{-- resources/views/prediction/history.blade.php --}}
@extends('layouts.app')

@section('title', 'Riwayat Prediksi - Breast Cancer Prediction')

@section('content')
    <!-- History Section -->
    <section class="md:pt-10 pb-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">

                <!-- Header Card -->
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Prediksi</h1>
                                <div class="h-1 w-24 bg-pink-500"></div>
                                <p class="text-gray-600 mt-2">Kelola dan lihat semua hasil prediksi Anda</p>
                            </div>
                            <div class="flex gap-3">
                                @php
                                    $lastPrediction = $predictions
                                        ->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))
                                        ->first();
                                    $canCreateNew = !$lastPrediction;
                                    $nextAllowedDate = $lastPrediction
                                        ? $lastPrediction->created_at->addDays(30)
                                        : null;
                                    $daysRemaining = $nextAllowedDate
                                        ? \Carbon\Carbon::now()->diffInDays($nextAllowedDate, false)
                                        : 0;
                                @endphp

                                @if ($canCreateNew)
                                    <a href="{{ route('prediction.form') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                                        <i class="fas fa-plus mr-2"></i>
                                        Prediksi Baru
                                    </a>
                                @else
                                    <div class="text-center">
                                        <button disabled
                                            class="inline-flex items-center px-4 py-2 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed opacity-60">
                                            <i class="fas fa-clock mr-2"></i>
                                            Prediksi Baru
                                        </button>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Tersedia dalam {{ $daysRemaining }} hari
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prediction Limit Notice -->
                @if ($lastPrediction && $daysRemaining > 0)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-yellow-400 text-lg mt-0.5"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">
                                    Batas Prediksi Bulanan
                                </h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p>Anda sudah melakukan prediksi pada
                                        <strong>{{ $lastPrediction->created_at->format('d M Y H:i') }}</strong>.
                                    </p>
                                    <p>Prediksi berikutnya dapat dilakukan pada
                                        <strong>{{ $nextAllowedDate->format('d M Y H:i') }}</strong> ({{ $daysRemaining }}
                                        hari lagi).
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <div class="bg-yellow-200 rounded-full h-2">
                                        @php
                                            $totalDays = 30;
                                            $daysPassed = $totalDays - $daysRemaining;
                                            $progressPercentage = ($daysPassed / $totalDays) * 100;
                                        @endphp
                                        <div class="bg-yellow-500 h-2 rounded-full"
                                            style="width: {{ $progressPercentage }}%"></div>
                                    </div>
                                    <p class="text-xs text-yellow-600 mt-1">{{ $daysPassed }} dari {{ $totalDays }}
                                        hari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Content Card -->
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-6">
                        @if (session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                                <div class="flex">
                                    <i class="fas fa-check-circle mr-2 mt-1"></i>
                                    <span>{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
                                <div class="flex">
                                    <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                    <span>{{ session('warning') }}</span>
                                </div>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                                <div class="flex">
                                    <i class="fas fa-exclamation-circle mr-2 mt-1"></i>
                                    <span>{{ session('error') }}</span>
                                </div>
                            </div>
                        @endif

                        @if ($predictions->count() > 0)
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                                            <i class="fas fa-history text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-blue-600">{{ $predictions->total() }}</h3>
                                            <p class="text-blue-700 text-sm font-medium">Total Prediksi</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                                            <i class="fas fa-check-circle text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-green-600">
                                                {{ $predictions->where('result.prediction', '!=', 'breast cancer')->count() }}
                                            </h3>
                                            <p class="text-green-700 text-sm font-medium">Hasil Negatif</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-full bg-red-500 text-white mr-4">
                                            <i class="fas fa-exclamation-triangle text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-red-600">
                                                {{ $predictions->where('result.prediction', 'breast cancer')->count() }}
                                            </h3>
                                            <p class="text-red-700 text-sm font-medium">Hasil Positif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Predictions Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Hasil
                                                Prediksi</th>
                                            <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($predictions as $index => $prediction)
                                            <tr
                                                class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                                                <td class="px-4 py-3 text-sm text-gray-600 font-medium">
                                                    {{ ($predictions->currentPage() - 1) * $predictions->perPage() + $index + 1 }}
                                                </td>
                                                <td class="px-4 py-3 text-sm text-gray-600">
                                                    <div class="flex flex-col">
                                                        <span
                                                            class="font-medium">{{ $prediction->created_at->format('d M Y') }}</span>
                                                        <span
                                                            class="text-xs text-gray-400">{{ $prediction->created_at->format('H:i') }}
                                                            WITA</span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    @if ($prediction->result)
                                                        <div class="flex items-center">
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                                            {{ $prediction->result->prediction === 'breast cancer' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                                <i
                                                                    class="fas {{ $prediction->result->prediction === 'breast cancer' ? 'fa-exclamation-triangle mr-1' : 'fa-check-circle mr-1' }}"></i>
                                                                {{ $prediction->result->prediction === 'breast cancer' ? 'Berisiko' : 'Tidak Berisiko' }}
                                                            </span>
                                                        </div>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-500">
                                                            <i class="fas fa-question-circle mr-1"></i>
                                                            Tidak tersedia
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 text-center">
                                                    <div class="flex justify-center space-x-2">
                                                        <a href="{{ route('prediction.result', $prediction->id) }}"
                                                            class="inline-flex items-center px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition duration-200">
                                                            <i class="fas fa-eye mr-1"></i>
                                                            Detail
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                                <div class="text-sm text-gray-700 mb-4 sm:mb-0">
                                    Menampilkan {{ $predictions->firstItem() ?? 0 }} sampai
                                    {{ $predictions->lastItem() ?? 0 }}
                                    dari {{ $predictions->total() }} hasil
                                </div>
                                <div>
                                    {{ $predictions->links() }}
                                </div>
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-16">
                                <div
                                    class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                                    <i class="fas fa-history text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada riwayat prediksi</h3>
                                <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                    Anda belum melakukan prediksi apapun. Mulai deteksi dini sekarang untuk melihat riwayat
                                    prediksi Anda.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    @if ($canCreateNew)
                                        <a href="{{ route('prediction.form') }}"
                                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                                            <i class="fas fa-plus mr-2"></i>
                                            Mulai Prediksi
                                        </a>
                                    @else
                                        <button disabled
                                            class="inline-flex items-center px-6 py-3 bg-gray-400 text-white font-semibold rounded-lg cursor-not-allowed">
                                            <i class="fas fa-clock mr-2"></i>
                                            Tunggu {{ $daysRemaining }} Hari
                                        </button>
                                    @endif
                                    <a href="{{ url('/') }}"
                                        class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200">
                                        <i class="fas fa-home mr-2"></i>
                                        Kembali ke Beranda
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Ensure content is below fixed navbar */
        body {
            padding-top: 0;
        }

        /* Fixed navbar height compensation */
        .navbar-spacer {
            height: 80px;
            /* Adjust based on your navbar height */
        }

        .table-auto {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-auto th {
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .table-auto tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
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
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.bg-white');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('fade-in');
                }, index * 100);
            });

            // Add tooltip to status badges
            const statusBadges = document.querySelectorAll('.rounded-full');
            statusBadges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    const isRisk = this.textContent.includes('Berisiko');
                    const tooltip = isRisk ?
                        'Hasil menunjukkan indikasi kemungkinan kanker payudara' :
                        'Hasil menunjukkan tidak ada indikasi kanker payudara';

                    this.setAttribute('title', tooltip);
                });
            });

            // Smooth scroll compensation for fixed navbar
            const anchorLinks = document.querySelectorAll('a[href^="#"]');
            anchorLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault();
                        const navbarHeight = 80; // Adjust based on your navbar height
                        const targetPosition = targetElement.offsetTop - navbarHeight;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
@endpush
