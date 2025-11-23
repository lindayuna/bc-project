@extends('layouts.app')

@section('title', 'Beranda - Prediksi Kanker Payudara')

@section('content')
    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-screen bg-gradient-to-br from-pink-50 via-white to-pink-50/30 overflow-hidden">
        <!-- Soft Background Elements -->
        <div class="absolute inset-0">
            <div
                class="absolute top-10 sm:top-16 md:top-20 right-10 sm:right-16 md:right-20 w-20 sm:w-32 md:w-40 h-20 sm:h-32 md:h-40 bg-gradient-to-br from-pink-200/20 to-pink-300/20 rounded-full animate-blob">
            </div>
            <div
                class="absolute bottom-20 sm:bottom-28 md:bottom-32 left-10 sm:left-16 md:left-20 w-16 sm:w-24 md:w-32 h-16 sm:h-24 md:h-32 bg-gradient-to-br from-pink-100/30 to-pink-200/30 rounded-full animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/4 sm:left-1/3 w-12 sm:w-20 md:w-24 h-12 sm:h-20 md:h-24 bg-gradient-to-br from-pink-150/15 to-pink-200/15 rounded-full animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="relative container mx-auto px-2 sm:px-4 lg:px-6 pt-20 sm:pt-24 md:pt-28 pb-12 sm:pb-16 md:pb-20">
            <div class="flex flex-wrap items-center min-h-[70vh] sm:min-h-[75vh] md:min-h-[80vh]">
                
                <!-- Left Content -->
                <div class="w-full lg:w-1/2 mb-12 sm:mb-14 md:mb-16 lg:mb-0">
                    <div class="max-w-full lg:max-w-2xl">
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center px-3 sm:px-4 py-2 bg-white/90 backdrop-blur-sm rounded-full shadow-sm mb-6 sm:mb-8 border border-pink-100">
                            <div class="w-2 h-2 bg-pink-400 rounded-full mr-2 sm:mr-3 animate-pulse"></div>
                            <span class="text-xs sm:text-sm font-medium text-gray-600">Skrining Kanker Payudara Berbasis
                                AI</span>
                        </div>

                        <!-- Main Heading -->
                        <h1
                            class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-800 leading-tight mb-4 sm:mb-6">
                            <span
                                class="bg-gradient-to-r from-pink-500 via-pink-600 to-pink-700 bg-clip-text text-transparent">
                                Skrining Kanker Payudara Berbasis AI:
                            </span>
                            <br>

                        </h1>
                        <h3
                            class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-800 leading-tight mb-4 sm:mb-6">
                            <span class="text-gray-700">Solusi Cerdas, Aksi Cepat</span>
                        </h3>

                        <!-- Subtitle -->
                        <p
                            class="text-base sm:text-lg md:text-xl lg:text-xl text-gray-600 font-light mb-6 sm:mb-8 leading-relaxed">
                            "Skrining kanker payudara dengan dukungan teknologi AI berbasis algoritma Naive Bayes merupakan
                            solusi cerdas untuk mengenali risiko sejak awal secara cepat dan efisien, guna meningkatkan
                            kesadaran dan peluang penanganan lebih dini."
                        </p>

                        <!-- Description -->
                        <p class="text-sm sm:text-base md:text-md text-gray-500 mb-8 sm:mb-10 leading-relaxed">
                            Deteksi dini dilakukan dalam upaya untuk meningkatkan kesadaran masyarakat dalam kegiatan
                            preventif SADARI setiap bulan.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mb-6 sm:mb-8">
                            <a href="{{ route('prediction.form') }}"
                                class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-sm sm:text-base rounded-xl sm:rounded-2xl shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                <i class="fas fa-heartbeat mr-2 sm:mr-3 text-base sm:text-lg"></i>
                                <span class="hidden sm:inline">Mulai Deteksi Dini Sekarang</span>
                                <span class="sm:hidden">Mulai Deteksi</span>
                                <i
                                    class="fas fa-arrow-right ml-2 sm:ml-3 group-hover:translate-x-1 transition-transform"></i>
                            </a>

                            <a href="#mengapa-deteksi-dini"
                                class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-white/90 backdrop-blur-md text-pink-600 font-semibold text-sm sm:text-base rounded-xl sm:rounded-2xl shadow-sm hover:shadow-md border border-pink-200 transition-all duration-300">
                                <i class="fas fa-info-circle mr-2 sm:mr-3"></i>
                                <span class="hidden sm:inline">Mengapa Deteksi Dini?</span>
                                <span class="sm:hidden">Info</span>
                            </a>
                        </div>

                        <!-- Urgency Message -->
                        <div
                            class="bg-gradient-to-r from-pink-50 to-pink-100/50 border border-pink-200/50 rounded-xl sm:rounded-2xl p-4 sm:p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-6 sm:w-8 h-6 sm:h-8 bg-pink-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-clock text-white text-xs sm:text-sm"></i>
                                    </div>
                                </div>
                                <div class="ml-3 sm:ml-4">
                                    <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Waktu Sangat
                                        Penting dalam Deteksi Kanker</h4>
                                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">
                                        Pemeriksaan payudara sendiri (SADARI) sebaiknya dilakukan setiap bulan, idealnya
                                        pada hari ke-7 hingga ke-10 setelah hari pertama menstruasi, saat kondisi payudara
                                        dalam keadaan paling rileks dan tidak nyeri.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Hero Visual -->
                <div class="w-full lg:w-1/2">
                    <div class="relative max-w-md lg:max-w-lg xl:max-w-xl mx-auto lg:mx-0 lg:ml-auto">
                        <!-- Main Card -->
                        <div
                            class="relative z-10 bg-white/95 backdrop-blur-xl rounded-2xl sm:rounded-3xl shadow-lg p-6 sm:p-8 border border-pink-100">
                            <!-- Logo/Icon -->
                            <div class="text-center mb-4 sm:mb-6">
                                <div
                                    class="inline-flex items-center justify-center w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 bg-transparent rounded-2xl sm:rounded-3xl mb-3 sm:mb-4">
                                    <img src="img/logo.png" alt="Deteksi Kanker Payudara"
                                        class="w-full h-full object-contain" />
                                </div>
                                <h3 class="text-base sm:text-lg md:text-xl font-semibold text-gray-700">Skrining Kesehatan
                                    Cepat</h3>
                                <p class="text-sm sm:text-base text-gray-500">Hanya 3 Langkah Mudah</p>
                            </div>

                            <!-- Progress Steps -->
                            <div class="space-y-3 sm:space-y-4">
                                <div
                                    class="flex items-center p-2 sm:p-3 bg-pink-50/80 rounded-lg sm:rounded-xl border border-pink-100/50">
                                    <div
                                        class="w-6 sm:w-8 h-6 sm:h-8 bg-pink-400 rounded-full flex items-center justify-center mr-2 sm:mr-3">
                                        <span class="text-white text-xs sm:text-sm font-bold">1</span>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-pink-700">Lakukan SADARI</span>
                                </div>
                                <div
                                    class="flex items-center p-2 sm:p-3 bg-pink-50/60 rounded-lg sm:rounded-xl border border-pink-100/50">
                                    <div
                                        class="w-6 sm:w-8 h-6 sm:h-8 bg-pink-500 rounded-full flex items-center justify-center mr-2 sm:mr-3">
                                        <span class="text-white text-xs sm:text-sm font-bold">2</span>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-pink-700">Analisis dengan dukungan
                                        teknologi AI berbasis algoritma Naive-Bayes</span>
                                </div>
                                <div
                                    class="flex items-center p-2 sm:p-3 bg-pink-50/40 rounded-lg sm:rounded-xl border border-pink-100/50">
                                    <div
                                        class="w-6 sm:w-8 h-6 sm:h-8 bg-pink-600 rounded-full flex items-center justify-center mr-2 sm:mr-3">
                                        <span class="text-white text-xs sm:text-sm font-bold">3</span>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-pink-700">Dapatkan Laporan
                                        Kesehatan</span>
                                </div>
                            </div>

                            <!-- CTA in Card -->
                            <div class="mt-4 sm:mt-6 text-center">
                                <a href="{{ route('prediction.form') }}"
                                    class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-sm sm:text-base rounded-lg sm:rounded-xl hover:shadow-md transition-all duration-300">
                                    <i class="fas fa-heartbeat mr-2 sm:mr-3 text-base sm:text-lg"></i>
                                    Mulai Sekarang
                                </a>
                            </div>
                        </div>

                        <!-- Soft Floating Elements -->
                        <div
                            class="absolute -top-2 sm:-top-4 -right-2 sm:-right-4 w-12 sm:w-16 md:w-20 h-12 sm:h-16 md:h-20 bg-gradient-to-br from-pink-300/30 to-pink-400/30 rounded-xl sm:rounded-2xl animate-float">
                        </div>
                        <div
                            class="absolute -bottom-3 sm:-bottom-6 -left-3 sm:-left-6 w-10 sm:w-12 md:w-16 h-10 sm:h-12 md:h-16 bg-gradient-to-br from-pink-200/30 to-pink-300/30 rounded-xl sm:rounded-2xl animate-float animation-delay-2000">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Why Early Detection Section -->
    <section id="mengapa-deteksi-dini" class="py-12 sm:py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-14 md:mb-16">
                <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-pink-50 rounded-full mb-4 sm:mb-6">
                    <span class="text-xs sm:text-sm font-medium text-pink-600">Fakta Penting</span>
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-700 mb-4 sm:mb-6">
                    Mengapa <span class="bg-gradient-to-r from-pink-500 to-pink-600 bg-clip-text text-transparent">Deteksi
                        Dini</span> Sangat Penting
                </h2>
                <p
                    class="text-base sm:text-lg md:text-xl text-gray-600 max-w-full sm:max-w-2xl md:max-w-3xl mx-auto leading-relaxed px-4 sm:px-0">
                    Memahami pentingnya deteksi dini bisa menjadi perbedaan antara hidup dan mati. Inilah mengapa bertindak
                    sekarang sangat penting.
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12 sm:mb-14 md:mb-16">
                <!-- Benefit 1 -->
                <div
                    class="text-center p-6 sm:p-8 bg-gradient-to-br from-pink-50/80 to-pink-100/50 rounded-2xl sm:rounded-3xl border border-pink-100/50">
                    <div
                        class="bg-gradient-to-br from-pink-400 to-pink-600 w-12 sm:w-14 md:w-16 h-12 sm:h-14 md:h-16 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-heart text-lg sm:text-xl md:text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-pink-600 mb-2">99%</h3>
                    <h4 class="text-lg sm:text-xl font-bold text-gray-700 mb-3 sm:mb-4">Tingkat Kelangsungan Hidup</h4>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Ketika kanker payudara terdeteksi pada stadium 1, tingkat kelangsungan hidup 5 tahun hampir 99%.
                        Deteksi dini menyelamatkan nyawa.
                    </p>
                </div>

                <!-- Benefit 2 -->
                <div
                    class="text-center p-6 sm:p-8 bg-gradient-to-br from-pink-50/60 to-pink-100/40 rounded-2xl sm:rounded-3xl border border-pink-100/50">
                    <div
                        class="bg-gradient-to-br from-pink-500 to-pink-700 w-12 sm:w-14 md:w-16 h-12 sm:h-14 md:h-16 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-shield-alt text-lg sm:text-xl md:text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-pink-600 mb-2">75%</h3>
                    <h4 class="text-lg sm:text-xl font-bold text-gray-700 mb-3 sm:mb-4">Pengobatan Lebih Ringan</h4>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Kanker stadium awal sering memerlukan pengobatan 75% lebih ringan, menjaga kualitas hidup Anda.
                    </p>
                </div>

                <!-- Benefit 3 -->
                <div
                    class="text-center p-6 sm:p-8 bg-gradient-to-br from-pink-50/40 to-pink-100/30 rounded-2xl sm:rounded-3xl border border-pink-100/50 md:col-span-2 lg:col-span-1">
                    <div
                        class="bg-gradient-to-br from-pink-600 to-pink-800 w-12 sm:w-14 md:w-16 h-12 sm:h-14 md:h-16 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-clock text-lg sm:text-xl md:text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-pink-600 mb-2">1 dari 8</h3>
                    <h4 class="text-lg sm:text-xl font-bold text-gray-700 mb-3 sm:mb-4">Wanita Berisiko</h4>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        1 dari 8 wanita akan mengembangkan kanker payudara sepanjang hidup mereka. Skrining rutin adalah
                        pertahanan terbaik Anda.
                    </p>
                </div>
            </div>

            <!-- Urgent CTA -->
            <div
                class="text-center bg-gradient-to-r from-pink-50 to-pink-100/50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-pink-200/30">
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-700 mb-3 sm:mb-4">Hope in Every Fight —
                    Ambil
                    Tindakan Sekarang</h3>
                <p
                    class="text-sm sm:text-base md:text-lg text-gray-600 mb-6 sm:mb-8 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                    "Skrining kanker payudara dengan dukungan teknologi AI berbasis algoritma Naive Bayes merupakan solusi
                    cerdas untuk mengenali risiko sejak awal secara cepat dan efisien, guna meningkatkan kesadaran dan
                    peluang penanganan lebih dini."
                </p>
                <a href="{{ route('prediction.form') }}"
                    class="inline-flex items-center px-6 sm:px-8 md:px-10 py-3 sm:py-4 md:py-5 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-bold text-sm sm:text-base md:text-lg rounded-xl sm:rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-heartbeat mr-2 sm:mr-3 text-base sm:text-lg md:text-xl"></i>
                    <span class="hidden sm:inline">Mulai Skrining Deteksi Dini</span>
                    <span class="sm:hidden">Mulai Skrining</span>
                    <i class="fas fa-arrow-right ml-2 sm:ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Health News Section -->
    <section id="berita-kesehatan-terkini" class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-pink-50/30 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-pink-50 rounded-full mb-4 sm:mb-6">
                    <i class="fas fa-newspaper mr-2 text-pink-600"></i>
                    <span class="text-xs sm:text-sm font-medium text-pink-600">Berita Terkini</span>
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-700 mb-3 sm:mb-4">
                    Berita <span
                        class="bg-gradient-to-r from-pink-500 to-pink-600 bg-clip-text text-transparent">Kesehatan</span>
                    Terkini
                </h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                    Jelajahi berita terkini seputar kesehatan payudara, mulai dari edukasi, kampanye kesadaran, hingga
                    kebijakan terbaru yang penting untuk Anda ketahui.
                </p>
            </div>

            @php
                // Query untuk mengambil berita dari database (maksimal 8)
                $newsContents = \App\Models\Content::where('category', 'news')
                    ->orderBy('created_at', 'desc')
                    ->take(8)
                    ->get();
            @endphp

            @if ($newsContents->count() > 0)
                <!-- News Layout -->
                <div class="max-w-7xl mx-auto">
                    @if ($newsContents->count() >= 4)
                        <!-- Main Layout: Featured + Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 mb-8 sm:mb-10">
                            <!-- Featured Article (Left) -->
                            <div class="lg:col-span-2">
                                @php $featuredNews = $newsContents->first(); @endphp
                                <a href="">
                                    <article
                                        class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-pink-100 h-110">
                                        <div class="relative overflow-hidden">
                                            @if ($featuredNews->image)
                                                <img src="{{ asset('storage/' . $featuredNews->image) }}"
                                                    alt="{{ $featuredNews->title }}"
                                                    class="w-full h-100 sm:h-80 md:h-96 object-cover group-hover:scale-105 transition-transform duration-500" />
                                            @else
                                                <div
                                                    class="w-full h-64 sm:h-80 md:h-96 bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-6xl text-pink-400"></i>
                                                </div>
                                            @endif

                                            <!-- Gradient Overlay -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-80">
                                            </div>

                                            <!-- Category Badge -->
                                            <div class="absolute top-4 left-4">
                                                <span
                                                    class="bg-pink-500 text-white text-xs sm:text-sm font-semibold px-3 py-2 rounded-full shadow-lg">
                                                    <i class="fas fa-star mr-1"></i>
                                                    Berita Utama
                                                </span>
                                            </div>

                                            <!-- Content Overlay -->
                                            <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                                                <h3
                                                    class="text-xl sm:text-xl md:text-xl font-bold text-white mb-3 leading-tight">
                                                    {{ Str::limit($featuredNews->title, 100) }}
                                                </h3>
                                                <p class="text-white/90 text-sm sm:text-base mb-4 line-clamp-2">
                                                    {{ Str::limit(strip_tags($featuredNews->body), 150) }}
                                                </p>
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center text-white/80 text-sm">
                                                        <i class="fas fa-calendar mr-2"></i>
                                                        <time>{{ $featuredNews->created_at->format('d M Y') }}</time>
                                                        <span class="mx-3">•</span>
                                                        <i class="fas fa-clock mr-1"></i>
                                                        {{ ceil(str_word_count(strip_tags($featuredNews->body)) / 200) }}
                                                        min
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </a>
                            </div>

                            <!-- Side Articles (Right) -->
                            <div class="lg:col-span-1">
                                <div class="space-y-4 sm:space-y-6">
                                    @foreach ($newsContents->skip(1)->take(3) as $sideNews)
                                        <article
                                            class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group border border-pink-100">
                                            <a href="{{ route('news.show', $sideNews->slug) }}" class="block">
                                                <div class="side-article-card">
                                                    <!-- Side Image Container - FULL COVER FIXED -->
                                                    <div class="side-article-image-wrapper">
                                                        <div class="side-article-container">
                                                            @if ($sideNews->image)
                                                                zc
                                                                <img src="{{ asset('storage/' . $sideNews->image) }}"
                                                                    alt="{{ $sideNews->title }}"
                                                                    class="side-article-image" />
                                                            @else
                                                                <div class="side-article-fallback">
                                                                    <i class="fas fa-newspaper text-lg text-white/80"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- Side Content -->
                                                    <div class="side-article-content-wrapper">
                                                        <div>
                                                            <span
                                                                class="bg-pink-100 text-pink-700 text-xs font-medium px-2 py-1 rounded-full mb-2 inline-block">
                                                                @if ($sideNews->created_at->diffInDays() < 7)
                                                                    Baru
                                                                @else
                                                                    Berita
                                                                @endif
                                                            </span>
                                                            <h4
                                                                class="font-bold text-gray-800 text-sm leading-tight line-clamp-2 group-hover:text-pink-600 transition-colors">
                                                                {{ Str::limit($sideNews->title, 75) }}
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="flex items-center justify-between text-xs text-gray-500 mt-auto">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-calendar mr-1"></i>
                                                                <time>{{ $sideNews->created_at->format('d M Y') }}</time>
                                                            </div>
                                                            <span
                                                                class="text-pink-600 hover:text-pink-700 font-medium group-hover:underline">
                                                                Baca →
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Additional News Grid (if more than 4 articles) -->
                        @if ($newsContents->count() > 4)
                            <div class="border-t border-gray-200 pt-8 sm:pt-10">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-6 flex items-center">
                                    <i class="fas fa-newspaper mr-3 text-pink-600"></i>
                                    Berita Lainnya
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                                    @foreach ($newsContents->skip(4)->take(4) as $additionalNews)
                                        <article
                                            class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group border border-pink-100">
                                            <div class="relative overflow-hidden">
                                                @if ($additionalNews->image)
                                                    <img src="{{ asset('storage/' . $additionalNews->image) }}"
                                                        alt="{{ $additionalNews->title }}"
                                                        class="w-full h-32 sm:h-40 object-cover group-hover:scale-105 transition-transform duration-300" />
                                                @else
                                                    <div
                                                        class="w-full h-32 sm:h-40 bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                                                        <i class="fas fa-newspaper text-2xl text-pink-400"></i>
                                                    </div>
                                                @endif

                                                <div class="absolute top-2 right-2">
                                                    <span
                                                        class="bg-white/90 text-pink-600 text-xs font-medium px-2 py-1 rounded-full">
                                                        Baru
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="p-3 sm:p-4">
                                                <h4
                                                    class="font-bold text-gray-800 text-sm sm:text-base leading-tight mb-2 line-clamp-2">
                                                    {{ Str::limit($additionalNews->title, 70) }}
                                                </h4>
                                                <p class="text-gray-600 text-xs sm:text-sm mb-3 line-clamp-2">
                                                    {{ Str::limit(strip_tags($additionalNews->body), 100) }}
                                                </p>
                                                <div class="flex items-center justify-between text-xs text-gray-500">
                                                    <time>{{ $additionalNews->created_at->format('d M Y') }}</time>
                                                    <a href="#"
                                                        class="text-pink-600 hover:text-pink-700 font-medium">
                                                        Baca →</a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <!-- Simple Grid for less than 4 articles -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                            @foreach ($newsContents as $news)
                                <article
                                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-pink-100">
                                    <div class="relative overflow-hidden">
                                        @if ($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                                class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-300" />
                                        @else
                                            <div
                                                class="w-full h-48 sm:h-56 bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                                                <i class="fas fa-newspaper text-3xl text-pink-400"></i>
                                            </div>
                                        @endif

                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="bg-pink-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                                Berita
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-4 sm:p-6">
                                        <h3 class="font-bold text-gray-800 text-lg sm:text-xl mb-3 line-clamp-2">
                                            {{ Str::limit($news->title, 80) }}
                                        </h3>
                                        <p class="text-gray-600 text-sm sm:text-base mb-4 line-clamp-3">
                                            {{ Str::limit(strip_tags($news->body), 120) }}
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <time
                                                class="text-xs text-gray-500">{{ $news->created_at->format('d M Y') }}</time>
                                            <a href="#"
                                                class="text-pink-600 hover:text-pink-700 font-medium text-sm">
                                                Baca Selengkapnya →
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    <!-- View All News Button -->
                    <div class="text-center mt-10 sm:mt-12">
                        <a href="{{ route('news.index') }}"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-base rounded-xl shadow-lg hover:shadow-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-newspaper mr-3"></i>
                            <span class="hidden sm:inline">Lihat Semua Berita Kesehatan</span>
                            <span class="sm:hidden">Semua Berita</span>
                            <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            @else
                <!-- Fallback jika tidak ada berita -->
                <div class="text-center py-16">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-pink-100 to-pink-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-newspaper text-pink-400 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Berita Sedang Disiapkan</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Berita kesehatan terbaru sedang disiapkan oleh tim redaksi kami. Silakan kembali lagi nanti.
                    </p>
                    <a href="{{ route('welcome') }}"
                        class="inline-flex items-center px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section id="acara-mendatang" class="py-12 sm:py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-blue-50 rounded-full mb-4 sm:mb-6">
                    <i class="fas fa-calendar-alt mr-2 text-pink-500"></i>
                    <span class="text-xs sm:text-sm font-medium text-pink-500">Acara Mendatang</span>
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-700 mb-3 sm:mb-4">
                    Agenda Kesehatan
                    Terkini
                </h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                    Mari Bergabung dalam Agenda Kesehatan untuk Meningkatkan Kesadaran dan Deteksi Dini Kanker Payudara
                </p>
            </div>

            @php
                // Query untuk mengambil events dari database (maksimal 6)
                $eventsContents = \App\Models\Content::where('category', 'events')
                    ->where('status', 'published')
                    ->orderBy('created_at', 'desc')
                    ->take(6)
                    ->get();
            @endphp

            @if ($eventsContents->count() > 0)
                <!-- Events Layout -->
                <div class="max-w-7xl mx-auto">
                    @if ($eventsContents->count() >= 3)
                        <!-- Main Layout: Featured + Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 mb-8 sm:mb-10">
                            <!-- Featured Event (Left) -->
                            <div class="lg:col-span-1">
                                @php $featuredEvent = $eventsContents->first(); @endphp
                                <a href="{{ route('events.show', $featuredEvent->slug) }}">
                                    <article
                                        class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-blue-100 h-full">
                                        <div class="relative overflow-hidden">
                                            @if ($featuredEvent->image)
                                                <img src="{{ asset('storage/' . $featuredEvent->image) }}"
                                                    alt="{{ $featuredEvent->title }}"
                                                    class="w-full h-60 sm:h-72 md:h-80 object-cover group-hover:scale-105 transition-transform duration-500" />
                                            @else
                                                <div
                                                    class="w-full h-60 sm:h-72 md:h-80 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                    <i class="fas fa-calendar-alt text-5xl text-blue-400"></i>
                                                </div>
                                            @endif

                                            <!-- Gradient Overlay -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-80">
                                            </div>

                                            <!-- Category Badge -->
                                            <div class="absolute top-4 left-4">
                                                <span
                                                    class="bg-blue-500 text-white text-xs sm:text-sm font-semibold px-3 py-2 rounded-full shadow-lg">
                                                    <i class="fas fa-star mr-1"></i>
                                                    Event Utama
                                                </span>
                                            </div>

                                            <!-- Date Badge -->
                                            <div
                                                class="absolute top-4 right-4 bg-white/90 rounded-lg p-2 text-center shadow-lg">
                                                <div class="text-lg font-bold text-pink-500">
                                                    {{ $featuredEvent->created_at->format('d') }}</div>
                                                <div class="text-xs font-medium text-gray-500">
                                                    {{ $featuredEvent->created_at->format('M') }}</div>
                                            </div>

                                            <!-- Content Overlay -->
                                            <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                                                <h3
                                                    class="text-xl sm:text-2xl md:text-2xl font-bold text-white mb-3 leading-tight">
                                                    {{ Str::limit($featuredEvent->title, 80) }}
                                                </h3>
                                                <p class="text-white/90 text-sm sm:text-base mb-4 line-clamp-2">
                                                    {{ Str::limit(strip_tags($featuredEvent->body), 120) }}
                                                </p>
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center text-white/80 text-sm">
                                                        <i class="fas fa-calendar mr-2"></i>
                                                        <time>{{ $featuredEvent->created_at->format('d M Y') }}</time>
                                                        <span class="mx-3">•</span>
                                                        <i class="fas fa-clock mr-1"></i>
                                                        {{ ceil(str_word_count(strip_tags($featuredEvent->body)) / 200) }}
                                                        min
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </a>
                            </div>

                            <!-- Side Events (Right) -->
                            <div class="lg:col-span-1">
                                <div class="space-y-4 sm:space-y-6">
                                    @foreach ($eventsContents->skip(1)->take(2) as $sideEvent)
                                        <article
                                            class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group border border-blue-100">
                                            <a href="{{ route('events.show', $sideEvent->slug) }}" class="block">
                                                <div class="flex h-32 sm:h-36">
                                                    <!-- Event Image -->
                                                    <div class="w-2/5 relative overflow-hidden">
                                                        @if ($sideEvent->image)
                                                            <img src="{{ asset('storage/' . $sideEvent->image) }}"
                                                                alt="{{ $sideEvent->title }}"
                                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                                        @else
                                                            <div
                                                                class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                                <i class="fas fa-calendar-alt text-xl text-blue-400"></i>
                                                            </div>
                                                        @endif

                                                        <!-- Date Badge -->
                                                        <div
                                                            class="absolute top-2 right-2 bg-white/90 rounded p-1 text-center shadow-sm">
                                                            <div class="text-sm font-bold text-pink-500">
                                                                {{ $sideEvent->created_at->format('d') }}</div>
                                                            <div class="text-xs font-medium text-gray-500">
                                                                {{ $sideEvent->created_at->format('M') }}</div>
                                                        </div>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="w-3/5 p-3 sm:p-4 flex flex-col justify-between">
                                                        <div>
                                                            <span
                                                                class="bg-blue-100 text-blue-700 text-xs font-medium px-2 py-1 rounded-full mb-2 inline-block">
                                                                @if ($sideEvent->created_at->diffInDays() < 7)
                                                                    Segera
                                                                @else
                                                                    Event
                                                                @endif
                                                            </span>
                                                            <h4
                                                                class="font-bold text-gray-800 text-sm leading-tight line-clamp-2 group-hover:text-pink-500 transition-colors">
                                                                {{ Str::limit($sideEvent->title, 60) }}
                                                            </h4>
                                                        </div>
                                                        <div
                                                            class="flex items-center justify-between text-xs text-gray-500 mt-auto">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-calendar mr-1"></i>
                                                                <time>{{ $sideEvent->created_at->format('d M Y') }}</time>
                                                            </div>
                                                            <span
                                                                class="text-pink-500 hover:text-blue-700 font-medium group-hover:underline">
                                                                Detail →
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Additional Events Grid (if more than 3 events) -->
                        @if ($eventsContents->count() > 3)
                            <div class="border-t border-gray-200 pt-8 sm:pt-10">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-6 flex items-center">
                                    <i class="fas fa-calendar-alt mr-3 text-pink-500"></i>
                                    Acara Lainnya
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    @foreach ($eventsContents->skip(3)->take(3) as $additionalEvent)
                                        <article
                                            class="bg-white rounded-lg sm:rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group border border-blue-100">
                                            <a href="{{ route('events.show', $additionalEvent->slug) }}" class="block">
                                                <div class="relative overflow-hidden">
                                                    @if ($additionalEvent->image)
                                                        <img src="{{ asset('storage/' . $additionalEvent->image) }}"
                                                            alt="{{ $additionalEvent->title }}"
                                                            class="w-full h-32 sm:h-40 object-cover group-hover:scale-105 transition-transform duration-300" />
                                                    @else
                                                        <div
                                                            class="w-full h-32 sm:h-40 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                            <i class="fas fa-calendar-alt text-2xl text-blue-400"></i>
                                                        </div>
                                                    @endif

                                                    <div class="absolute top-2 left-2">
                                                        <span
                                                            class="bg-blue-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                                            Event
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="absolute top-2 right-2 bg-white/90 rounded p-1 text-center shadow-sm">
                                                        <div class="text-sm font-bold text-pink-500">
                                                            {{ $additionalEvent->created_at->format('d') }}</div>
                                                        <div class="text-xs font-medium text-gray-500">
                                                            {{ $additionalEvent->created_at->format('M') }}</div>
                                                    </div>
                                                </div>
                                                <div class="p-3 sm:p-4">
                                                    <h4
                                                        class="font-bold text-gray-800 text-sm sm:text-base leading-tight mb-2 line-clamp-2">
                                                        {{ Str::limit($additionalEvent->title, 60) }}
                                                    </h4>
                                                    <p class="text-gray-600 text-xs sm:text-sm mb-3 line-clamp-2">
                                                        {{ Str::limit(strip_tags($additionalEvent->body), 80) }}
                                                    </p>
                                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                                        <time>{{ $additionalEvent->created_at->format('d M Y') }}</time>
                                                        <span class="text-pink-500 hover:text-blue-700 font-medium">
                                                            Detail →
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <!-- Simple Grid for less than 3 events -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                            @foreach ($eventsContents as $event)
                                <article
                                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-blue-100">
                                    <a href="{{ route('events.show', $event->slug) }}" class="block">
                                        <div class="relative overflow-hidden">
                                            @if ($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}"
                                                    alt="{{ $event->title }}"
                                                    class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-300" />
                                            @else
                                                <div
                                                    class="w-full h-48 sm:h-56 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                    <i class="fas fa-calendar-alt text-3xl text-blue-400"></i>
                                                </div>
                                            @endif

                                            <div class="absolute top-3 left-3">
                                                <span
                                                    class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                                    Event
                                                </span>
                                            </div>

                                            <div
                                                class="absolute top-3 right-3 bg-white/90 rounded-lg p-2 text-center shadow-lg">
                                                <div class="text-lg font-bold text-pink-500">
                                                    {{ $event->created_at->format('d') }}</div>
                                                <div class="text-xs font-medium text-gray-500">
                                                    {{ $event->created_at->format('M') }}</div>
                                            </div>
                                        </div>
                                        <div class="p-4 sm:p-6">
                                            <h3 class="font-bold text-gray-800 text-lg sm:text-xl mb-3 line-clamp-2">
                                                {{ Str::limit($event->title, 80) }}
                                            </h3>
                                            <p class="text-gray-600 text-sm sm:text-base mb-4 line-clamp-3">
                                                {{ Str::limit(strip_tags($event->body), 120) }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <time
                                                    class="text-xs text-gray-500">{{ $event->created_at->format('d M Y') }}</time>
                                                <span class="text-pink-500 hover:text-blue-700 font-medium text-sm">
                                                    Lihat Detail →
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    <!-- View All Events Button -->
                     <div class="text-center mt-10 sm:mt-12">
                        <a href="{{ route('events.index') }}"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-base rounded-xl shadow-lg hover:shadow-xl hover:from-pink-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-newspaper mr-3"></i>
                            <span class="hidden sm:inline">Lihat Semua Acara Kesehatan</span>
                            <span class="sm:hidden">Semua Berita</span>
                            <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            @else
                <!-- Fallback jika tidak ada events -->
                <div class="text-center py-16">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-alt text-blue-400 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Acara Sedang Disiapkan</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Acara kesehatan terbaru sedang disiapkan oleh tim kami. Silakan kembali lagi nanti.
                    </p>
                    <a href="{{ route('welcome') }}"
                        class="inline-flex items-center px-6 py-3 bg-pink-500 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            @endif
        </div>
    </section>



    <!-- Doctor's Message Section -->
    <section class="py-12 sm:py-16 md:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12 sm:mb-14 md:mb-16">
                    <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-pink-100/50 rounded-full mb-4 sm:mb-6">
                        <span class="text-xs sm:text-sm font-medium text-pink-600">Menteri Kesehatan Republik
                            Indonesia</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-700 mb-3 sm:mb-4">
                        Saran Menteri Kesehatan Republik Indonesia
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                        Persentase kesembuhan kanker mencapai 90 persen apabila diketahui sejak stadium awal
                    </p>
                </div>

                <!-- Single Doctor Message -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12 items-center">
                    <!-- Content -->
                    <div class="order-2 lg:order-1">
                        <blockquote
                            class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-gray-700 font-light mb-6 sm:mb-8 leading-relaxed">
                            <small class="block text-justify text-[justify]">
                                Kesadaran masyarakat untuk melakukan kegiatan deteksi dini masih rendah. Rendahnya tingkat
                                deteksi dini terjadi karena masyarakat takut terhadap diagnosa maupun penanganan kanker.
                                Akibatnya, mayoritas pasien kanker yang datang ke fasilitas pelayanan kesehatan sudah dalam
                                stadium lanjut sehingga angka harapan hidupnya kian menurun.
                            </small>
                            <br>
                            <small class="block text-justify text-[justify]">
                                “Untuk breast cancer, masih banyak wanita yang belum menerima kenyataan kalau terkena kanker
                                payudara. Jadi, mereka tidak mau deteksi dini, padahal kalau ketahuannya telat bisa
                                meninggal.
                                Kita sekitar 70 persen ketahuannya telat”
                            </small>
                        </blockquote>


                        <div class="flex items-center mb-6 sm:mb-8">
                            <div
                                class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-pink-400 to-pink-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <span class="text-white font-bold text-sm sm:text-base">B</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700 text-sm sm:text-base">Ir. Budi Gunadi Sadikin, CHFC, CLU
                                </p>
                                <p class="text-gray-500 text-xs sm:text-sm">Menteri Kesehatan Republik Indonesia</p>
                            </div>
                        </div>

                        <!-- Professional Endorsement -->
                        <div
                            class="bg-gradient-to-br from-pink-50/80 to-pink-100/50 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-pink-100/50">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-700 mb-2 sm:mb-3">Arahan Menkes
                                RI:
                            </h4>
                            <p class="text-gray-600 mb-3 sm:mb-4 text-xs sm:text-sm">
                                “Satu yang paling penting, harus deteksi dini. Kalau ketahuannya cepat, 90 persen bisa
                                sembuh. Kalau ketahuannya terlambat 90 persen wafat.”
                            </p>
                            <a href="{{ route('prediction.form') }}"
                                class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-sm sm:text-base rounded-lg sm:rounded-xl hover:shadow-md transition-all duration-300">
                                <i class="fas fa-heartbeat mr-1 sm:mr-2"></i>
                                <span class="hidden sm:inline">Mulai Skrining Anda</span>
                                <span class="sm:hidden">Mulai Skrining</span>
                            </a>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="relative order-1 lg:order-2">
                        <div class="relative z-10">
                            <img src="img/menkes.jpeg" alt="Dr. Emily Chen"
                                class="rounded-2xl sm:rounded-3xl w-full h-64 sm:h-80 md:h-96 object-cover shadow-lg" />
                        </div>
                        <div
                            class="absolute -bottom-3 sm:-bottom-6 -left-3 sm:-left-6 w-full h-full bg-gradient-to-br from-pink-200/30 to-pink-300/30 rounded-2xl sm:rounded-3xl -z-10">
                        </div>

                        <!-- Medical Icon -->
                        <div
                            class="absolute top-4 sm:top-6 left-4 sm:left-6 w-12 sm:w-14 md:w-16 h-12 sm:h-14 md:h-16 bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl flex items-center justify-center shadow-sm">
                            <i class="fas fa-stethoscope text-lg sm:text-xl md:text-2xl text-pink-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prof Section -->
    <section class="py-12 sm:py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12 sm:mb-14 md:mb-16">
                    <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-pink-100/50 rounded-full mb-4 sm:mb-6">
                        <span class="text-xs sm:text-sm font-medium text-pink-600">Rekomendasi Ahli Onkologi</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-700 mb-3 sm:mb-4">
                        Kanker Payudara Masih Menjadi <span
                            class="bg-gradient-to-r from-pink-500 to-pink-600 bg-clip-text text-transparent">Kanker Paling
                            Banyak</span> Berdasarkan yang Berobat di RSUP Prof. I.G.N.G Ngoerah
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                        “Semua sel dalam tubuh mempunyai resiko untuk bisa berubah karena berbagai faktor. Dari 100 orang,
                        hanya 5-10 orang karena keturunan. Jadi harus diingat, kanker bukan penyakit keturunan.”
                    </p>
                </div>

                <!-- Single Story -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12 items-center">
                    <!-- Image -->
                    <div class="relative order-1">
                        <div class="relative z-10">
                            <img src="img/onkolog-2.jpg" alt="Kisah Sarah"
                                class="rounded-2xl sm:rounded-3xl w-full h-64 sm:h-80 md:h-96 object-cover shadow-lg" />
                        </div>
                        <div
                            class="absolute -bottom-3 sm:-bottom-6 -right-3 sm:-right-6 w-full h-full bg-gradient-to-br from-pink-200/30 to-pink-300/30 rounded-2xl sm:rounded-3xl -z-10">
                        </div>

                        <!-- Quote Icon -->
                        <div
                            class="absolute top-4 sm:top-6 right-4 sm:right-6 w-12 sm:w-14 md:w-16 h-12 sm:h-14 md:h-16 bg-white/90 backdrop-blur-sm rounded-xl sm:rounded-2xl flex items-center justify-center shadow-sm">
                            <i class="fas fa-quote-left text-lg sm:text-xl md:text-2xl text-pink-600"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="order-2">
                        <blockquote
                            class="text-lg sm:text-xl md:text-2xl lg:text-3xl text-gray-700 font-light mb-6 sm:mb-8 leading-relaxed">
                            <small class="block text-justify text-[justify]">
                                "Sebagai upaya menyadari adanya benjolan di payudara masih dengan cara yang manual yakni
                                meraba
                                sekitar payudara untuk mengecek benjolan. Sedangkan program screening payudara baru bisa
                                dilakukan di usia 40 tahun. “Di usia tersebut kualitas jaringan payudara tidak lagi padat.
                                Sehingga hasil screening bagus."
                            </small>
                        </blockquote>


                        <div class="flex items-center mb-6 sm:mb-8">
                            <div
                                class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-pink-400 to-pink-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <span class="text-white font-bold text-sm sm:text-base">P</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-700 text-sm sm:text-base">Prof. Dr. dr. I Wayan Sudarsa,
                                    Sp.BKOnk.</p>
                                <p class="text-gray-500 text-xs sm:text-sm">GURU BESAR FAKULTAS KEDOKTERAN UNIVERSITAS
                                    UDAYANA • ONKOLOG RSUP Prof. I.G.N.G Ngoerah</p>
                            </div>
                        </div>

                        <!-- Call to Action -->
                        <div class="bg-white/70 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-pink-100/50">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-700 mb-2 sm:mb-3">Rekomendasi Ahli</h4>
                            <p class="text-gray-600 mb-3 sm:mb-4 text-xs sm:text-sm">
                                Perubahan sel normal menjadi tidak normal tidak terjadi seketika. Perubahannya membutuhkan
                                waktu. Karena itu, masyarakat diharapkan melakukan deteksi dini agar semakin cepat
                                diketahui.
                            </p>
                            <a href="{{ route('prediction.form') }}"
                                class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold text-sm sm:text-base rounded-lg sm:rounded-xl hover:shadow-md transition-all duration-300">
                                <i class="fas fa-heartbeat mr-1 sm:mr-2"></i>
                                <span class="hidden sm:inline">Mulai Skrining Anda</span>
                                <span class="sm:hidden">Mulai Skrining</span>
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
        body {
            font-family: "Inter", sans-serif;
        }

        /* Line Clamp Utilities */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* SIDE ARTICLES - FIXED FULL COVER */
        .side-article-container {
            position: relative;
            width: 100%;
            height: 120px;
            overflow: hidden;
            border-radius: 0.75rem;
        }

        .side-article-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .side-article-fallback {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #fce7f3 0%, #f9a8d4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Side Article Card Structure */
        .side-article-card {
            display: flex;
            height: 120px;
            overflow: hidden;
        }

        .side-article-image-wrapper {
            width: 35%;
            position: relative;
            overflow: hidden;
        }

        .side-article-content-wrapper {
            width: 65%;
            padding: 12px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Hover Effects */
        .group:hover .side-article-image {
            transform: scale(1.1);
        }

        /* Responsive Heights */
        @media (min-width: 640px) {

            .side-article-container,
            .side-article-card {
                height: 130px;
            }
        }

        @media (min-width: 768px) {

            .side-article-container,
            .side-article-card {
                height: 140px;
            }
        }

        /* Blob Animation - DIGUNAKAN di Hero Section */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(20px, -30px) scale(1.05);
            }

            66% {
                transform: translate(-15px, 15px) scale(0.95);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 8s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Float Animation - DIGUNAKAN di Hero Section */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(2deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive Typography Adjustments */
        @media (max-width: 640px) {
            .text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .text-4xl {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }

            .text-5xl {
                font-size: 2.5rem;
                line-height: 1;
            }
        }

        @media (min-width: 640px) and (max-width: 768px) {
            .text-5xl {
                font-size: 3rem;
                line-height: 1;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Button interaction feedback untuk prediction links
            document.querySelectorAll('a[href*="prediction"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    const icon = this.querySelector('i:last-child');
                    if (icon) {
                        icon.classList.add('fa-spin');
                        setTimeout(() => {
                            icon.classList.remove('fa-spin');
                        }, 800);
                    }
                });
            });
        });
    </script>
@endpush
