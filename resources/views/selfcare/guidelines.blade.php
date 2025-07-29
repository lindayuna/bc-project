{{-- filepath: d:\dev\breast-cancer-web\resources\views\selfcare\guidelines.blade.php --}}
@extends('layouts.app')

@section('title', 'Panduan Pemeriksaan Kanker Payudara - BreastCare')

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
                    <span class="text-gray-700">Panduan</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Article -->
                <article class="lg:col-span-3">

                    @php
                        // Query data untuk Guidelines
                        $guidelines = \App\Models\Content::where('category', 'guidelines')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp

                    <!-- Header Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Panduan Pemeriksaan Kanker Payudara</h1>
                        <div
                            class="bg-gradient-to-r from-indigo-50 to-purple-50 border-l-4 border-indigo-400 p-6 rounded-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-book-open text-indigo-400 text-2xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-indigo-800">Panduan Lengkap Pemeriksaan</h3>
                                    <p class="mt-2 text-sm text-indigo-700">
                                        Ikuti panduan resmi dari organisasi kesehatan internasional untuk pemeriksaan dan
                                        deteksi dini kanker payudara yang efektif dan terstruktur.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Age-based Guidelines -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Panduan Berdasarkan Usia</h2>
                        <div class="space-y-6">
                            <!-- 20-39 years -->
                            <div class="bg-gradient-to-r from-green-50 to-teal-50 border border-green-200 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white font-bold text-sm">20-39</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-green-800 mb-2">Usia 20-39 Tahun</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <h4 class="font-medium text-green-700 mb-2">Yang Harus Dilakukan:</h4>
                                                <ul class="text-sm text-green-600 space-y-1">
                                                    <li>• SADARI setiap bulan</li>
                                                    <li>• Pemeriksaan klinis tahunan</li>
                                                    <li>• Konsultasi jika ada keluhan</li>
                                                    <li>• Edukasi kesehatan payudara</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-green-700 mb-2">Risiko:</h4>
                                                <p class="text-sm text-green-600">Rendah, namun tetap perlu waspada terhadap
                                                    perubahan pada payudara</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 40-49 years -->
                            <div
                                class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white font-bold text-sm">40-49</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-yellow-800 mb-2">Usia 40-49 Tahun</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <h4 class="font-medium text-yellow-700 mb-2">Yang Harus Dilakukan:</h4>
                                                <ul class="text-sm text-yellow-600 space-y-1">
                                                    <li>• SADARI setiap bulan</li>
                                                    <li>• Mammografi setiap 1-2 tahun</li>
                                                    <li>• Pemeriksaan klinis 6 bulan</li>
                                                    <li>• USG jika diperlukan</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-yellow-700 mb-2">Risiko:</h4>
                                                <p class="text-sm text-yellow-600">Mulai meningkat, penting untuk screening
                                                    rutin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 50+ years -->
                            <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-lg p-6">
                                <div class="flex items-start">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white font-bold text-sm">50+</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-red-800 mb-2">Usia 50+ Tahun</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <h4 class="font-medium text-red-700 mb-2">Yang Harus Dilakukan:</h4>
                                                <ul class="text-sm text-red-600 space-y-1">
                                                    <li>• SADARI setiap bulan</li>
                                                    <li>• Mammografi setiap tahun</li>
                                                    <li>• Pemeriksaan klinis 6 bulan</li>
                                                    <li>• Screening komprehensif</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-red-700 mb-2">Risiko:</h4>
                                                <p class="text-sm text-red-600">Tertinggi, screening rutin sangat penting
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Screening Methods -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Metode Pemeriksaan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- SADARI -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-hands text-white"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">SADARI</h3>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">Pemeriksaan payudara sendiri yang dapat dilakukan di
                                    rumah</p>
                                <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                    <li>• Mudah dilakukan</li>
                                    <li>• Tanpa biaya</li>
                                    <li>• Dapat dilakukan kapan saja</li>
                                    <li>• Meningkatkan kesadaran diri</li>
                                </ul>
                                <a href="{{ route('selfcare.sadari') }}"
                                    class="text-green-600 text-sm font-medium hover:text-green-700">
                                    Pelajari cara SADARI →
                                </a>
                            </div>

                            <!-- Clinical Examination -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-stethoscope text-white"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">Pemeriksaan Klinis</h3>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">Pemeriksaan oleh tenaga medis terlatih</p>
                                <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                    <li>• Lebih akurat</li>
                                    <li>• Dapat mendeteksi kelainan kecil</li>
                                    <li>• Konsultasi langsung</li>
                                    <li>• Rujukan jika diperlukan</li>
                                </ul>
                                <a href="#" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                                    Cari fasilitas kesehatan →
                                </a>
                            </div>

                            <!-- Mammography -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-x-ray text-white"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">Mammografi</h3>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">Pemeriksaan rontgen khusus untuk payudara</p>
                                <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                    <li>• Gold standard screening</li>
                                    <li>• Dapat mendeteksi tumor kecil</li>
                                    <li>• Akurasi tinggi</li>
                                    <li>• Direkomendasikan untuk 40+ tahun</li>
                                </ul>
                                <a href="#" class="text-purple-600 text-sm font-medium hover:text-purple-700">
                                    Info persiapan mammografi →
                                </a>
                            </div>

                            <!-- Ultrasound -->
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-wave-square text-white"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">USG Payudara</h3>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">Pemeriksaan menggunakan gelombang suara</p>
                                <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                    <li>• Tidak menggunakan radiasi</li>
                                    <li>• Baik untuk payudara padat</li>
                                    <li>• Dapat membedakan kista dan tumor</li>
                                    <li>• Aman untuk wanita muda</li>
                                </ul>
                                <a href="#" class="text-teal-600 text-sm font-medium hover:text-teal-700">
                                    Kapan perlu USG payudara →
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Content from Filament -->
                    @if ($guidelines->count() > 0)
                        @foreach ($guidelines as $content)
                            <section class="mb-12">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-6">{{ $content->title }}</h2>

                                <!-- Featured Image -->
                                @if ($content->image)
                                    <figure class="mb-8">
                                        <div class="bg-white rounded-lg p-4 text-center shadow-sm border">
                                            <img src="{{ asset('storage/' . $content->image) }}"
                                                alt="{{ $content->title }}"
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
                                                <span class="flex items-center bg-indigo-100 px-3 py-1 rounded-full">
                                                    <i class="fas fa-user mr-2"></i>
                                                    {{ $content->source }}
                                                </span>
                                            @endif
                                            <span class="flex items-center bg-purple-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-tag mr-2"></i>
                                                Panduan
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
                            <div
                                class="w-24 h-24 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-book-open text-indigo-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Konten Sedang Disiapkan</h3>
                            <p class="text-gray-500 mb-4">
                                Panduan pemeriksaan kanker payudara sedang disiapkan oleh tim medis kami.
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
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
                            'detection-benefits',
                        ])
                            ->limit(6)
                            ->get();
                    @endphp

                    <!-- Quick Guide -->
                    <div
                        class="bg-gradient-to-br from-indigo-100 to-purple-100 border border-indigo-200 rounded-lg p-6 mb-6">
                        <div class="text-center">
                            <div
                                class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-clipboard-list text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-indigo-800 mb-2">Panduan Cepat</h3>
                            <p class="text-sm text-indigo-700 mb-4">
                                Download panduan singkat untuk pemeriksaan mandiri
                            </p>
                            <a href="#"
                                class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors duration-200">
                                Download PDF
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
                                <a href="{{ route('selfcare.breast-cancer-info') }}"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Apa itu kanker payudara?
                                </a>
                                <a href="{{ route('selfcare.signs-symptoms') }}"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Tanda dan gejala kanker payudara
                                </a>
                                <a href="{{ route('selfcare.sadari') }}"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Cara melakukan SADARI
                                </a>
                            @endforelse
                        </nav>
                    </div>

                    <!-- Call to Action -->
                    <div
                        class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg p-6 text-white text-center shadow-lg">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-check text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-3">Jadwal Pemeriksaan</h3>
                        <p class="text-sm mb-4 opacity-90 leading-relaxed">
                            Atur jadwal pemeriksaan rutin sesuai usia dan faktor risiko Anda
                        </p>
                        <a href="#"
                            class="inline-block bg-white text-indigo-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-200 shadow">
                            Buat Jadwal
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
                    title: 'Panduan Pemeriksaan Kanker Payudara',
                    text: 'Panduan lengkap pemeriksaan dan deteksi dini kanker payudara',
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
