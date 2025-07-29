<header
    class="bg-white shadow-sm sticky top-0 left-0 w-full flex items-center z-50 border-b border-gray-100 navbar-fixed">
    <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ url('/') }}" class="flex items-center transition-opacity duration-200 hover:opacity-80">
                    <img src="{{ asset('img/logo.png') }}" alt="BreastCare" class="h-10 w-auto" />

                </a>
            </div>

            <!-- Navigation & Auth Container -->
            <div class="flex items-center space-x-8">
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <!-- Home -->
                    <a href="{{ url('/') }}"
                        class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 py-2 px-1
                              {{ request()->is('/') ? 'text-primary border-b-2 border-primary' : '' }}">
                        Home
                    </a>

                    <!-- Selfcare Dropdown - FIXED SIZE -->
                    <div class="relative group">
                        <button
                            class="flex items-center text-gray-700 hover:text-primary font-medium transition-colors duration-200 py-2 px-1
                                   {{ request()->is('selfcare*') ? 'text-primary border-b-2 border-primary' : '' }}">
                            Selfcare
                            <svg class="ml-1 w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu - CONSISTENT SIZE -->
                        <div
                            class="absolute left-0 top-full mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-200 
                                    opacity-0 invisible transform translate-y-2 transition-all duration-300 
                                    group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                            <div class="p-3">
                                <!-- Header Section - COMPACT -->
                                <div class="px-2 py-2 border-b border-gray-100 mb-3">
                                    <h3 class="text-sm font-semibold text-gray-800 flex items-center">
                                        <div
                                            class="w-6 h-6 bg-pink-100 rounded-lg flex items-center justify-center mr-2">
                                            <i class="fas fa-heart text-pink-600 text-xs"></i>
                                        </div>
                                        Selfcare Information
                                    </h3>
                                </div>

                                <!-- Menu Items Grid - CONSISTENT SIZING -->
                                <div class="grid grid-cols-1 gap-1">
                                    <!-- Breast Cancer Info -->
                                    <a href="{{ route('selfcare.breast-cancer-info') }}"
                                        class="group/item flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-blue-50 rounded-lg transition-all duration-200">
                                        <div
                                            class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-blue-100 transition-colors duration-200">
                                            <i class="fas fa-info-circle text-blue-600 text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium text-gray-900">Apa itu Breast Cancer?</div>
                                            <div class="text-xs text-gray-500">Informasi kanker payudara</div>
                                        </div>
                                    </a>

                                    <!-- Symptoms -->
                                    <a href="{{ route('selfcare.signs-symptoms') }}"
                                        class="group/item flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-orange-50 rounded-lg transition-all duration-200">
                                        <div
                                            class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-orange-100 transition-colors duration-200">
                                            <i class="fas fa-exclamation-triangle text-orange-600 text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium text-gray-900">Tanda dan Gejala</div>
                                            <div class="text-xs text-gray-500">Kenali gejala dini</div>
                                        </div>
                                    </a>

                                    <!-- Risk Factors -->
                                    <a href="{{ route('selfcare.risk-factors') }}"
                                        class="group/item flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-red-50 rounded-lg transition-all duration-200">
                                        <div
                                            class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-red-100 transition-colors duration-200">
                                            <i class="fas fa-chart-line text-red-600 text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium text-gray-900">Faktor Risiko</div>
                                            <div class="text-xs text-gray-500">Faktor yang meningkatkan risiko</div>
                                        </div>
                                    </a>

                                    <!-- SADARI Section - COMPACT VERSION -->
                                    <div
                                        class="relative group/sadari bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200 mt-1">
                                        <button
                                            class="flex items-center justify-between w-full px-3 py-2.5 text-sm hover:bg-green-100/50 rounded-lg transition-all duration-200">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 border border-green-200">
                                                    <i class="fas fa-hands text-green-600 text-xs"></i>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-green-800">SADARI</div>
                                                    <div class="text-xs text-green-600">Pemeriksaan payudara sendiri
                                                    </div>
                                                </div>
                                            </div>
                                            <svg class="w-4 h-4 text-green-600 transform transition-transform duration-200 group-hover/sadari:rotate-90 flex-shrink-0"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>

                                        <!-- SADARI Submenu - CONSISTENT SIZE -->
                                        <div
                                            class="absolute left-full top-0 ml-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 
                                                    opacity-0 invisible transform translate-x-2 transition-all duration-300 
                                                    group-hover/sadari:opacity-100 group-hover/sadari:visible group-hover/sadari:translate-x-0 z-60">
                                            <div class="p-3">
                                                <!-- SADARI Header - COMPACT -->
                                                <div class="px-2 py-2 border-b border-gray-100 mb-3">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="w-6 h-6 bg-green-100 rounded-lg flex items-center justify-center mr-2">
                                                            <i class="fas fa-hands text-green-600 text-xs"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="font-medium text-green-700 text-sm">SADARI</h4>
                                                            <p class="text-xs text-gray-500">Pemeriksaan Payudara
                                                                Sendiri</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- SADARI Menu Items - CONSISTENT SIZING -->
                                                <div class="space-y-1">
                                                    <a href="{{ route('selfcare.sadari') }}"
                                                        class="flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-blue-50 rounded-lg transition-all duration-200">
                                                        <div
                                                            class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                                            <i class="fas fa-question-circle text-blue-600 text-xs"></i>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="font-medium text-gray-900">Apa itu SADARI?</div>
                                                            <div class="text-xs text-gray-500">Pengenalan dasar</div>
                                                        </div>
                                                    </a>

                                                    <a href="{{ route('selfcare.detection-benefits') }}"
                                                        class="flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-yellow-50 rounded-lg transition-all duration-200">
                                                        <div
                                                            class="w-8 h-8 bg-yellow-50 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                                            <i class="fas fa-lightbulb text-yellow-600 text-xs"></i>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="font-medium text-gray-900">Mengapa Penting?
                                                            </div>
                                                            <div class="text-xs text-gray-500">Manfaat deteksi dini
                                                            </div>
                                                        </div>
                                                    </a>

                                                    <a href="{{ route('selfcare.guidelines') }}"
                                                        class="flex items-center px-3 py-2.5 text-sm text-gray-700 hover:text-primary hover:bg-green-50 rounded-lg transition-all duration-200">
                                                        <div
                                                            class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                                            <i class="fas fa-hands-helping text-green-600 text-xs"></i>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="font-medium text-gray-900">Cara Melakukan</div>
                                                            <div class="text-xs text-gray-500">Panduan langkah</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detection Menu -->
                    @auth
                        <div class="relative group">
                            <button
                                class="flex items-center text-gray-700 hover:text-primary font-medium transition-colors duration-200 py-2 px-1
                                           {{ request()->is('detection*') ? 'text-primary border-b-2 border-primary' : '' }}">
                                {{ auth()->user()->role === 'dokter' ? 'Panel Deteksi' : 'Deteksi Sekarang' }}
                                <svg class="ml-1 w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Detection Dropdown -->
                            <div
                                class="absolute left-0 top-full mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 
                                        opacity-0 invisible transform translate-y-2 transition-all duration-200 
                                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                                <div class="p-2">
                                    @if (auth()->user()->role === 'dokter')
                                        <a href="{{ route('doctor.search') }}"
                                            class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                            <div
                                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-plus-circle text-green-600 text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium">Cari Sekarang</div>
                                                <div class="text-xs text-gray-500">Baca hasil prediksi</div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('prediction.form') }}"
                                            class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                            <div
                                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-play-circle text-green-600 text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium">Mulai Deteksi Dini</div>
                                                <div class="text-xs text-gray-500">Deteksi kanker payudara sekarang</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('prediction.history') }}"
                                            class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                            <div
                                                class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-history text-blue-600 text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium">Riwayat Deteksi</div>
                                                <div class="text-xs text-gray-500">Lihat hasil deteksi sebelumnya</div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Guest Detection -->
                        <div class="relative group">
                            <button
                                class="flex items-center text-gray-700 hover:text-primary font-medium transition-colors duration-200 py-2 px-1">
                                Deteksi Sekarang
                                <svg class="ml-1 w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div
                                class="absolute left-0 top-full mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 
                                        opacity-0 invisible transform translate-y-2 transition-all duration-200 
                                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                                <div class="p-2">
                                    <a href="{{ route('login') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-play-circle text-green-600 text-sm"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium">Mulai Deteksi Dini</div>
                                            <div class="text-xs text-gray-500">Deteksi kanker payudara sekarang</div>
                                        </div>
                                        <span
                                            class="px-2 py-1 bg-orange-100 text-orange-600 rounded text-xs font-medium">Login</span>
                                    </a>
                                    <a href="{{ route('login') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-history text-blue-600 text-sm"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium">Riwayat Deteksi</div>
                                            <div class="text-xs text-gray-500">Lihat hasil deteksi sebelumnya</div>
                                        </div>
                                        <span
                                            class="px-2 py-1 bg-orange-100 text-orange-600 rounded text-xs font-medium">Login</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                </nav>

                <!-- Desktop Auth/User -->
                @guest
                    <div class="hidden lg:flex items-center space-x-4">
                        <a href="{{ route('user.register') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary transition-colors duration-200">
                            Register
                        </a>
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 text-sm font-medium text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors duration-200">
                            Login
                        </a>
                    </div>
                @else
                    <!-- Desktop User Menu -->
                    <div class="hidden lg:flex relative group">
                        <button
                            class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-white 
                                       {{ auth()->user()->role === 'dokter' ? 'bg-blue-600 hover:bg-blue-700' : 'bg-primary hover:bg-primary/90' }} 
                                       rounded-lg transition-colors duration-200">
                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                <i
                                    class="fas {{ auth()->user()->role === 'dokter' ? 'fa-user-md' : 'fa-user' }} text-xs"></i>
                            </div>
                            <span class="max-w-32 truncate">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- User Dropdown -->
                        <div
                            class="absolute right-0 top-full mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 
                                    opacity-0 invisible transform translate-y-2 transition-all duration-200 
                                    group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-50">
                            <div class="p-2">
                                <a href="{{ route('user.profile') }}"
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-cog mr-3 w-4"></i>
                                    Profile Settings
                                </a>
                                @if (auth()->user()->role === 'dokter')
                                    <a href="{{ route('doctor.search') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-chart-bar mr-3 w-4"></i>
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('prediction.history') }}"
                                        class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-history mr-3 w-4"></i>
                                        My History
                                    </a>
                                @endif
                                <hr class="my-2 border-gray-200">
                                <form method="POST" action="{{ route('user.logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-3 w-4"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                <!-- Mobile Hamburger Menu Button -->
                <div class="lg:hidden">
                    <button id="hamburger" type="button"
                        class="flex items-center justify-center w-11 h-11 rounded-lg bg-primary text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="hamburger-top" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16" class="transition-all duration-300"></path>
                            <path id="hamburger-middle" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 12h16" class="transition-all duration-300"></path>
                            <path id="hamburger-bottom" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 18h16" class="transition-all duration-300"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay"
        class="fixed inset-0 bg-black/60 z-40 opacity-0 invisible transition-all duration-300 lg:hidden"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl lg:hidden">
        <!-- Mobile Menu Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-white">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('img/logo.png') }}" alt="BreastCare" class="h-8 w-auto" />
                <span class="text-lg font-bold text-gray-800">BreastCare</span>
            </div>
            <button id="close-menu" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Content -->
        <div class="h-full overflow-y-auto p-4 pb-20">
            <!-- Mobile Navigation -->
            <div class="space-y-2">
                <a href="{{ url('/') }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200
                          {{ request()->is('/') ? 'text-primary bg-primary/10 font-semibold' : '' }}">
                    <i class="fas fa-home mr-3 w-5 text-primary/70"></i>
                    Home
                </a>

                <!-- Mobile Selfcare - FIXED -->
                <div class="space-y-1">
                    <button id="mobile-selfcare-btn"
                        class="flex items-center justify-between w-full px-4 py-3 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="flex items-center">
                            <i class="fas fa-heart mr-3 w-5 text-pink-500"></i>
                            Selfcare
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="mobile-selfcare-menu" class="hidden space-y-2 pl-4 pr-2 py-2">
                        <!-- Info Cards Grid - COMPACT -->
                        <div class="space-y-2">
                            <!-- Breast Cancer Info -->
                            <a href="{{ route('selfcare.breast-cancer-info') }}"
                                class="flex items-center px-3 py-2.5 text-sm bg-white rounded-lg shadow-sm border border-gray-100 hover:border-blue-200 transition-all duration-200">
                                <div
                                    class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mr-3 border border-blue-100">
                                    <i class="fas fa-info-circle text-blue-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-gray-800">Apa itu Breast Cancer?</div>
                                    <div class="text-xs text-gray-500">Informasi kanker payudara</div>
                                </div>
                            </a>

                            <!-- Symptoms -->
                            <a href="{{ route('selfcare.signs-symptoms') }}"
                                class="flex items-center px-3 py-2.5 text-sm bg-white rounded-lg shadow-sm border border-gray-100 hover:border-orange-200 transition-all duration-200">
                                <div
                                    class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center mr-3 border border-orange-100">
                                    <i class="fas fa-exclamation-triangle text-orange-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-gray-800">Tanda dan Gejala</div>
                                    <div class="text-xs text-gray-500">Kenali gejala dini</div>
                                </div>
                            </a>

                            <!-- Risk Factors -->
                            <a href="{{ route('selfcare.risk-factors') }}"
                                class="flex items-center px-3 py-2.5 text-sm bg-white rounded-lg shadow-sm border border-gray-100 hover:border-red-200 transition-all duration-200">
                                <div
                                    class="w-8 h-8 bg-red-50 rounded-lg flex items-center justify-center mr-3 border border-red-100">
                                    <i class="fas fa-chart-line text-red-600 text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-gray-800">Faktor Risiko</div>
                                    <div class="text-xs text-gray-500">Faktor yang meningkatkan risiko</div>
                                </div>
                            </a>
                        </div>

                        <!-- SADARI Special Section - COMPACT -->
                        <div
                            class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-3 border border-green-200 mt-3">
                            <!-- SADARI Header -->
                            <div class="flex items-center mb-2">
                                <div
                                    class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 border border-green-200">
                                    <i class="fas fa-hands text-green-600 text-xs"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-green-800">SADARI</div>
                                    <div class="text-xs text-green-600">Pemeriksaan Payudara Sendiri</div>
                                </div>
                            </div>

                            <!-- SADARI Menu Items - COMPACT -->
                            <div class="space-y-1">
                                <a href="{{ route('selfcare.sadari') }}"
                                    class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-green-700 bg-white/70 hover:bg-white rounded-lg transition-all duration-200">
                                    <div
                                        class="w-6 h-6 bg-white rounded-md flex items-center justify-center mr-3 shadow-sm">
                                        <i class="fas fa-question-circle text-blue-500 text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900">Apa itu SADARI?</div>
                                    </div>
                                </a>

                                <a href="{{ route('selfcare.detection-benefits') }}"
                                    class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-green-700 bg-white/70 hover:bg-white rounded-lg transition-all duration-200">
                                    <div
                                        class="w-6 h-6 bg-white rounded-md flex items-center justify-center mr-3 shadow-sm">
                                        <i class="fas fa-lightbulb text-yellow-500 text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900">Mengapa Penting?</div>
                                    </div>
                                </a>

                                <a href="{{ route('selfcare.guidelines') }}"
                                    class="flex items-center px-3 py-2 text-sm text-gray-700 hover:text-green-700 bg-white/70 hover:bg-white rounded-lg transition-all duration-200">
                                    <div
                                        class="w-6 h-6 bg-white rounded-md flex items-center justify-center mr-3 shadow-sm">
                                        <i class="fas fa-hands-helping text-green-500 text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900">Cara Melakukan</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Detection -->
                @auth
                    <div class="space-y-1">
                        <button id="mobile-detection-btn"
                            class="flex items-center justify-between w-full px-4 py-3 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <div class="flex items-center">
                                <i
                                    class="fas {{ auth()->user()->role === 'dokter' ? 'fa-stethoscope text-blue-500' : 'fa-search text-purple-500' }} mr-3 w-5"></i>
                                {{ auth()->user()->role === 'dokter' ? 'Panel Deteksi' : 'Deteksi Sekarang' }}
                            </div>
                            <svg class="w-4 h-4 transform transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div id="mobile-detection-menu" class="hidden ml-8 space-y-1 bg-gray-50 rounded-lg p-2">
                            @if (auth()->user()->role === 'dokter')
                                <a href="{{ route('doctor.search') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-primary hover:bg-white rounded-lg transition-colors duration-200">
                                    <div class="w-6 h-6 bg-green-100 rounded-md flex items-center justify-center mr-3">
                                        <i class="fas fa-plus-circle text-green-600 text-xs"></i>
                                    </div>
                                    Cari Sekarang
                                </a>
                            @else
                                <a href="{{ route('prediction.form') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-primary hover:bg-white rounded-lg transition-colors duration-200">
                                    <div class="w-6 h-6 bg-green-100 rounded-md flex items-center justify-center mr-3">
                                        <i class="fas fa-play-circle text-green-600 text-xs"></i>
                                    </div>
                                    Mulai Deteksi Dini
                                </a>
                                <a href="{{ route('prediction.history') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-primary hover:bg-white rounded-lg transition-colors duration-200">
                                    <div class="w-6 h-6 bg-blue-100 rounded-md flex items-center justify-center mr-3">
                                        <i class="fas fa-history text-blue-600 text-xs"></i>
                                    </div>
                                    Riwayat Deteksi
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-search mr-3 w-5 text-purple-500"></i>
                        <span class="flex-1">Deteksi Sekarang</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-600 rounded text-xs font-medium">Login</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile Auth/User Section -->
            <div class="border-t border-gray-200 mt-6 pt-6">
                @guest
                    <div class="space-y-3">
                        <a href="{{ route('user.register') }}"
                            class="flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-primary border-2 border-primary bg-transparent hover:bg-primary hover:text-white rounded-lg transition-all duration-200">
                            <i class="fas fa-user-plus mr-2"></i>
                            Register
                        </a>
                        <a href="{{ route('login') }}"
                            class="flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg transition-all duration-200 shadow-lg shadow-primary/25">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        <!-- User Info Card -->
                        <div
                            class="flex items-center space-x-3 p-4 bg-gradient-to-r {{ auth()->user()->role === 'dokter' ? 'from-blue-50 to-indigo-50' : 'from-pink-50 to-purple-50' }} rounded-xl">
                            <div
                                class="w-12 h-12 {{ auth()->user()->role === 'dokter' ? 'bg-blue-500' : 'bg-primary' }} rounded-xl flex items-center justify-center shadow-lg">
                                <i
                                    class="fas {{ auth()->user()->role === 'dokter' ? 'fa-user-md' : 'fa-user' }} text-white"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-600 capitalize">{{ auth()->user()->role }}</p>
                            </div>
                        </div>

                        <!-- User Menu Items -->
                        <div class="space-y-2">
                            <a href="{{ route('user.profile') }}"
                                class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                <i class="fas fa-user-cog mr-3 w-5"></i>
                                Profile Settings
                            </a>

                            @if (auth()->user()->role === 'dokter')
                                <a href="{{ route('doctor.search') }}"
                                    class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-chart-bar mr-3 w-5"></i>
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('prediction.history') }}"
                                    class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:text-primary hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-history mr-3 w-5"></i>
                                    My History
                                </a>
                            @endif

                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- CSS PERBAIKAN UNTUK NAVBAR - SIMPLIFIED -->
