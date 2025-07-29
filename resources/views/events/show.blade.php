{{-- filepath: d:\dev\breast-cancer-web\resources\views\events\show.blade.php --}}
@extends('layouts.app')

@section('title', $content->title . ' - Acara Kesehatan')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50/30 to-white">
        <!-- Article Header -->
        <section class="py-8 sm:py-12 md:py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="mb-6 sm:mb-8">
                    <ol class="flex items-center text-sm text-gray-600">
                        <li><a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a></li>
                        <li class="mx-2">/</li>
                        <li><a href="{{ route('events.index') }}" class="hover:text-blue-600">Acara</a></li>
                        <li class="mx-2">/</li>
                        <li class="text-gray-400">{{ Str::limit($content->title, 50) }}</li>
                    </ol>
                </nav>

                <div class="max-w-4xl mx-auto">
                    <!-- Article Meta -->
                    <div class="mb-6 sm:mb-8">
                        <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
                            <span class="bg-blue-500 text-white text-xs sm:text-sm font-semibold px-3 py-2 rounded-full">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                Acara Kesehatan
                            </span>
                            @if ($content->created_at->diffInDays() < 7)
                                <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                    Segera
                                </span>
                            @endif
                        </div>

                        <h1
                            class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 leading-tight mb-4 sm:mb-6">
                            {{ $content->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-sm text-gray-600 mb-6 sm:mb-8">
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2 text-blue-600"></i>
                                <time>{{ $content->created_at->format('d F Y') }}</time>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2 text-blue-600"></i>
                                {{ ceil(str_word_count(strip_tags($content->body)) / 200) }} menit baca
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-eye mr-2 text-blue-600"></i>
                                {{ $content->views ?? 0 }} kali dibaca
                            </div>
                            @if ($content->source)
                                <div class="flex items-center">
                                    <i class="fas fa-link mr-2 text-blue-600"></i>
                                    <span>{{ $content->source }}</span>
                                </div>
                            @endif
                            @if ($content->user)
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-2 text-blue-600"></i>
                                    <span>{{ $content->user->name }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if ($content->image)
                        <div class="mb-8 sm:mb-10 md:mb-12">
                            <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg">
                                <img src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}"
                                    class="w-full h-64 sm:h-80 md:h-96 object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        </div>
                    @endif

                    <!-- Event Content -->
                    <article class="mb-8 sm:mb-10 md:mb-12">
                        <div class="prose prose-lg max-w-none text-gray-700">
                            {!! nl2br($content->body) !!}
                        </div>
                    </article>

                    <!-- Share Section -->
                    <div
                        class="bg-gradient-to-r from-blue-50 to-blue-100/50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-blue-200/30 mb-8 sm:mb-10 md:mb-12">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-4">Bagikan Acara Ini</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                <i class="fab fa-facebook-f mr-2"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($content->title) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors text-sm">
                                <i class="fab fa-twitter mr-2"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($content->title . ' - ' . request()->fullUrl()) }}"
                                target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors text-sm">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyLink()"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm">
                                <i class="fas fa-link mr-2"></i>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Events -->
        @if ($relatedEvents->count() > 0)
            <section class="py-8 sm:py-12 md:py-16 border-t border-gray-200">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-6xl mx-auto">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mb-8 sm:mb-10 text-center">
                            Acara <span
                                class="bg-gradient-to-r from-blue-500 to-blue-600 bg-clip-text text-transparent">Terkait</span>
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                            @foreach ($relatedEvents as $related)
                                <article
                                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-blue-100">
                                    <a href="{{ route('events.show', $related->slug) }}" class="block">
                                        <!-- Image -->
                                        <div class="relative h-40 sm:h-48 overflow-hidden">
                                            @if ($related->image)
                                                <img src="{{ asset('storage/' . $related->image) }}"
                                                    alt="{{ $related->title }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                                    <i class="fas fa-calendar-alt text-2xl text-blue-400"></i>
                                                </div>
                                            @endif

                                            <div
                                                class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-eye mr-1"></i>{{ $related->views ?? 0 }}
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="p-4">
                                            <h3
                                                class="font-bold text-gray-800 text-sm sm:text-base mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                                {{ $related->title }}
                                            </h3>
                                            <p class="text-gray-600 text-xs sm:text-sm mb-3 line-clamp-2">
                                                {{ Str::limit(strip_tags($related->body), 80) }}
                                            </p>
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <time>{{ $related->created_at->format('d M Y') }}</time>
                                                <span class="text-blue-600 hover:text-blue-700 font-medium">
                                                    Detail →
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>

                        <!-- View More Events -->
                        <div class="text-center mt-8 sm:mt-10">
                            <a href="{{ route('events.index') }}"
                                class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-calendar-alt mr-3"></i>
                                Lihat Acara Lainnya
                                <i class="fas fa-arrow-right ml-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        
    </div>

    @push('styles')
        <style>
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .prose {
                line-height: 1.8;
                color: #374151;
                font-size: 1.125rem;
            }

            .prose p {
                margin-bottom: 1.5rem;
                text-align: justify;
            }

            .prose strong {
                font-weight: 600;
                color: #111827;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function copyLink() {
                navigator.clipboard.writeText(window.location.href).then(function() {
                    const toast = document.createElement('div');
                    toast.className =
                        'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                    toast.textContent = 'Link berhasil disalin!';
                    document.body.appendChild(toast);

                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                });
            }
        </script>
    @endpush
@endsection
