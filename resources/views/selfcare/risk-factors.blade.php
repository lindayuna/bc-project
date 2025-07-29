{{-- filepath: d:\dev\breast-cancer-web\resources\views\selfcare\risk-factors.blade.php --}}
@extends('layouts.app')

@section('title', 'Faktor Risiko Kanker Payudara - BreastCare')

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
                    <span class="text-gray-700">Faktor Risiko</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Article -->
                <article class="lg:col-span-3">

                    @php
                        // Query data untuk Risk Factors
                        $riskFactors = \App\Models\Content::where('category', 'risk-factors')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp

                    <!-- Header Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Faktor Risiko Kanker Payudara</h1>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 border-l-4 border-purple-400 p-6 rounded-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-purple-400 text-2xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-purple-800">Kenali Faktor Risiko Anda</h3>
                                    <p class="mt-2 text-sm text-purple-700">
                                        Memahami faktor risiko dapat membantu Anda mengambil langkah pencegahan yang tepat.
                                        Sebagian faktor risiko dapat diubah, sebagian lainnya tidak dapat diubah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Risk Level Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- High Risk -->
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-red-800">Risiko Tinggi</h4>
                                    <p class="text-xs text-red-600">Faktor yang tidak dapat diubah</p>
                                </div>
                            </div>
                        </div>

                        <!-- Medium Risk -->
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-yellow-500 mr-3"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-yellow-800">Risiko Sedang</h4>
                                    <p class="text-xs text-yellow-600">Dapat dimodifikasi</p>
                                </div>
                            </div>
                        </div>

                        <!-- Low Risk -->
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <div>
                                    <h4 class="text-sm font-semibold text-green-800">Dapat Dicegah</h4>
                                    <p class="text-xs text-green-600">Dengan gaya hidup sehat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Content from Filament -->
                    @if ($riskFactors->count() > 0)
                        @foreach ($riskFactors as $content)
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
                                                <span class="flex items-center bg-purple-100 px-3 py-1 rounded-full">
                                                    <i class="fas fa-user mr-2"></i>
                                                    {{ $content->source }}
                                                </span>
                                            @endif
                                            <span class="flex items-center bg-pink-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-tag mr-2"></i>
                                                Faktor Risiko
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
                            <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-chart-line text-purple-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Konten Sedang Disiapkan</h3>
                            <p class="text-gray-500 mb-4">
                                Informasi tentang faktor risiko kanker payudara sedang disiapkan oleh tim medis kami.
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
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
                            'sadari',
                            'detection-benefits',
                            'guidelines',
                        ])
                            ->limit(6)
                            ->get();
                    @endphp

                    <!-- Risk Assessment -->
                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 border border-purple-200 rounded-lg p-6 mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-calculator text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-purple-800 mb-2">Kalkulator Risiko</h3>
                            <p class="text-sm text-purple-700 mb-4">
                                Hitung tingkat risiko kanker payudara Anda berdasarkan faktor-faktor yang ada
                            </p>
                            <a href="#"
                                class="inline-block bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-purple-700 transition-colors duration-200">
                                Mulai Tes Risiko
                            </a>
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
                                    Tanda dan gejala kanker payudara
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
                        class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg p-6 text-white text-center shadow-lg">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-3">Pencegahan</h3>
                        <p class="text-sm mb-4 opacity-90 leading-relaxed">
                            Kurangi risiko dengan gaya hidup sehat dan deteksi dini teratur
                        </p>
                        <a href="#"
                            class="inline-block bg-white text-purple-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-200 shadow">
                            Tips Pencegahan
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
                    title: 'Faktor Risiko Kanker Payudara',
                    text: 'Informasi penting tentang faktor risiko kanker payudara',
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
