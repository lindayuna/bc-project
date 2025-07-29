{{-- filepath: d:\dev\breast-cancer-web\resources\views\news\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Berita Kesehatan Terbaru - BreastCare')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-pink-50/30 to-white">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-pink-500 to-pink-600 text-white py-16 sm:py-20 md:py-24">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 right-10 w-32 h-32 bg-white rounded-full animate-float"></div>
                <div class="absolute bottom-20 left-10 w-20 h-20 bg-white rounded-full animate-float animation-delay-2000">
                </div>
                <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-white rounded-full animate-float animation-delay-4000">
                </div>
            </div>

            <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <i class="fas fa-newspaper mr-2"></i>
                    <span class="text-sm font-medium">Berita Terkini</span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                    Berita Kesehatan <span class="text-pink-200">Terbaru</span>
                </h1>

                <p class="text-lg sm:text-xl text-pink-100 max-w-3xl mx-auto mb-8">
                    Dapatkan informasi terkini seputar kesehatan payudara, penelitian terbaru, kampanye kesadaran, dan
                    update kebijakan kesehatan.
                </p>

                <!-- Stats -->
                <div class="flex flex-wrap justify-center gap-8 text-center">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">{{ $newsContents->total() }}</div>
                        <div class="text-sm text-pink-200">Total Berita</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">
                            {{ $newsContents->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                        <div class="text-sm text-pink-200">Berita Minggu Ini</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl px-6 py-4">
                        <div class="text-2xl font-bold">
                            {{ $newsContents->where('created_at', '>=', now()->subDays(1))->count() }}</div>
                        <div class="text-sm text-pink-200">Berita Hari Ini</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Breadcrumb -->
        <div class="bg-white border-b border-gray-200">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('welcome') }}" class="text-pink-600 hover:text-pink-800 hover:underline">
                        <i class="fas fa-home mr-1"></i>
                        Home
                    </a>
                    <span class="text-gray-500">›</span>
                    <span class="text-gray-700">Berita Kesehatan</span>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <section class="py-12 sm:py-16 md:py-20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">

                    @if ($newsContents->count() > 0)
                        <!-- Filter and Search -->
                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 sm:mb-12">
                            <div>
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">
                                    Semua Berita
                                    <span class="text-pink-600">({{ $newsContents->total() }})</span>
                                </h2>
                                <p class="text-gray-600 text-sm mt-1">
                                    Berita kesehatan terbaru dan terpercaya
                                </p>
                            </div>

                            <!-- Search Form -->
                            <form method="GET" class="flex items-center space-x-2">
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari berita..."
                                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <button type="submit"
                                    class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Featured News (First 3) -->
                        @if ($newsContents->currentPage() == 1)
                            <div class="mb-12 sm:mb-16">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                    <i class="fas fa-star mr-3 text-yellow-500"></i>
                                    Berita Utama
                                </h3>

                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                                    @foreach ($newsContents->take(3) as $featured)
                                        <article
                                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group border border-pink-100">
                                            <div class="relative overflow-hidden">
                                                @if ($featured->image)
                                                    <img src="{{ asset('storage/' . $featured->image) }}"
                                                        alt="{{ $featured->title }}"
                                                        class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                                                @else
                                                    <div
                                                        class="w-full h-48 sm:h-56 bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                                                        <i class="fas fa-newspaper text-4xl text-pink-400"></i>
                                                    </div>
                                                @endif

                                                <div class="absolute top-3 left-3">
                                                    <span
                                                        class="bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                                        <i class="fas fa-star mr-1"></i>
                                                        Utama
                                                    </span>
                                                </div>

                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                </div>
                                            </div>

                                            <div class="p-6">
                                                <h3
                                                    class="font-bold text-gray-800 text-lg sm:text-xl mb-3 line-clamp-2 group-hover:text-pink-600 transition-colors">
                                                    {{ $featured->title }}
                                                </h3>
                                                <p class="text-gray-600 text-sm sm:text-base mb-4 line-clamp-3">
                                                    {{ Str::limit(strip_tags($featured->body), 150) }}
                                                </p>
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center text-xs text-gray-500">
                                                        <i class="fas fa-calendar mr-1"></i>
                                                        <time>{{ $featured->created_at->format('d M Y') }}</time>
                                                        <span class="mx-2">•</span>
                                                        <i class="fas fa-clock mr-1"></i>
                                                        {{ ceil(str_word_count(strip_tags($featured->body)) / 200) }} min
                                                    </div>
                                                    <a href="{{ route('news.show', $featured->slug) }}"
                                                        class="text-pink-600 hover:text-pink-700 font-medium text-sm group-hover:underline">
                                                        Baca →
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- All News Grid -->
                        <div class="mb-8 sm:mb-12">
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <i class="fas fa-newspaper mr-3 text-pink-600"></i>
                                {{ $newsContents->currentPage() == 1 ? 'Berita Lainnya' : 'Semua Berita' }}
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                                @foreach ($newsContents->currentPage() == 1 ? $newsContents->skip(3) : $newsContents as $news)
                                    <article
                                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group border border-pink-100">
                                        <div class="relative overflow-hidden">
                                            @if ($news->image)
                                                <img src="{{ asset('storage/' . $news->image) }}"
                                                    alt="{{ $news->title }}"
                                                    class="w-full h-40 sm:h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div
                                                    class="w-full h-40 sm:h-48 bg-gradient-to-br from-pink-100 to-pink-200 flex items-center justify-center">
                                                    <i class="fas fa-newspaper text-2xl text-pink-400"></i>
                                                </div>
                                            @endif

                                            <div class="absolute top-2 right-2">
                                                @if ($news->created_at->diffInDays() < 7)
                                                    <span
                                                        class="bg-green-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                                        Baru
                                                    </span>
                                                @else
                                                    <span
                                                        class="bg-pink-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                                        Berita
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="p-4">
                                            <h4
                                                class="font-bold text-gray-800 text-base leading-tight mb-2 line-clamp-2 group-hover:text-pink-600 transition-colors">
                                                {{ Str::limit($news->title, 80) }}
                                            </h4>
                                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                                {{ Str::limit(strip_tags($news->body), 100) }}
                                            </p>
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <div class="flex items-center">
                                                    <i class="fas fa-calendar mr-1"></i>
                                                    <time>{{ $news->created_at->format('d M Y') }}</time>
                                                </div>
                                                <a href="{{ route('news.show', $news->slug) }}"
                                                    class="text-pink-600 hover:text-pink-700 font-medium group-hover:underline">
                                                    Baca →
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center">
                            {{ $newsContents->links('pagination::tailwind') }}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div
                                class="w-32 h-32 bg-gradient-to-br from-pink-100 to-pink-200 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-newspaper text-pink-400 text-4xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-700 mb-4">
                                @if (request('search'))
                                    Tidak Ada Hasil untuk "{{ request('search') }}"
                                @else
                                    Belum Ada Berita
                                @endif
                            </h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                @if (request('search'))
                                    Coba gunakan kata kunci yang berbeda atau hapus filter pencarian.
                                @else
                                    Berita kesehatan terbaru sedang disiapkan oleh tim redaksi kami.
                                @endif
                            </p>

                            @if (request('search'))
                                <a href="{{ route('news.index') }}"
                                    class="inline-flex items-center px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors duration-200">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Lihat Semua Berita
                                </a>
                            @else
                                <a href="{{ route('welcome') }}"
                                    class="inline-flex items-center px-6 py-3 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors duration-200">
                                    <i class="fas fa-home mr-2"></i>
                                    Kembali ke Beranda
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <style>
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

        /* Float Animation */
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

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Custom Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.75rem;
            border: 1px solid #e5e7eb;
            color: #6b7280;
            text-decoration: none;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .pagination a:hover {
            background-color: #ec4899;
            color: white;
            border-color: #ec4899;
        }

        .pagination .current {
            background-color: #ec4899;
            color: white;
            border-color: #ec4899;
        }

        /* Responsive Grid Adjustments */
        @media (max-width: 640px) {
            .grid {
                gap: 1rem;
            }
        }

        /* Search Input Focus */
        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }

        /* Card Hover Effect */
        .group:hover {
            transform: translateY(-2px);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer untuk animasi fade-in
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe articles
            document.querySelectorAll('article').forEach((article, index) => {
                article.style.opacity = '0';
                article.style.transform = 'translateY(20px)';
                article.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(article);
            });

            // Search functionality enhancement
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.addEventListener('input', debounce(function() {
                    // Optional: Auto-search functionality
                }, 500));
            }

            // Debounce function
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Smooth scroll untuk pagination
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Scroll to top after pagination
                    setTimeout(() => {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }, 100);
                });
            });

            // Newsletter form handling
            const newsletterForm = document.querySelector('form[action*="newsletter"]');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const email = this.querySelector('input[type="email"]').value;

                    if (email) {
                        // Show success message
                        alert('Terima kasih! Anda akan menerima update berita terbaru.');
                        this.reset();
                    }
                });
            }
        });
    </script>
@endpush
