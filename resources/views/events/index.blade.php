{{-- filepath: d:\dev\breast-cancer-web\resources\views\events\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Acara Kesehatan - Prediksi Kanker Payudara')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50/30 to-white">
        <!-- Header Section -->
        <section class="py-12 sm:py-16 md:py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8 sm:mb-10 md:mb-12">
                    <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-blue-50 rounded-full mb-4 sm:mb-6">
                        <i class="fas fa-calendar-alt mr-2 text-blue-600"></i>
                        <span class="text-xs sm:text-sm font-medium text-blue-600">Acara Kesehatan</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-700 mb-4 sm:mb-6">
                        Agenda <span
                            class="bg-gradient-to-r from-blue-500 to-blue-600 bg-clip-text text-transparent">Kesehatan</span>
                        Terkini
                    </h1>
                    <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-full sm:max-w-xl md:max-w-2xl mx-auto">
                        Ikuti berbagai acara kesehatan untuk meningkatkan awareness deteksi dini kanker payudara.
                    </p>
                </div>

                <!-- Search Bar -->
                <div class="max-w-xl mx-auto mb-8 sm:mb-10 md:mb-12">
                    <form method="GET" action="{{ route('events.index') }}" class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari acara kesehatan..."
                            class="w-full px-4 sm:px-6 py-3 sm:py-4 pr-12 sm:pr-14 bg-white border border-blue-200 rounded-xl sm:rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
                        <button type="submit"
                            class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-blue-600 hover:text-blue-700">
                            <i class="fas fa-search text-lg sm:text-xl"></i>
                        </button>
                    </form>
                    @if (request('search'))
                        <div class="mt-3 text-center">
                            <span class="text-sm text-gray-600">Hasil pencarian untuk: </span>
                            <span class="text-sm font-medium text-blue-600">"{{ request('search') }}"</span>
                            <a href="{{ route('events.index') }}" class="ml-2 text-sm text-blue-600 hover:text-blue-700">
                                <i class="fas fa-times"></i> Hapus filter
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Events Grid -->
                @if ($eventsContents->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8 mb-8 sm:mb-10">
                        @foreach ($eventsContents as $event)
                            <article
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-blue-100">
                                <a href="{{ route('events.show', $event->slug) }}" class="block">
                                    <!-- Image -->
                                    <div class="relative h-48 sm:h-56 overflow-hidden">
                                        @if ($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                <i class="fas fa-calendar-alt text-3xl text-blue-400"></i>
                                            </div>
                                        @endif

                                        <!-- Badge -->
                                        <div class="absolute top-3 left-3">
                                            @if ($event->created_at->diffInDays() < 7)
                                                <span
                                                    class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                                    Segera
                                                </span>
                                            @else
                                                <span
                                                    class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                                    Event
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Date Badge -->
                                        <div
                                            class="absolute top-3 right-3 bg-white/90 rounded-lg p-2 text-center shadow-lg">
                                            <div class="text-lg font-bold text-blue-600">
                                                {{ $event->created_at->format('d') }}</div>
                                            <div class="text-xs font-medium text-gray-500">
                                                {{ $event->created_at->format('M') }}</div>
                                        </div>

                                        <!-- Views -->
                                        <div
                                            class="absolute bottom-3 right-3 bg-black/60 text-white text-xs px-2 py-1 rounded-full">
                                            <i class="fas fa-eye mr-1"></i>{{ $event->views ?? 0 }}
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-4 sm:p-6">
                                        <h3
                                            class="font-bold text-gray-800 text-lg sm:text-xl mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                            {{ $event->title }}
                                        </h3>
                                        <p class="text-gray-600 text-sm sm:text-base mb-4 line-clamp-3">
                                            {{ Str::limit(strip_tags($event->body), 120) }}
                                        </p>
                                        <div class="flex items-center justify-between text-xs sm:text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <i class="fas fa-calendar mr-1"></i>
                                                <time>{{ $event->created_at->format('d M Y') }}</time>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ ceil(str_word_count(strip_tags($event->body)) / 200) }} min baca
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center">
                        {{ $eventsContents->links('pagination::tailwind') }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-alt text-blue-400 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4">
                            @if (request('search'))
                                Tidak ada hasil ditemukan
                            @else
                                Acara Sedang Disiapkan
                            @endif
                        </h3>
                        <p class="text-gray-500 mb-8 max-w-md mx-auto">
                            @if (request('search'))
                                Coba kata kunci lain atau hapus filter pencarian.
                            @else
                                Acara kesehatan terbaru sedang disiapkan oleh tim kami.
                            @endif
                        </p>
                        @if (request('search'))
                            <a href="{{ route('events.index') }}"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Lihat Semua Acara
                            </a>
                        @else
                            <a href="{{ route('welcome') }}"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <i class="fas fa-home mr-2"></i>
                                Kembali ke Beranda
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    </div>

    @push('styles')
        <style>
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
        </style>
    @endpush
@endsection
