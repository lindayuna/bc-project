@extends('layouts.app')

@section('title', 'Form Deteksi Dini - Breast Cancer Prediction')

@section('content')
    <!-- Form Deteksi Section -->
    <section id="form-deteksi" class="pt-32 pb-12 bg-gradient-to-br from-blue-50 to-pink-50 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">

                <!-- Header with improved styling -->
                <div class="text-center mb-10">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full mb-6 shadow-lg">
                        <i class="fas fa-heartbeat text-2xl text-white"></i>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">
                        Deteksi Dini Kanker Payudara
                    </h1>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        "Skrining kanker payudara dengan dukungan teknologi AI berbasis algoritma Naive Bayes merupakan
                        solusi cerdas untuk mengenali risiko sejak awal secara cepat dan efisien, guna meningkatkan
                        kesadaran dan peluang penanganan lebih dini."
                    </p>
                </div>

                <!-- Menstrual Cycle Validation Form -->
                <div id="menstrualValidation" class="mb-8">
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                <i class="fas fa-calendar-alt text-xl text-pink-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Informasi Siklus Menstruasi</h3>
                            <p class="text-gray-600 text-sm">
                                Pemeriksaan payudara sendiri (SADARI) sebaiknya dilakukan setiap bulan, <span
                                    class="font-medium text-pink-600"> idealnya pada hari ke-7 hingga ke-10 setelah hari
                                    pertama menstruasi </span> , saat kondisi payudara dalam keadaan paling rileks dan tidak
                                nyeri.
                            </p>
                        </div>

                        <!-- Status Menstruasi Selection -->
                        <div class="max-w-lg mx-auto mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Status Menstruasi Anda <span class="text-red-500">*</span>
                            </label>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-4">
                                <div class="menstrual-status-option bg-white border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-pink-400 transition-all duration-200"
                                    data-status="active">
                                    <div class="text-center">
                                        <div
                                            class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-venus text-pink-600"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Masih Menstruasi</span>
                                        <p class="text-xs text-gray-500 mt-1">Siklus haid masih berlangsung</p>
                                    </div>
                                </div>

                                <div class="menstrual-status-option bg-white border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-purple-400 transition-all duration-200"
                                    data-status="menopause">
                                    <div class="text-center">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-user-check text-purple-600"></i>
                                        </div>
                                        <span class="font-medium text-gray-700">Sudah Menopause</span>
                                        <p class="text-xs text-gray-500 mt-1">Tidak haid > 12 bulan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form untuk yang masih menstruasi -->
                        <div id="activeMenstrualForm" class="max-w-md mx-auto space-y-4 hidden">
                            <div>
                                <label for="lastMenstruation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kapan tanggal hari pertama menstruasi terakhir Anda? <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="lastMenstruation"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200"
                                    max="<?php echo date('Y-m-d'); ?>">
                                <p class="text-xs text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-info-circle text-pink-400 mr-1"></i>
                                    Pilih tanggal hari pertama menstruasi terakhir
                                </p>
                            </div>

                            <button type="button" id="validateCycleBtn"
                                class="w-full py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-medium rounded-xl hover:from-pink-600 hover:to-purple-700 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed shadow-md">
                                <i class="fas fa-check mr-2"></i>
                                Validasi & Lanjutkan
                            </button>
                        </div>

                        <!-- Form untuk yang sudah menopause -->
                        <div id="menopauseForm" class="max-w-md mx-auto space-y-4 hidden">
                            <div class="bg-purple-50 border border-purple-200 rounded-xl p-4 mb-4">
                                <div class="flex items-start space-x-3">
                                    <div
                                        class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-info-circle text-purple-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-purple-800 mb-1">Informasi untuk Menopause</h4>
                                        <p class="text-sm text-purple-700">
                                            Pemeriksaan payudara sendiri (SADARI) tetap penting dilakukan secara rutin
                                            setiap bulan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="menopauseAge" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pada usia berapa Anda menopause? <span class="text-red-500">*</span>
                                </label>
                                <select id="menopauseAge"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200">
                                    <option value="">Pilih usia menopause</option>
                                    <?php for($age = 40; $age <= 65; $age++): ?>
                                    <option value="<?php echo $age; ?>"><?php echo $age; ?> tahun</option>
                                    <?php endfor; ?>
                                </select>
                                <p class="text-xs text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-info-circle text-purple-400 mr-1"></i>
                                    Rata-rata usia menopause adalah 45-55 tahun
                                </p>
                            </div>

                            <button type="button" id="proceedFromMenopauseBtn"
                                class="w-full py-3 bg-gradient-to-r from-purple-500 to-purple-600 text-white font-medium rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed shadow-md">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Lanjutkan ke Deteksi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Waiting Period Notice (hanya untuk yang masih menstruasi) -->
                <div id="waitingNotice" class="hidden mb-8">
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-yellow-200">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-6">
                                <i class="fas fa-clock text-2xl text-yellow-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Mohon Tunggu Sebentar</h3>
                            <p class="text-gray-600 mb-6">
                                Deteksi dini idealnya dilakukan pada <strong> hari ke-7 hingga ke-10</strong> setelah hari
                                pertama menstruasi
                            </p>

                            <div class="bg-yellow-50 rounded-xl p-4 mb-6 text-sm">
                                <div class="grid gap-2">
                                    <div><strong>Menstruasi Hari Pertama:</strong> <span
                                            id="displayLastMenstruation"></span>
                                    </div>
                                    <div><strong>Waktu Ideal:</strong> <span id="optimalDate"></span></div>
                                    <div><strong>Sisa Waktu:</strong> <span id="remainingDays"></span> hari</div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                <button type="button" id="changeDateBtn"
                                    class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-edit mr-2"></i>
                                    Ubah Tanggal
                                </button>
                                <a href="{{ route('prediction.history') }}"
                                    class="px-6 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors text-center">
                                    <i class="fas fa-history mr-2"></i>
                                    Lihat Riwayat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prediction Form (Initially Hidden) -->
                <div id="predictionForm" class="hidden">
                    <form action="{{ route('prediction.store') }}" method="POST" id="multiStepForm">
                        @csrf
                        <input type="hidden" name="faktor_risiko_list[]" value="" id="hiddenFaktorRisikoList">
                        <input type="hidden" name="last_menstruation" id="hiddenLastMenstruation">
                        <input type="hidden" name="menstrual_status" id="hiddenMenstrualStatus">
                        <input type="hidden" name="menopause_age" id="hiddenMenopauseAge">

                        <!-- Form Container -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                            <!-- Progress Header -->
                            <div class="bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-4">
                                <div class="flex items-center justify-between text-white">
                                    <h2 class="text-lg font-semibold">Formulir Deteksi Dini</h2>
                                    <div class="text-sm" id="stepCounter">Pertanyaan 1 dari 14</div>
                                </div>
                                <div class="w-full h-2 bg-white/20 rounded-full mt-3">
                                    <div id="progressBar" class="h-2 bg-white rounded-full transition-all duration-300"
                                        style="width: 7.14%"></div>
                                </div>
                            </div>

                            <!-- Question Container -->
                            <div class="p-6 md:p-8">

                                <!-- Step 1: Faktor Risiko -->
                                <div class="step active" id="step-1">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">1</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Apakah anda memiliki faktor risiko?
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Faktor risiko seperti riwayat keluarga, usia, atau kondisi medis tertentu
                                        </p>
                                        <button type="button" id="openRiskFactorModal"
                                            class="text-pink-600 hover:text-pink-800 text-sm font-medium underline">
                                            Pelajari selengkapnya →
                                        </button>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="faktor_risiko">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, saya memiliki</span>
                                            <input type="radio" name="faktor_risiko" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="faktor_risiko">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada</span>
                                            <input type="radio" name="faktor_risiko" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2: Benjolan di Payudara -->
                                <div class="step hidden" id="step-2">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">2</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Adanya benjolan pada payudara yang terasa abnormal berukuran kecil atau besar,
                                            keras atau lunak, dan dapat bergerak atau tetap pada tempatnya.
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Benjolan dapat berupa massa yang teraba atau perubahan tekstur
                                        </p>
                                        <button type="button" id="openbenjolanModal"
                                            class="text-pink-600 hover:text-pink-800 text-sm font-medium underline">
                                            Kenali benjolan lebih detail →
                                        </button>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="benjolan_di_payudara">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada benjolan</span>
                                            <input type="radio" name="benjolan_di_payudara" value="ya"
                                                class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="benjolan_di_payudara">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="benjolan_di_payudara" value="tidak"
                                                class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Kecepatan Tumbuh -->
                                <div class="step hidden" id="step-3">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">3</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Perubahan ukuran benjolan dengan atau tanpa disertai nyeri pada payudara.
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Perubahan ukuran benjolan dalam waktu tertentu, dengan atau tanpa rasa nyeri
                                        </p>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="kecepatan_tumbuh">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada perubahan ukuran</span>
                                            <input type="radio" name="kecepatan_tumbuh" value="ya"
                                                class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="kecepatan_tumbuh">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="kecepatan_tumbuh" value="tidak"
                                                class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 4: Nipple Discharge -->
                                <div class="step hidden" id="step-4">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">4</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Keluarnya cairan dari puting susu
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Keluarnya cairan bening, berwarna, atau berdarah dari puting
                                        </p>

                                        <!-- Gambar ilustrasi Nipple Discharge -->
                                        <div class="max-w-md mx-auto mb-6 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('img/nipple-discharge.jpg') }}"
                                                alt="Ilustrasi Nipple Discharge" class="w-full object-cover h-auto">
                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                Ilustrasi: Keluarnya cairan dari puting susu dapat menjadi gejala yang perlu
                                                diwaspadai
                                            </p>
                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                <strong> Sumber: HealthCentral</strong>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="nipple_discharge">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Cairan bening, berwarna, atau
                                                berdarah</span>
                                            <input type="radio" name="nipple_discharge" value="ya"
                                                class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="nipple_discharge">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak keluar cairan</span>
                                            <input type="radio" name="nipple_discharge" value="tidak"
                                                class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 5: Retraksi Putting Susu -->
                                <div class="step hidden" id="step-5">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">5</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Puting susu tertarik ke dalam
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Perubahan bentuk puting yang tertarik ke dalam secara tiba-tiba
                                        </p>
                                        <!-- Gambar ilustrasi Retraksi Putting Susu -->
                                        <div class="max-w-md mx-auto mb-6 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('img/Reaksi-Puting-Susu.PNG') }}"
                                                alt="Ilustrasi Reaksi Puting Susu" class="w-full object-cover h-auto">

                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                <a
                                                    href="https://www-healthline-com.translate.goog/health/nipple-retraction?_x_tr_sl=en&_x_tr_tl=id&_x_tr_hl=id&_x_tr_pto=imgs"><strong>
                                                        Sumber: healthline</strong></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="retraksi_putting_susu">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, tertarik ke dalam</span>
                                            <input type="radio" name="retraksi_putting_susu" value="ya"
                                                class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="retraksi_putting_susu">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="retraksi_putting_susu" value="tidak"
                                                class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 6: Krusta -->
                                <div class="step hidden" id="step-6">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">6</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Adanya kerak atau kulit kering di sekitar puting susu
                                        </h3>
                                        <p class="text-gray-600 mb-4">krusta merupakan pembentukan kerak atau kulit kering
                                            di
                                            sekitar puting susu.
                                        </p>
                                        <!-- Gambar ilustrasi Krusta -->
                                        <div class="max-w-md mx-auto mb-6 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('img/Krusta.jpg') }}" alt="Ilustrasi Krusta"
                                                class="w-full object-cover h-auto">

                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                <a
                                                    href="https://medicastore.com/penyakit/866/penyakit-paget-pada-payudara"><strong>
                                                        Sumber: medicastore</strong></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="krusta">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada kerak atau kulit kering</span>
                                            <input type="radio" name="krusta" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="krusta">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="krusta" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 7: Dimpling -->
                                <div class="step hidden" id="step-7">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">7</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Terbentuknya lekukan pada kulit seperti kulit jeruk yang dikupas
                                        </h3>
                                        <p class="text-gray-600 mb-4">Dimpling merupakan kondisi terbentuknya lekukan pada
                                            kulit
                                            seperti kulit jeruk yang ndikupas.
                                        </p>
                                        <!-- Gambar ilustrasi Dimpling -->
                                        <div class="max-w-md mx-auto mb-6 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('img/dimpling.jpeg') }}" alt="Ilustrasi Dimpling"
                                                class="w-full object-cover h-auto">

                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                <a
                                                    href="https://www.healthcentral.com/condition/breast-cancer/pictures-of-inflammatory-breast-cancer-rash"><strong>
                                                        Sumber: HealthCentral</strong></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="dimpling">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada lekukan </span>
                                            <input type="radio" name="dimpling" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="dimpling">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="dimpling" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 8: Peau d'Orange -->
                                <div class="step hidden" id="step-8">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">8</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Kulit sekitar benjolan menjadi berpori-pori seperti kulit jeruk.
                                        </h3>
                                        <p class="text-gray-600 mb-4">peau d’orage merupakan kondisi kulit di sekitar
                                            benjolan
                                            menjadi berpori-pori seperti kulit jeruk.</p>

                                        <!-- Gambar ilustrasi Peau d'Orange -->
                                        <div class="max-w-md mx-auto mb-6 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('img/Peau-d-Orange.png') }}" alt="Ilustrasi Peau-d-Orange"
                                                class="w-full object-cover h-auto">

                                            <p class="text-xs text-gray-500 italic p-2 bg-gray-50">
                                                <a href="https://my.clevelandclinic.org/health/symptoms/breast-dimpling"><strong>
                                                        Sumber: Cleveland Clinic</strong></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="peau_dorange">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, kulit terasa berpori-pori</span>
                                            <input type="radio" name="peau_dorange" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="peau_dorange">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="peau_dorange" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 9: Ulserasi -->
                                <div class="step hidden" id="step-9">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">9</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Terbentuknya luka terbuka pada kulit sekitar puting susu.
                                        </h3>
                                        <p class="text-gray-600 mb-4">Ulserasi merupakan kondisi terbentuknya luka terbuka
                                            pada
                                            kulit payudara. Bisa saja mengeluarkan darah atau cairan, dan terasa nyeri.</p>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="ulserasi">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada terbentuk luka</span>
                                            <input type="radio" name="ulserasi" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="ulserasi">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="ulserasi" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 10: Venektasi -->
                                <div class="step hidden" id="step-10">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">10</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Pembuluh darah di bawah kulit menjadi lebih terlihat
                                        </h3>
                                        <p class="text-gray-600 mb-4">venektasi merupakan kondisi pembuluh darah di bawah
                                            kulit
                                            menjadi lebih terlihat.</p>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="venektasi">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, lebih terlihat</span>
                                            <input type="radio" name="venektasi" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="venektasi">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="venektasi" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 11: Benjolan Ketiak -->
                                <div class="step hidden" id="step-11">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">11</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Adanya benjolan yang terasa di ketiak
                                        </h3>
                                        <p class="text-gray-600 mb-4">Adanya benjolan pada ketiak merupakan kondisi
                                            terabanya massa
                                            atau benjolan yang terasa akibat kelenjar getah bening yang membesar. Edema
                                            lengan
                                            merupakan kondisi adanya pembengkakan pada lengan yang disebabkan oleh
                                            penumpukan
                                            cairan.
                                        </p>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="benjolan_ketiak">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, ada benjolan</span>
                                            <input type="radio" name="benjolan_ketiak" value="ya"
                                                class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="benjolan_ketiak">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="benjolan_ketiak" value="tidak"
                                                class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 12: Edema Lengan -->
                                <div class="step hidden" id="step-12">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">12</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Pembengkakan pada lengan yang terasa berat, kaku, dan nyeri pada sisi yang sama
                                            dengan adanya benjolan di payudara.
                                        </h3>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="edema_lengan">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, bengkak terasa berat, kaku, dan
                                                nyeri</span>
                                            <input type="radio" name="edema_lengan" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="edema_lengan">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="edema_lengan" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 13: Nyeri Tulang -->
                                <div class="step hidden" id="step-13">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">13</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Rasa sakit pada tulang, terutama pada tulang belakang (vertebra) dan tulang paha
                                            (femur)
                                        </h3>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="nyeri_tulang">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, terasa nyeri</span>
                                            <input type="radio" name="nyeri_tulang" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="nyeri_tulang">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="nyeri_tulang" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 14: Sesak -->
                                <div class="step hidden" id="step-14">
                                    <div class="text-center mb-8">
                                        <div
                                            class="inline-flex items-center justify-center w-12 h-12 bg-pink-100 rounded-full mb-4">
                                            <span class="text-lg font-bold text-pink-600">14</span>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                            Sesak nafas yang muncul secara tiba-tiba atau terus-menerus, dapat disertai
                                            batuk kering, nyeri dada, kelelahan berlebih, atau penurunan berat badan
                                            terutama dirasakan sedang beristirahat atau melakukan aktivitas ringan.
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            Kesulitan bernapas tanpa sebab yang jelas
                                        </p>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="sesak">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, terasa sesak</span>
                                            <input type="radio" name="sesak" value="ya" class="hidden" />
                                        </div>
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-red-400 transition-all duration-200"
                                            data-value="tidak" data-name="sesak">
                                            <div
                                                class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-times text-red-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Tidak ada dirasakan</span>
                                            <input type="radio" name="sesak" value="tidak" class="hidden" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Navigation Footer -->
                            <div class="bg-gray-50 px-6 py-4 flex items-center justify-between">
                                <button type="button" id="prevBtn"
                                    class="flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                                    disabled>
                                    <i class="fas fa-arrow-left mr-2 text-sm"></i>
                                    Sebelumnya
                                </button>

                                <div class="flex space-x-2">
                                    <!-- Step indicators -->
                                    @for ($i = 1; $i <= 14; $i++)
                                        <div class="w-2 h-2 rounded-full bg-gray-300 step-indicator"
                                            id="step-indicator-{{ $i }}"></div>
                                    @endfor
                                </div>

                                <button type="button" id="nextBtn"
                                    class="flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-medium rounded-lg hover:from-pink-600 hover:to-purple-700 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                                    Berikutnya
                                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </button>

                                <button type="submit" id="submitBtn"
                                    class="hidden flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg hover:from-green-600 hover:to-green-700 transition-all">
                                    <i class="fas fa-check mr-2 text-sm"></i>
                                    Kirim Hasil
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Simplified Risk Factor Modal -->
    <div id="riskFactorModal" class="fixed inset-0 bg-black/50 overflow-y-auto h-full w-full z-50 hidden">
        <div
            class="relative top-10 mx-auto p-4 border-0 w-11/12 md:w-2/3 lg:w-1/2 max-w-2xl shadow-xl rounded-2xl bg-white">
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Faktor Risiko Kanker Payudara</h3>
                <button type="button" id="closeRiskFactorModal"
                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-gray-600"></i>
                </button>
            </div>

            <div class="mt-4 space-y-4 max-h-80 overflow-y-auto">
                <div class="bg-pink-50 border border-pink-200 rounded-lg p-4">
                    <h4 class="font-medium text-pink-800 mb-2">Faktor Risiko Meliputi:</h4>
                    <ul class="text-sm text-pink-700 space-y-1">
                        <li>• Haid pertama pada usia dibawah 12 tahun</li>
                        <li>• Wanita yang tidak menikah atau tidak memiliki anak</li>
                        <li>• Melahirkan anak pertama pada usia > 30 tahun</li>
                        <li>• Tidak menyusui</li>
                        <li>• Kontrasepsi hormonal jangka panjang (>5 tahun)</li>
                        <li>• Menopause pada usia > 55 tahun</li>
                        <li>• Riwayat kanker dalam keluarga</li>
                    </ul>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-200 mt-4">
                <button type="button" onclick="document.getElementById('riskFactorModal').classList.add('hidden')"
                    class="px-4 py-2 bg-pink-500 text-white font-medium rounded-lg hover:bg-pink-600 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Simplified Benjolan Modal -->
    <div id="benjolanModal" class="fixed inset-0 bg-black/50 overflow-y-auto h-full w-full z-50 hidden">
        <div
            class="relative top-10 mx-auto p-4 border-0 w-11/12 md:w-2/3 lg:w-1/2 max-w-2xl shadow-xl rounded-2xl bg-white">
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Kenali Benjolan di Payudara</h3>
                <button type="button" id="closeBenjolanModal"
                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-gray-600"></i>
                </button>
            </div>

            <div class="mt-4 space-y-4 max-h-80 overflow-y-auto">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h4 class="font-medium text-blue-800 mb-2">Ukuran Benjolan:</h4>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• Biji jagung: ~1 cm</li>
                        <li>• Kelereng: 1-2 cm</li>
                        <li>• Bola bekel: 2-3 cm</li>
                        <li>• Bola pingpong: 4-6 cm</li>
                        <li>• Bola kasti: ~6,7 cm</li>
                    </ul>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-200 mt-4">
                <button type="button" onclick="document.getElementById('benjolanModal').classList.add('hidden')"
                    class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Simple Confirmation Modal Dialog -->
    <el-dialog>
        <dialog id="confirmationDialog" aria-labelledby="confirmation-title"
            class="fixed inset-0 m-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent p-0 backdrop:bg-transparent">
            <el-dialog-backdrop
                class="fixed inset-0 bg-gray-500/75 transition-opacity data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in"></el-dialog-backdrop>

            <div tabindex="0"
                class="flex min-h-full items-end justify-center p-4 text-center focus:outline focus:outline-0 sm:items-center sm:p-0">
                <el-dialog-panel
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-[closed]:translate-y-4 data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in sm:my-8 sm:w-full sm:max-w-lg data-[closed]:sm:translate-y-0 data-[closed]:sm:scale-95">

                    <!-- Content -->
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-gradient-to-r from-pink-100 to-purple-100 sm:mx-0 sm:size-10">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    class="size-6 text-pink-600">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 id="confirmation-title" class="text-base font-semibold text-gray-900">Periksa Kembali
                                    Jawaban Anda</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Pastikan semua jawaban yang Anda berikan sudah benar
                                        sebelum mengirim hasil deteksi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" id="submitConfirmBtn"
                            class="inline-flex w-full justify-center items-center rounded-md bg-gradient-to-r from-green-500 to-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:from-green-600 hover:to-green-700 sm:ml-3 sm:w-auto">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Jawaban
                        </button>
                        <button type="button" command="close" commandfor="confirmationDialog"
                            class="mt-3 inline-flex w-full justify-center items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            <i class="fas fa-eye mr-2"></i>
                            Tinjau Kembali
                        </button>
                    </div>

                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>

    <!-- Faktor Risiko Modal (Checkbox Version) -->
    <div id="faktorRisikoModal" class="fixed inset-0 bg-black/50 overflow-y-auto h-full w-full z-50 hidden">
        <div
            class="relative top-10 mx-auto p-4 border-0 w-11/12 md:w-2/3 lg:w-1/2 max-w-2xl shadow-xl rounded-2xl bg-white">
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Faktor Risiko Kanker Payudara</h3>
                <button type="button" class="modal-close text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-4 space-y-3">
                <div class="space-y-2">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]"
                            value="Haid pertama pada usia dibawah 12 tahun" class="accent-pink-500">
                        <span>Haid pertama pada usia dibawah 12 tahun</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]"
                            value="Wanita yang tidak menikah atau tidak memiliki anak" class="accent-pink-500">
                        <span>Wanita yang tidak menikah atau tidak memiliki anak</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]"
                            value="Melahirkan anak pertama pada usia > 30 tahun" class="accent-pink-500">
                        <span>Melahirkan anak pertama pada usia > 30 tahun</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]" value="Tidak menyusui"
                            class="accent-pink-500">
                        <span>Tidak menyusui</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]"
                            value="Kontrasepsi hormonal jangka panjang (>5 tahun)" class="accent-pink-500">
                        <span>Kontrasepsi hormonal jangka panjang (>5 tahun)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]" value="Menopause pada usia > 55 tahun"
                            class="accent-pink-500">
                        <span>Menopause pada usia > 55 tahun</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="faktor_risiko_list[]" value="Riwayat kanker dalam keluarga"
                            class="accent-pink-500">
                        <span>Riwayat kanker dalam keluarga</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-200 mt-4">
                <button type="button"
                    class="modal-confirm px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                    Simpan
                </button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Existing styles... */

        /* Menstrual status selection styles */
        .menstrual-status-option {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menstrual-status-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .menstrual-status-option.selected {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Form transition animations */
        #activeMenstrualForm,
        #menopauseForm {
            animation: slideIn 0.4s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Modal animation */
        #faktorRisikoModal {
            transition: opacity 0.3s ease-in-out;
        }

        #faktorRisikoModal:not(.hidden) {
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Checkbox styling */
        input[type="checkbox"].accent-pink-500 {
            accent-color: #ec4899;
        }

        /* Radio option active/selected styles */
        .radio-option.selected {
            border-color: #10B981;
            /* Warna border hijau untuk Ya */
            background-color: #F0FDF4;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .radio-option.selected[data-value="tidak"] {
            border-color: #EF4444;
            /* Warna border merah untuk Tidak */
            background-color: #FEF2F2;
        }

        .radio-option.selected .w-12 {
            transform: scale(1.1);
        }

        /* Hover effect */
        .radio-option:hover:not(.selected) {
            border-color: #D1D5DB;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px -1px rgb(0 0 0 / 0.1);
        }

        /* Transition untuk smooth effect */
        .radio-option {
            transition: all 0.2s ease-in-out;
        }

        .radio-option .w-12 {
            transition: transform 0.2s ease-in-out;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Tambahkan fungsi showModal dan hideModal
        function showModal(modalId) {
            document.getElementById(modalId)?.classList.remove('hidden');
        }

        function hideModal(modalId) {
            document.getElementById(modalId)?.classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced elements object
            const elements = {
                lastMenstruationInput: document.getElementById('lastMenstruation'),
                validateCycleBtn: document.getElementById('validateCycleBtn'),
                proceedFromMenopauseBtn: document.getElementById('proceedFromMenopauseBtn'),
                menstrualValidation: document.getElementById('menstrualValidation'),
                waitingNotice: document.getElementById('waitingNotice'),
                predictionForm: document.getElementById('predictionForm'),
                changeDateBtn: document.getElementById('changeDateBtn'),
                hiddenLastMenstruation: document.getElementById('hiddenLastMenstruation'),
                hiddenMenstrualStatus: document.getElementById('hiddenMenstrualStatus'),
                hiddenMenopauseAge: document.getElementById('hiddenMenopauseAge'),
                activeMenstrualForm: document.getElementById('activeMenstrualForm'),
                menopauseForm: document.getElementById('menopauseForm'),
                menopauseAge: document.getElementById('menopauseAge'),
                nextBtn: document.getElementById('nextBtn'),
                prevBtn: document.getElementById('prevBtn'),
                submitBtn: document.getElementById('submitBtn'),
                progressBar: document.getElementById('progressBar'),
                stepCounter: document.getElementById('stepCounter')
            };

            let currentStep = 1;
            const totalSteps = 14;
            let menstrualStatus = null; // 'active' or 'menopause'

            // Initialize menstrual status selection
            function initializeMenstrualStatusSelection() {
                console.log('Initializing menstrual status selection...');

                document.querySelectorAll('.menstrual-status-option').forEach(option => {
                    option.addEventListener('click', function() {
                        const status = this.dataset.status;
                        console.log('Status selected:', status);

                        // Clear all selections
                        document.querySelectorAll('.menstrual-status-option').forEach(opt => {
                            opt.classList.remove('selected');
                            opt.classList.remove('border-pink-500', 'border-purple-500',
                                'bg-pink-50', 'bg-purple-50');
                            opt.classList.add('border-gray-200');
                        });

                        // Select this option
                        this.classList.add('selected');
                        this.classList.remove('border-gray-200');

                        if (status === 'active') {
                            this.classList.add('border-pink-500', 'bg-pink-50');
                            showActiveMenstrualForm();
                        } else if (status === 'menopause') {
                            this.classList.add('border-purple-500', 'bg-purple-50');
                            showMenopauseForm();
                        }

                        menstrualStatus = status;
                        if (elements.hiddenMenstrualStatus) {
                            elements.hiddenMenstrualStatus.value = status;
                        }
                    });
                });
            }

            // Show active menstrual form
            function showActiveMenstrualForm() {
                console.log('Showing active menstrual form...');
                elements.activeMenstrualForm?.classList.remove('hidden');
                elements.menopauseForm?.classList.add('hidden');

                // Update button state
                updateValidateButton();
            }

            // Show menopause form
            function showMenopauseForm() {
                console.log('Showing menopause form...');
                elements.menopauseForm?.classList.remove('hidden');
                elements.activeMenstrualForm?.classList.add('hidden');

                // Update button state
                updateProceedButton();
            }

            // Update validate button state
            function updateValidateButton() {
                if (elements.validateCycleBtn && elements.lastMenstruationInput) {
                    elements.validateCycleBtn.disabled = !elements.lastMenstruationInput.value;
                }
            }

            // Update proceed button state
            function updateProceedButton() {
                if (elements.proceedFromMenopauseBtn && elements.menopauseAge) {
                    elements.proceedFromMenopauseBtn.disabled = !elements.menopauseAge.value;
                }
            }

            // Show prediction form (for both menstrual statuses)
            function showPredictionForm() {
                console.log('Showing prediction form...');
                elements.menstrualValidation?.classList.add('hidden');
                elements.waitingNotice?.classList.add('hidden');
                elements.predictionForm?.classList.remove('hidden');

                // Add menstrual status info to form header
                updateFormHeaderWithStatus();

                // Initialize form controls with delay to ensure DOM is ready
                setTimeout(() => {
                    initializeFormControls();
                    console.log('Form controls initialized');
                }, 100);
            }

            // Update form header with menstrual status info
            function updateFormHeaderWithStatus() {
                const headerTitle = document.querySelector('.bg-gradient-to-r.from-pink-500 h2');
                if (headerTitle && menstrualStatus) {
                    if (menstrualStatus === 'menopause') {
                        headerTitle.innerHTML =
                            'Formulir Deteksi Dini <span class="text-sm font-normal opacity-90">(Menopause)</span>';
                    } else {
                        headerTitle.innerHTML =
                            'Formulir Deteksi Dini <span class="text-sm font-normal opacity-90">(Aktif Menstruasi)</span>';
                    }
                }
            }

            // Date validation for active menstruation
            if (elements.validateCycleBtn) {
                elements.validateCycleBtn.addEventListener('click', function() {
                    const lastMenstruation = elements.lastMenstruationInput.value;
                    console.log('Validating cycle with date:', lastMenstruation);

                    if (!lastMenstruation) {
                        alert('Mohon pilih tanggal menstruasi terakhir Anda.');
                        return;
                    }

                    const lastMenstruationDate = new Date(lastMenstruation);
                    const today = new Date();
                    const daysDifference = Math.floor((today - lastMenstruationDate) / (1000 * 60 * 60 *
                        24));

                    elements.hiddenLastMenstruation.value = lastMenstruation;

                    if (daysDifference >= 7) {
                        showPredictionForm();
                    } else {
                        showWaitingNotice(lastMenstruationDate, daysDifference);
                    }
                });
            }

            // Proceed from menopause form
            if (elements.proceedFromMenopauseBtn) {
                elements.proceedFromMenopauseBtn.addEventListener('click', function() {
                    const menopauseAge = elements.menopauseAge.value;
                    console.log('Proceeding from menopause with age:', menopauseAge);

                    if (!menopauseAge) {
                        alert('Mohon pilih usia menopause Anda.');
                        return;
                    }

                    elements.hiddenMenopauseAge.value = menopauseAge;

                    // Set a default date for menopause users (today's date)
                    const today = new Date();
                    elements.hiddenLastMenstruation.value = today.toISOString().split('T')[0];

                    showPredictionForm();
                });
            }

            // Enable/disable validate button when date is selected
            if (elements.lastMenstruationInput) {
                elements.lastMenstruationInput.addEventListener('change', function() {
                    updateValidateButton();
                });
            }

            // Enable/disable proceed button when menopause age is selected
            if (elements.menopauseAge) {
                elements.menopauseAge.addEventListener('change', function() {
                    updateProceedButton();
                });
            }

            // Show waiting notice (only for active menstruation)
            function showWaitingNotice(lastMenstruationDate, daysPassed) {
                console.log('Showing waiting notice...');
                const optimalDate = new Date(lastMenstruationDate);
                optimalDate.setDate(optimalDate.getDate() + 7);
                const remainingDays = 7 - daysPassed;

                // Update display elements
                const displayLastMenstruation = document.getElementById('displayLastMenstruation');
                const displayOptimalDate = document.getElementById('optimalDate');
                const displayRemainingDays = document.getElementById('remainingDays');

                if (displayLastMenstruation) displayLastMenstruation.textContent = formatDate(lastMenstruationDate);
                if (displayOptimalDate) displayOptimalDate.textContent = formatDate(optimalDate);
                if (displayRemainingDays) displayRemainingDays.textContent = remainingDays;

                elements.menstrualValidation?.classList.add('hidden');
                elements.waitingNotice?.classList.remove('hidden');
            }

            // Change date button (back to menstrual validation)
            if (elements.changeDateBtn) {
                elements.changeDateBtn.addEventListener('click', function() {
                    console.log('Changing date - going back to validation...');
                    elements.waitingNotice?.classList.add('hidden');
                    elements.menstrualValidation?.classList.remove('hidden');

                    // Reset forms
                    if (elements.lastMenstruationInput) elements.lastMenstruationInput.value = '';
                    if (elements.menopauseAge) elements.menopauseAge.value = '';
                    elements.activeMenstrualForm?.classList.add('hidden');
                    elements.menopauseForm?.classList.add('hidden');

                    // Reset selections
                    document.querySelectorAll('.menstrual-status-option').forEach(opt => {
                        opt.classList.remove('selected', 'border-pink-500', 'border-purple-500',
                            'bg-pink-50', 'bg-purple-50');
                        opt.classList.add('border-gray-200');
                    });

                    menstrualStatus = null;
                    if (elements.hiddenMenstrualStatus) elements.hiddenMenstrualStatus.value = '';
                    if (elements.hiddenMenopauseAge) elements.hiddenMenopauseAge.value = '';
                });
            }

            // Initialize form controls for the multi-step form
            function initializeFormControls() {
                console.log('Initializing form controls...');
                attachRadioEventListeners();

                // Next button
                if (elements.nextBtn) {
                    // Remove existing listeners
                    const newNextBtn = elements.nextBtn.cloneNode(true);
                    elements.nextBtn.parentNode.replaceChild(newNextBtn, elements.nextBtn);
                    elements.nextBtn = newNextBtn;

                    elements.nextBtn.addEventListener('click', function() {
                        if (currentStep < totalSteps) {
                            goToStep(currentStep + 1);
                        }
                    });
                }

                // Previous button
                if (elements.prevBtn) {
                    // Remove existing listeners
                    const newPrevBtn = elements.prevBtn.cloneNode(true);
                    elements.prevBtn.parentNode.replaceChild(newPrevBtn, elements.prevBtn);
                    elements.prevBtn = newPrevBtn;

                    elements.prevBtn.addEventListener('click', function() {
                        if (currentStep > 1) {
                            goToStep(currentStep - 1);
                        }
                    });
                }

                // Form submission
                const form = document.getElementById('multiStepForm');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('Form submit intercepted');

                        // Simple validation
                        const requiredFields = [
                            'faktor_risiko', 'benjolan_di_payudara', 'kecepatan_tumbuh',
                            'nipple_discharge', 'retraksi_putting_susu', 'krusta',
                            'dimpling', 'peau_dorange', 'ulserasi', 'venektasi',
                            'benjolan_ketiak', 'edema_lengan', 'nyeri_tulang', 'sesak'
                        ];

                        let allAnswered = true;
                        requiredFields.forEach(field => {
                            if (!document.querySelector(`input[name="${field}"]:checked`)) {
                                allAnswered = false;
                                console.log('Missing field:', field);
                            }
                        });

                        if (!allAnswered) {
                            alert('Mohon jawab semua pertanyaan sebelum melanjutkan.');
                            return;
                        }

                        // Show confirmation modal instead of submitting directly
                        showConfirmationModal();
                    });
                }

                // Submit confirmation handler
                document.getElementById('submitConfirmBtn')?.addEventListener('click', function() {
                    console.log('Submit confirmed!');

                    // Close modal
                    const modal = document.getElementById('confirmationDialog');
                    if (modal) {
                        modal.close();
                    }

                    // Show loading state
                    if (elements.submitBtn) {
                        elements.submitBtn.innerHTML =
                            '<i class="fa fa-spinner fa-spin mr-2"></i> Memproses...';
                        elements.submitBtn.disabled = true;
                    }

                    // Submit the form
                    const form = document.getElementById('multiStepForm');
                    if (form) {
                        // Create a new form submission to bypass the preventDefault
                        const formData = new FormData(form);
                        const action = form.action;
                        const method = form.method;

                        // Create temporary form and submit
                        const tempForm = document.createElement('form');
                        tempForm.action = action;
                        tempForm.method = method;
                        tempForm.style.display = 'none';

                        // Copy all form data
                        for (let [key, value] of formData.entries()) {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = value;
                            tempForm.appendChild(input);
                        }

                        document.body.appendChild(tempForm);
                        tempForm.submit();
                    }
                });

                // Initialize first step
                goToStep(1);
            }

            // Go to specific step
            function goToStep(stepNumber) {
                console.log('Going to step:', stepNumber);

                // Hide current step
                const currentStepElement = document.getElementById(`step-${currentStep}`);
                if (currentStepElement) {
                    currentStepElement.classList.add('hidden');
                    currentStepElement.classList.remove('active');
                }

                // Show new step
                currentStep = stepNumber;
                const newStepElement = document.getElementById(`step-${currentStep}`);
                if (newStepElement) {
                    newStepElement.classList.remove('hidden');
                    newStepElement.classList.add('active');
                }

                // Update progress
                const progress = (currentStep / totalSteps) * 100;
                if (elements.progressBar) {
                    elements.progressBar.style.width = `${progress}%`;
                }

                if (elements.stepCounter) {


                    elements.stepCounter.textContent = `Pertanyaan ${currentStep} dari ${totalSteps}`;
                }

                // Update buttons






                if (elements.prevBtn) {
                    elements.prevBtn.disabled = currentStep === 1;
                }

                if (currentStep === totalSteps) {
                    elements.nextBtn?.classList.add('hidden');
                    elements.submitBtn?.classList.remove('hidden');
                } else {
                    elements.nextBtn?.classList.remove('hidden');
                    elements.submitBtn?.classList.add('hidden');
                }

                // Update step indicators
                updateStepIndicators();
                checkCurrentStepSelection();
            }

            // Update step indicators
            function updateStepIndicators() {
                for (let i = 1; i <= totalSteps; i++) {
                    const indicator = document.getElementById(`step-indicator-${i}`);
                    if (indicator) {
                        indicator.classList.remove('active', 'completed');
                        if (i < currentStep) {
                            indicator.classList.add('completed');
                        } else if (i === currentStep) {
                            indicator.classList.add('active');
                        }
                    }
                }
            }

            // Perbaiki fungsi checkCurrentStepSelection
            function checkCurrentStepSelection() {
                const currentStepElement = document.getElementById(`step-${currentStep}`);
                if (!currentStepElement) return;

                const selectedOption = currentStepElement.querySelector('input[type="radio"]:checked');

                // Enable/disable next button based on selection
                if (elements.nextBtn) {
                    elements.nextBtn.disabled = !selectedOption;
                    // Tambahkan style visual untuk menunjukkan status button
                    if (!selectedOption) {
                        elements.nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    } else {
                        elements.nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    }
                }

                // Update step indicator
                const indicator = document.getElementById(`step-indicator-${currentStep}`);
                if (indicator) {
                    if (selectedOption) {
                        indicator.classList.add('bg-green-500');
                    } else {
                        indicator.classList.remove('bg-green-500');
                    }
                }
            }

            // Perbaiki event listener radio
            function attachRadioEventListeners() {
                document.querySelectorAll('.radio-option').forEach(option => {
                    option.addEventListener('click', function() {
                        const name = this.dataset.name;
                        const value = this.dataset.value;

                        // Clear all selections for this group
                        document.querySelectorAll(`[data-name="${name}"]`).forEach(sibling => {
                            sibling.classList.remove('selected');
                        });

                        // Select this option
                        this.classList.add('selected');

                        // Check radio input
                        const radio = this.querySelector('input[type="radio"]');
                        if (radio) {
                            radio.checked = true;
                        }

                        // Special handling for faktor_risiko
                        if (name === 'faktor_risiko' && value === 'ya') {
                            document.getElementById('faktorRisikoModal').classList.remove('hidden');
                        }

                        // Enable next button explicitly
                        if (elements.nextBtn) {
                            elements.nextBtn.disabled = false;
                            elements.nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                        }

                        // Check current step selection
                        checkCurrentStepSelection();
                    });
                });
            }

            // Tambahkan function untuk menampilkan modal konfirmasi
            function showConfirmationModal() {
                const modal = document.getElementById('confirmationDialog');
                if (modal) {
                    modal.showModal();
                }
            }

            // Event listeners untuk modal
            const openRiskFactorBtn = document.getElementById('openRiskFactorModal');
            const closeRiskFactorBtn = document.getElementById('closeRiskFactorModal');

            if (openRiskFactorBtn) {
                openRiskFactorBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    showModal('riskFactorModal');
                });
            }

            if (closeRiskFactorBtn) {
                closeRiskFactorBtn.addEventListener('click', function() {
                    hideModal('riskFactorModal');
                });
            }

            // Tambahkan event listener untuk link "Pelajari selengkapnya"
            const pelajariLink = document.querySelector('button[id="openRiskFactorModal"]');
            if (pelajariLink) {
                pelajariLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    showModal('riskFactorModal');
                });
            }

            // Event listener untuk modal dan tombol-tombolnya
            const faktorRisikoModal = document.getElementById('faktorRisikoModal');
            const closeModalBtn = faktorRisikoModal?.querySelector('.modal-close');
            const simpanBtn = faktorRisikoModal?.querySelector('.modal-confirm');

            // Tombol Simpan di modal
            if (simpanBtn) {
                simpanBtn.addEventListener('click', function() {
                    const checkedBoxes = faktorRisikoModal.querySelectorAll(
                        'input[type="checkbox"]:checked');

                    if (checkedBoxes.length === 0) {
                        alert('Mohon pilih minimal satu faktor risiko');
                        return;
                    }

                    // Set radio button "Ya" sebagai checked
                    const radioYa = document.querySelector('input[name="faktor_risiko"][value="ya"]');
                    if (radioYa) {
                        radioYa.checked = true;
                        radioYa.closest('.radio-option').classList.add('selected');
                    }

                    // Sembunyikan modal
                    hideModal('faktorRisikoModal');

                    // Enable tombol next jika di step 1
                    if (currentStep === 1 && elements.nextBtn) {
                        elements.nextBtn.disabled = false;
                        elements.nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    }
                });
            }

            // Tombol close di modal
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', function() {
                    // Jika tidak ada checkbox yang dipilih, set radio ke "Tidak"
                    const checkedBoxes = faktorRisikoModal.querySelectorAll(
                        'input[type="checkbox"]:checked');
                    if (checkedBoxes.length === 0) {
                        const radioTidak = document.querySelector(
                            'input[name="faktor_risiko"][value="tidak"]');
                        if (radioTidak) {
                            radioTidak.checked = true;
                            radioTidak.closest('.radio-option').classList.add('selected');
                        }
                    }
                    hideModal('faktorRisikoModal');
                });
            }

            // Tambahkan fungsi untuk mengumpulkan data checklist
            function collectFaktorRisikoList() {
                const checkedBoxes = document.querySelectorAll('input[name="faktor_risiko_list[]"]:checked');
                const values = Array.from(checkedBoxes).map(cb => cb.value);
                return values;
            }

            // Modifikasi event submit
            document.getElementById('submitConfirmBtn')?.addEventListener('click', function() {
                const form = document.getElementById('multiStepForm');
                if (form) {
                    // Pastikan data faktor risiko terkumpul sebelum submit
                    const faktorRisikoValues = collectFaktorRisikoList();

                    // Hapus input hidden yang lama jika ada
                    form.querySelectorAll('input[name="faktor_risiko_list[]"]').forEach(el => el.remove());

                    // Tambahkan nilai baru
                    faktorRisikoValues.forEach(value => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'faktor_risiko_list[]';
                        input.value = value;
                        form.appendChild(input);
                    });

                    form.submit();
                }
            });

            // Initialize everything
            console.log('Initializing application...');
            initializeMenstrualStatusSelection();

            // Set initial button states
            updateValidateButton();
            updateProceedButton();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
@endpush
