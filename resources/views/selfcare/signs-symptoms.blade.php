{{-- filepath: d:\dev\breast-cancer-web\resources\views\selfcare\signs-symptoms.blade.php --}}
@extends('layouts.app')

@section('title', 'Tanda dan Gejala Kanker Payudara - BreastCare')

@section('content')
    <div class="min-h-screen bg-white">
        <!-- Breadcrumb -->
        <div class="bg-gray-50 border-b border-gray-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 hover:underline">Home</a>
                    <span class="text-gray-500">›</span>
                    <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Selfcare</a>
                    <span class="text-gray-500">›</span>
                    <span class="text-gray-700">Tanda dan Gejala</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Article -->
                <article class="lg:col-span-3">

                    @php
                        // Query data untuk Signs & Symptoms
                        $signsSymptoms = \App\Models\Content::where('category', 'signs-symptoms')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp

                    <!-- Header Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Tanda dan Gejala Kanker Payudara</h1>
                        <div class="bg-gradient-to-r from-orange-50 to-red-50 border-l-4 border-orange-400 p-6 rounded-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-orange-400 text-2xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-orange-800">Deteksi Dini Sangat Penting</h3>
                                    <p class="mt-2 text-sm text-orange-700">
                                        Mengenali tanda dan gejala kanker payudara sejak dini dapat meningkatkan peluang
                                        kesembuhan hingga 95%. Lakukan pemeriksaan rutin dan waspadai perubahan pada
                                        payudara Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Content from Filament -->
                    @if ($signsSymptoms->count() > 0)
                        @foreach ($signsSymptoms as $content)
                            <section class="mb-12">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-6">{{ $content->title }}</h2>

                                <!-- Featured Image -->
                                @if ($content->image)
                                    <figure class="mb-8">
                                        <div class="bg-white rounded-lg p-4 text-center shadow-sm border">
                                            <img src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}"
                                                class="max-w-full h-auto rounded-lg shadow-lg mx-auto" />
                                        </div>
                                        @if ($content->source)
                                            <figcaption class="text-sm text-gray-600 text-center mt-3 italic">
                                                Sumber: {{ $content->source }}
                                            </figcaption>
                                        @endif
                                    </figure>
                                @endif

                                <!-- Content Body -->
                                <div class="article-content">
                                    {!! $content->body !!}
                                </div>

                                <!-- Meta Info -->
                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                            <span class="flex items-center bg-gray-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-calendar mr-2"></i>
                                                {{ $content->created_at->format('d M Y') }}
                                            </span>
                                            @if ($content->source)
                                                <span class="flex items-center bg-orange-100 px-3 py-1 rounded-full">
                                                    <i class="fas fa-user mr-2"></i>
                                                    {{ $content->source }}
                                                </span>
                                            @endif
                                            <span class="flex items-center bg-red-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-tag mr-2"></i>
                                                Tanda dan Gejala
                                            </span>
                                        </div>

                                        <!-- Social Share -->
                                        <div class="flex items-center space-x-2">
                                            <span class="text-sm text-gray-500 mr-2">Bagikan:</span>
                                            <button onclick="shareArticle()"
                                                class="p-2 text-blue-600 hover:bg-blue-100 rounded-full transition-colors duration-200">
                                                <i class="fas fa-share-alt"></i>
                                            </button>
                                            <button onclick="window.print()"
                                                class="p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors duration-200">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach
                    @else
                        <!-- Fallback: Tampilkan pesan jika tidak ada konten -->
                        <div class="text-center py-12">
                            <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-search text-orange-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Konten Sedang Disiapkan</h3>
                            <p class="text-gray-500 mb-4">
                                Informasi tentang tanda dan gejala kanker payudara sedang disiapkan oleh tim medis kami.
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    @endif
                </article>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    @php
                        // Query related content untuk sidebar
                        $relatedContents = \App\Models\Content::whereIn('category', [
                            'breast-cancer-info',
                            'risk-factors',
                            'sadari',
                            'detection-benefits',
                            'guidelines',
                        ])
                            ->limit(6)
                            ->get();
                    @endphp

                    <!-- Emergency Alert -->
                    <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-hospital text-red-600 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Segera Konsultasi</h3>
                                <p class="mt-1 text-xs text-red-700">
                                    Jika Anda menemukan benjolan atau perubahan pada payudara, segera konsultasi dengan
                                    dokter.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Links -->
                    <div class="bg-blue-50 rounded-lg p-6 mb-6 border border-blue-200">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4 flex items-center">
                            <i class="fas fa-link mr-2"></i>
                            Tautan Terkait
                        </h3>
                        <nav class="space-y-3">
                            @forelse($relatedContents as $related)
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    {{ $related->title }}
                                </a>
                            @empty
                                <!-- Default static links -->
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Apa itu kanker payudara?
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Faktor risiko kanker payudara
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Cara melakukan SADARI
                                </a>
                            @endforelse
                        </nav>
                    </div>

                    <!-- Call to Action -->
                    <div
                        class="bg-gradient-to-br from-orange-500 to-red-600 rounded-lg p-6 text-white text-center shadow-lg">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-stethoscope text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-3">Deteksi Dini</h3>
                        <p class="text-sm mb-4 opacity-90 leading-relaxed">
                            Lakukan SADARI setiap bulan untuk mendeteksi perubahan pada payudara
                        </p>
                        <a href="{{ route('prediction.form') }}"
                            class="inline-block bg-white text-orange-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-200 shadow">
                            Pelajari SADARI
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Include CSS yang sama -->
    @include('partials.article-styles')

    <!-- JavaScript -->
    <script>
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: 'Tanda dan Gejala Kanker Payudara',
                    text: 'Informasi penting tentang tanda dan gejala kanker payudara',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Link artikel telah disalin ke clipboard!');
                });
            }
        }
    </script>
@endsection
