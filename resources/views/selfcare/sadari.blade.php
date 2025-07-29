{{-- filepath: d:\dev\breast-cancer-web\resources\views\selfcare\sadari.blade.php --}}
@extends('layouts.app')

@section('title', 'SADARI - Pemeriksaan Payudara Sendiri - BreastCare')

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
                    <span class="text-gray-700">SADARI</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Article -->
                <article class="lg:col-span-3">

                    @php
                        // Query data untuk SADARI
                        $sadariContents = \App\Models\Content::where('category', 'sadari')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp

                    <!-- Header Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">SADARI - Pemeriksaan Payudara Sendiri</h1>
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 border-l-4 border-green-400 p-6 rounded-lg">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-hands text-green-400 text-2xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-green-800">Deteksi Dini dengan Tangan Sendiri</h3>
                                    <p class="mt-2 text-sm text-green-700">
                                        SADARI (Periksa Payudara Sendiri) adalah pemeriksaan sederhana yang dapat dilakukan
                                        setiap wanita untuk mendeteksi kelainan pada payudara sejak dini. Lakukan rutin
                                        setiap bulan!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Waktu Terbaik -->
                        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-calendar-day text-white"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-green-800">Waktu Terbaik</h3>
                            </div>
                            <p class="text-sm text-green-700">
                                Lakukan SADARI 7-10 hari setelah menstruasi dimulai, saat payudara tidak bengkak atau nyeri.
                            </p>
                        </div>

                        <!-- Frekuensi -->
                        <div class="bg-gradient-to-br from-teal-50 to-teal-100 border border-teal-200 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-redo text-white"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-teal-800">Frekuensi</h3>
                            </div>
                            <p class="text-sm text-teal-700">
                                Lakukan pemeriksaan setiap bulan secara rutin. Konsistensi adalah kunci deteksi dini.
                            </p>
                        </div>

                        <!-- Durasi -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-blue-800">Durasi</h3>
                            </div>
                            <p class="text-sm text-blue-700">
                                Pemeriksaan hanya membutuhkan waktu 10-15 menit untuk kedua payudara.
                            </p>
                        </div>

                        <!-- Lokasi -->
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-home text-white"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-purple-800">Lokasi</h3>
                            </div>
                            <p class="text-sm text-purple-700">
                                Dapat dilakukan di rumah, di kamar mandi saat mandi, atau di tempat tidur.
                            </p>
                        </div>
                    </div>

                    <!-- Dynamic Content from Filament -->
                    @if ($sadariContents->count() > 0)
                        @foreach ($sadariContents as $content)
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
                                                <span class="flex items-center bg-green-100 px-3 py-1 rounded-full">
                                                    <i class="fas fa-user mr-2"></i>
                                                    {{ $content->source }}
                                                </span>
                                            @endif
                                            <span class="flex items-center bg-teal-100 px-3 py-1 rounded-full">
                                                <i class="fas fa-tag mr-2"></i>
                                                SADARI
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
                            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-hands text-green-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Konten Sedang Disiapkan</h3>
                            <p class="text-gray-500 mb-4">
                                Panduan SADARI sedang disiapkan oleh tim medis kami.
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
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
                            'detection-benefits',
                            'guidelines',
                        ])
                            ->limit(6)
                            ->get();
                    @endphp

                    <!-- Reminder Card -->
                    <div class="bg-gradient-to-br from-green-100 to-teal-100 border border-green-200 rounded-lg p-6 mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-bell text-white text-xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-green-800 mb-2">Pengingat SADARI</h3>
                            <p class="text-sm text-green-700 mb-4">
                                Atur pengingat bulanan untuk melakukan pemeriksaan SADARI
                            </p>
                            <button onclick="setReminder()"
                                class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors duration-200">
                                Atur Pengingat
                            </button>
                        </div>
                    </div>

                    <!-- Quick Steps -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-list-ol mr-2 text-green-500"></i>
                            Langkah Cepat
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-3 mt-1">1</span>
                                <p class="text-sm text-gray-700">Periksa di depan cermin</p>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-3 mt-1">2</span>
                                <p class="text-sm text-gray-700">Angkat kedua tangan</p>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-3 mt-1">3</span>
                                <p class="text-sm text-gray-700">Raba dengan gerakan melingkar</p>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-3 mt-1">4</span>
                                <p class="text-sm text-gray-700">Periksa area ketiak</p>
                            </div>
                            <div class="flex items-start">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold mr-3 mt-1">5</span>
                                <p class="text-sm text-gray-700">Tekan area puting</p>
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
                                    Tanda dan gejala kanker payudara
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Faktor risiko kanker payudara
                                </a>
                                <a href="#"
                                    class="block p-3 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-sm">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Manfaat deteksi dini
                                </a>
                            @endforelse
                        </nav>
                    </div>

                    <!-- Call to Action -->
                    <div
                        class="bg-gradient-to-br from-green-500 to-teal-600 rounded-lg p-6 text-white text-center shadow-lg">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-video text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-3">Video Tutorial</h3>
                        <p class="text-sm mb-4 opacity-90 leading-relaxed">
                            Tonton video panduan lengkap cara melakukan SADARI dengan benar
                        </p>
                        <a href="#"
                            class="inline-block bg-white text-green-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors duration-200 shadow">
                            Tonton Video
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
                    title: 'SADARI - Pemeriksaan Payudara Sendiri',
                    text: 'Panduan lengkap melakukan SADARI untuk deteksi dini kanker payudara',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Link artikel telah disalin ke clipboard!');
                });
            }
        }

        function setReminder() {
            // Simple reminder implementation
            const reminderDate = new Date();
            reminderDate.setMonth(reminderDate.getMonth() + 1);

            if ('Notification' in window) {
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        alert('Pengingat SADARI akan aktif bulan depan pada tanggal ' + reminderDate
                            .toLocaleDateString());
                        // Here you would typically save this to localStorage or send to server
                        localStorage.setItem('sadariReminder', reminderDate.toISOString());
                    }
                });
            } else {
                alert('Pengingat SADARI akan aktif bulan depan pada tanggal ' + reminderDate.toLocaleDateString());
            }
        }
    </script>
@endsection
