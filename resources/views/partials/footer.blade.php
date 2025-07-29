<!-- filepath: d:\dev\breast-cancer-web\resources\views\partials\footer.blade.php -->
<footer class="bg-pink-950 text-white">
    <!-- Main Footer Content -->
    <div class="bg-pink-950 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Footer Header -->
            <div class="text-center mb-10 pb-8 border-b border-pink-800">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-lg">
                        <img src="{{ asset('img/logo.png') }}" alt="BreastCare Logo"/>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Breast Cancer Detection</h2>
                </div>
                <p class="text-pink-200 text-lg max-w-2xl mx-auto">
                    Sistem deteksi dini kanker payudara menggunakan teknologi AI untuk kesehatan yang lebih baik
                </p>
            </div>

            <!-- Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Navigation Links -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">
                        <i class="fas fa-sitemap text-pink-300 mr-2"></i>
                        Navigasi
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('welcome') }}" 
                               class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                <i class="fas fa-home text-pink-400 mr-2 w-4"></i>
                                Beranda
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ route('prediction.form') }}" 
                                   class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                    <i class="fas fa-microscope text-pink-400 mr-2 w-4"></i>
                                    Deteksi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('prediction.history') }}" 
                                   class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                    <i class="fas fa-history text-pink-400 mr-2 w-4"></i>
                                    Riwayat
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" 
                                   class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                    <i class="fas fa-sign-in-alt text-pink-400 mr-2 w-4"></i>
                                    Masuk
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.register') }}" 
                                   class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                    <i class="fas fa-user-plus text-pink-400 mr-2 w-4"></i>
                                    Daftar
                                </a>
                            </li>
                        @endauth
                        <li>
                            <a href="#about" 
                               class="text-pink-200 hover:text-white hover:translate-x-1 transition-all duration-300 flex items-center">
                                <i class="fas fa-info-circle text-pink-400 mr-2 w-4"></i>
                                Tentang
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">
                        <i class="fas fa-address-book text-pink-300 mr-2"></i>
                        Kontak
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-pink-200">
                            <i class="fas fa-envelope text-pink-400 mr-3 w-4"></i>
                            <span>linda@gmail.com</span>
                        </li>
                        <li class="flex items-center text-pink-200">
                            <i class="fas fa-phone text-pink-400 mr-3 w-4"></i>
                            <span>+62 xxx xxx xxx</span>
                        </li>
                        <li class="flex items-start text-pink-200">
                            <i class="fas fa-map-marker-alt text-pink-400 mr-3 w-4 mt-1"></i>
                            <span>Denpasar<br>Bali</span>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">
                        <i class="fas fa-share-alt text-pink-300 mr-2"></i>
                        Media Sosial
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-blue-400 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-pink-600 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-blue-700 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-linkedin-in text-white"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-red-600 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-youtube text-white"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-pink-800 rounded-full flex items-center justify-center hover:bg-green-600 hover:scale-110 transition-all duration-300">
                            <i class="fab fa-whatsapp text-white"></i>
                        </a>
                    </div>
                    <p class="text-pink-200 text-sm mt-4">
                        Ikuti kami untuk update terbaru tentang kesehatan payudara
                    </p>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">
                        <i class="fas fa-envelope-open text-pink-300 mr-2"></i>
                        Newsletter
                    </h3>
                    <div class="bg-pink-800 rounded-xl p-4 border border-pink-700">
                        <p class="text-pink-100 text-sm mb-3">
                            Dapatkan tips kesehatan dan update terbaru
                        </p>
                        <form class="space-y-3">
                            <div class="relative">
                                <input type="email" 
                                       placeholder="Email Anda" 
                                       class="w-full px-4 py-2 bg-white/10 border border-pink-600 rounded-lg text-white placeholder-pink-300 focus:outline-none focus:border-pink-400 focus:bg-white/20 transition-all duration-300">
                                <i class="fas fa-envelope absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-300"></i>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-pink-500 to-pink-600 text-white py-2 px-4 rounded-lg font-medium hover:from-pink-600 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Berlangganan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bg-pink-900 py-6 border-t border-pink-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Copyright -->
                <div class="text-center md:text-left">
                    <p class="text-pink-200 text-sm">
                        &copy; {{ date('Y') }} Breast Cancer Detection. 
                      
                    </p>
                    <p class="text-pink-300 text-xs mt-1">
                        <i class="fas fa-heart text-red-400 mx-1 animate-pulse"></i>
                        Dibuat dengan cinta untuk kesehatan yang lebih baik
                        <i class="fas fa-heart text-red-400 mx-1 animate-pulse"></i>
                    </p>
                </div>

              
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button onclick="scrollToTop()" 
            id="backToTop"
            class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-full shadow-lg hover:from-pink-600 hover:to-pink-700 transform hover:scale-110 transition-all duration-300 z-50 opacity-0 invisible">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Footer JavaScript -->
    <script>
        // Back to Top functionality
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/Hide Back to Top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.remove('opacity-100', 'visible');
                backToTop.classList.add('opacity-0', 'invisible');
            }
        });

        // Newsletter form handling
        document.querySelector('footer form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Terima kasih! Anda telah berlangganan newsletter kami.');
                this.querySelector('input[type="email"]').value = '';
            }
        });
    </script>
</footer>