<style>
    /* Navbar positioning fix - CRITICAL */
    .navbar-fixed {
        position: sticky !important;
        top: 0 !important;
        z-index: 50 !important;
        width: 100% !important;
    }

    /* Dropdown sizing consistency */
    .group .absolute {
        width: 16rem !important;
        /* w-64 = 256px */
    }

    /* Responsive dropdown positioning */
    @media (max-width: 1280px) {
        .group .absolute {
            left: -50% !important;
        }

        .group\/sadari .absolute {
            left: -100% !important;
            margin-left: -0.5rem !important;
        }
    }

    @media (max-width: 1024px) {
        .group .absolute {
            left: -75% !important;
        }
    }

    /* Mobile menu fixes */
    #mobile-menu {
        position: fixed !important;
        top: 0 !important;
        right: 0 !important;
        height: 100vh !important;
        z-index: 60 !important;
    }

    #mobile-overlay {
        position: fixed !important;
        z-index: 55 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu functionality
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const closeMenu = document.getElementById('close-menu');

        // Hamburger animation elements
        const hamburgerTop = document.getElementById('hamburger-top');
        const hamburgerMiddle = document.getElementById('hamburger-middle');
        const hamburgerBottom = document.getElementById('hamburger-bottom');

        let isMenuOpen = false;

        function openMenu() {
            isMenuOpen = true;
            mobileMenu.style.transform = 'translateX(0)';
            mobileOverlay.style.opacity = '1';
            mobileOverlay.style.visibility = 'visible';
            document.body.style.overflow = 'hidden';

            // Animate hamburger to X
            hamburgerTop.setAttribute('d', 'M6 18L18 6');
            hamburgerMiddle.style.opacity = '0';
            hamburgerBottom.setAttribute('d', 'M6 6L18 18');
        }

        function closeMenuFunc() {
            isMenuOpen = false;
            mobileMenu.style.transform = 'translateX(100%)';
            mobileOverlay.style.opacity = '0';
            mobileOverlay.style.visibility = 'hidden';
            document.body.style.overflow = '';

            // Animate X back to hamburger
            hamburgerTop.setAttribute('d', 'M4 6h16');
            hamburgerMiddle.style.opacity = '1';
            hamburgerBottom.setAttribute('d', 'M4 18h16');
        }

        // Event listeners
        if (hamburger) {
            hamburger.addEventListener('click', function(e) {
                e.preventDefault();
                if (isMenuOpen) {
                    closeMenuFunc();
                } else {
                    openMenu();
                }
            });
        }

        if (closeMenu) {
            closeMenu.addEventListener('click', closeMenuFunc);
        }

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', closeMenuFunc);
        }

        // Mobile dropdown toggles
        function setupDropdown(buttonId, menuId) {
            const button = document.getElementById(buttonId);
            const menu = document.getElementById(menuId);
            const arrow = button ? button.querySelector('svg') : null;

            if (button && menu) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const isHidden = menu.classList.contains('hidden');

                    if (isHidden) {
                        menu.classList.remove('hidden');
                        if (arrow) arrow.style.transform = 'rotate(180deg)';
                    } else {
                        menu.classList.add('hidden');
                        if (arrow) arrow.style.transform = 'rotate(0deg)';
                    }
                });
            }
        }

        setupDropdown('mobile-selfcare-btn', 'mobile-selfcare-menu');
        setupDropdown('mobile-detection-btn', 'mobile-detection-menu');

        // Close menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024 && isMenuOpen) {
                closeMenuFunc();
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMenuFunc();
            }
        });
    });
</script>
