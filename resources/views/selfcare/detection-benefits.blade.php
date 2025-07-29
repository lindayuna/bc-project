{{-- filepath: d:\dev\breast-cancer-web\resources\views\selfcare\detection-benefits.blade.php --}}
@extends('layouts.app')

@section('title', 'Manfaat Deteksi Dini Kanker Payudara - BreastCare')

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
                    <span class="text-gray-700">Manfaat Deteksi Dini</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Article -->
                <article class="lg:col-span-3">

                    @php
                        // Query data untuk Detection Benefits
                        $detectionBenefits = \App\Models\Content::where('category', 'detection-benefits')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp

                    <!-- Header Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Manfaat Deteksi Dini Kanker Payudara</h1>
                        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 border-l-4 border-cyan-400 p-6 rounded-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-heart text-cyan-400 text-2xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-cyan-800">Deteksi Dini Menyelamatkan Hidup</h3>
                                    <p class="mt-2 text-sm text-cyan-700">
                                        Deteksi dini kanker payudara dapat meningkatkan tingkat kesembuhan hingga 95% dan
                                        memberikan pilihan pengobatan yang lebih banyak dengan efek samping yang minimal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Content from Filament -->
                    @if ($detectionBenefits->count() > 0)
                        @foreach ($detectionBenefits as $content)
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
                                                <span class="flex items-center bg-cyan-100 px-3 py-1 rounded-full">
                                                    <i class="fas fa-user mr-2"></i>
                                                    {{ $content->source }}
                                                </span>
                                            @endif
                                            <span class="flex items-center bg-blue-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-tag mr-2"></i>
                                                Manfaat Deteksi
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
                            <div class="w-24 h-24 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-chart-bar text-cyan-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Konten Sedang Disiapkan</h3>
                            <p class="text-gray-500 mb-4">
                                Informasi tentang manfaat deteksi dini sedang disiapkan oleh tim medis kami.
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 transition-colors duration-200">
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
                            'signs-symptoms',
                            'risk-factors',
                            'sadari',
                            'guidelines',
                        ])
                            ->limit(6)
                            ->get();
                    @endphp

                    <!-- Call to Action -->
                    <div
                        class="bg-gradient-to-br from-cyan-500 to-blue-600 rounded-lg p-6 mb-6 text-white text-center shadow-lg">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heartbeat text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-3">Mulai Deteksi</h3>
                        <p class="text-sm mb-4 opacity-90 leading-relaxed">
                            Lakukan Pemeriksaan Rutin Satu Bulan Sekali
                        </p>
                        <a href="{{ route('prediction.form') }}"
                            class="inline-block bg-white text-cyan-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-200 shadow">
                            Mulai Sekarang
                        </a>
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
                                    Cara melakukan SADARI
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Tanda dan gejala kanker payudara
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Panduan pemeriksaan
                                </a>
                            @endforelse
                        </nav>
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
                    title: 'Manfaat Deteksi Dini Kanker Payudara',
                    text: 'Pahami pentingnya deteksi dini untuk kesembuhan kanker payudara',
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
