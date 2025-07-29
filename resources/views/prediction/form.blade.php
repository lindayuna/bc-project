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
                        "Skrining kanker payudara dengan dukungan teknologi AI berbasis algoritma Naive Bayes merupakan solusi cerdas untuk mengenali risiko sejak awal secara cepat dan efisien, guna meningkatkan kesadaran dan peluang penanganan lebih dini."
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
                                    class="font-medium text-pink-600"> idealnya pada hari ke-7 hingga ke-10 setelah hari pertama menstruasi </span> , saat kondisi payudara dalam keadaan paling rileks dan tidak nyeri.
                            </p>
                        </div>

                        <div class="max-w-md mx-auto space-y-4">
                            <div>
                                <label for="lastMenstruation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kapan tanggal hari pertama menstruasi terakhir Anda? <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="lastMenstruation"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-200"
                                    max="<?php echo date('Y-m-d'); ?>" required>
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
                    </div>
                </div>

                <!-- Waiting Period Notice -->
                <div id="waitingNotice" class="hidden mb-8">
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-yellow-200">
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-6">
                                <i class="fas fa-clock text-2xl text-yellow-600"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Mohon Tunggu Sebentar</h3>
                            <p class="text-gray-600 mb-6">
                                Deteksi dini idealnya dilakukan pada <strong> hari ke-7 hingga ke-10</strong>  setelah hari pertama menstruasi
                            </p>

                            <div class="bg-yellow-50 rounded-xl p-4 mb-6 text-sm">
                                <div class="grid gap-2">
                                    <div><strong>Menstruasi Hari Pertama:</strong> <span id="displayLastMenstruation"></span>
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
                        <input type="hidden" name="last_menstruation" id="hiddenLastMenstruation">

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
                                            Adanya benjolan pada payudara yang terasa abnormal berukuran kecil atau besar, keras atau lunak, dan dapat bergerak atau tetap pada tempatnya.
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
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="nipple_discharge">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Cairan bening, berwarna, atau berdarah</span>
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
                                            Pembengkakan pada lengan yang terasa berat, kaku, dan nyeri pada sisi yang sama dengan adanya benjolan di payudara.
                                        </h3>
                                    </div>

                                    <div class="flex gap-4 justify-center max-w-md mx-auto">
                                        <div class="radio-option flex-1 bg-white border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-400 transition-all duration-200"
                                            data-value="ya" data-name="edema_lengan">
                                            <div
                                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">Ya, bengkak terasa berat, kaku, dan nyeri</span>
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
                                            Rasa sakit pada tulang, terutama pada tulang belakang (vertebra) dan tulang paha (femur)
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
                                            Sesak nafas yang muncul secara tiba-tiba atau terus-menerus, dapat disertai batuk kering, nyeri dada, kelelahan berlebih, atau penurunan berat badan terutama dirasakan sedang beristirahat atau melakukan aktivitas ringan.
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
                                    class="flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-medium rounded-lg hover:from-pink-600 hover:to-purple-700 disabled:opacity-50 transition-all">
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
@endsection

@push('styles')
    <style>
        /* Simplified and lightweight styles */
        .step {
            display: none;
        }

        .step.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        .radio-option.selected {
            border-color: #10b981;
            background-color: #ecfdf5;
            transform: scale(1.02);
        }

        .radio-option.selected .bg-green-100 {
            background-color: #10b981;
        }

        .radio-option.selected .text-green-600 {
            color: white;
        }

        .radio-option.unselected {
            opacity: 0.6;
            transform: scale(0.98);
        }

        .step-indicator.active {
            background-color: #10b981;
        }

        .step-indicator.completed {
            background-color: #6b7280;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive improvements */
        @media (max-width: 640px) {
            .radio-option {
                padding: 0.75rem;
            }

            .text-xl {
                font-size: 1.125rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simplified JavaScript with better performance
            const elements = {
                lastMenstruationInput: document.getElementById('lastMenstruation'),
                validateCycleBtn: document.getElementById('validateCycleBtn'),
                menstrualValidation: document.getElementById('menstrualValidation'),
                waitingNotice: document.getElementById('waitingNotice'),
                predictionForm: document.getElementById('predictionForm'),
                changeDateBtn: document.getElementById('changeDateBtn'),
                hiddenLastMenstruation: document.getElementById('hiddenLastMenstruation'),
                nextBtn: document.getElementById('nextBtn'),
                prevBtn: document.getElementById('prevBtn'),
                submitBtn: document.getElementById('submitBtn'),
                progressBar: document.getElementById('progressBar'),
                stepCounter: document.getElementById('stepCounter')
            };

            let currentStep = 1;
            const totalSteps = 14;

            // Initialize form controls
            function initializeFormControls() {
                attachRadioEventListeners();

                // Next button
                elements.nextBtn?.addEventListener('click', function() {
                    if (currentStep < totalSteps) {
                        goToStep(currentStep + 1);
                    }
                });

                // Previous button
                elements.prevBtn?.addEventListener('click', function() {
                    if (currentStep > 1) {
                        goToStep(currentStep - 1);
                    }
                });

                // Form submission
                document.getElementById('multiStepForm')?.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Simple validation
                    const requiredFields = [
                        'faktor_risiko', 'benjolan_di_payudara', 'kecepatan_tumbuh', 'nipple_discharge',
                        'retraksi_putting_susu', 'krusta', 'dimpling', 'peau_dorange', 'ulserasi',
                        'venektasi', 'benjolan_ketiak', 'edema_lengan', 'nyeri_tulang', 'sesak'
                    ];

                    let allAnswered = true;
                    requiredFields.forEach(field => {
                        if (!document.querySelector(`input[name="${field}"]:checked`)) {
                            allAnswered = false;
                        }
                    });

                    if (!allAnswered) {
                        alert('Mohon jawab semua pertanyaan sebelum melanjutkan.');
                        return;
                    }

                    elements.submitBtn.innerHTML =
                    '<i class="fa fa-spinner fa-spin mr-2"></i> Memproses...';
                    elements.submitBtn.disabled = true;
                    this.submit();
                });
            }

            // Go to specific step
            function goToStep(stepNumber) {
                // Hide current step
                document.getElementById(`step-${currentStep}`)?.classList.add('hidden');
                document.getElementById(`step-${currentStep}`)?.classList.remove('active');

                // Show new step
                currentStep = stepNumber;
                document.getElementById(`step-${currentStep}`)?.classList.remove('hidden');
                document.getElementById(`step-${currentStep}`)?.classList.add('active');

                // Update progress
                const progress = (currentStep / totalSteps) * 100;
                if (elements.progressBar) {
                    elements.progressBar.style.width = `${progress}%`;
                }

                if (elements.stepCounter) {
                    elements.stepCounter.textContent = `Pertanyaan ${currentStep} dari ${totalSteps}`;
                }

                // Update buttons
                elements.prevBtn.disabled = currentStep === 1;

                if (currentStep === totalSteps) {
                    elements.nextBtn.classList.add('hidden');
                    elements.submitBtn.classList.remove('hidden');
                } else {
                    elements.nextBtn.classList.remove('hidden');
                    elements.submitBtn.classList.add('hidden');
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

            // Attach radio event listeners
            function attachRadioEventListeners() {
                document.querySelectorAll('.radio-option').forEach(option => {
                    option.addEventListener('click', function() {
                        const name = this.dataset.name;
                        const value = this.dataset.value;

                        // Clear all selections for this group
                        document.querySelectorAll(`[data-name="${name}"]`).forEach(sibling => {
                            sibling.classList.remove('selected');
                            sibling.classList.add('unselected');
                        });

                        // Select this option
                        this.classList.remove('unselected');
                        this.classList.add('selected');

                        // Check radio input
                        const radio = this.querySelector('input[type="radio"]');
                        if (radio) {
                            radio.checked = true;
                        }

                        // Enable next button
                        elements.nextBtn.disabled = false;
                    });
                });
            }

            // Check current step selection
            function checkCurrentStepSelection() {
                const currentStepElement = document.getElementById(`step-${currentStep}`);
                const selectedOption = currentStepElement?.querySelector('.radio-option.selected');
                elements.nextBtn.disabled = !selectedOption;
            }

            // Modal functions
            function showModal(modalId) {
                document.getElementById(modalId)?.classList.remove('hidden');
            }

            function hideModal(modalId) {
                document.getElementById(modalId)?.classList.add('hidden');
            }

            // Event listeners for modals
            document.getElementById('openRiskFactorModal')?.addEventListener('click', (e) => {
                e.preventDefault();
                showModal('riskFactorModal');
            });

            document.getElementById('openbenjolanModal')?.addEventListener('click', (e) => {
                e.preventDefault();
                showModal('benjolanModal');
            });

            document.getElementById('closeRiskFactorModal')?.addEventListener('click', () => {
                hideModal('riskFactorModal');
            });

            document.getElementById('closeBenjolanModal')?.addEventListener('click', () => {
                hideModal('benjolanModal');
            });

            // Date validation
            elements.validateCycleBtn?.addEventListener('click', function() {
                const lastMenstruation = elements.lastMenstruationInput.value;

                if (!lastMenstruation) {
                    alert('Mohon pilih tanggal menstruasi terakhir Anda.');
                    return;
                }

                const lastMenstruationDate = new Date(lastMenstruation);
                const today = new Date();
                const daysDifference = Math.floor((today - lastMenstruationDate) / (1000 * 60 * 60 * 24));

                elements.hiddenLastMenstruation.value = lastMenstruation;

                if (daysDifference >= 7) {
                    showPredictionForm();
                } else {
                    showWaitingNotice(lastMenstruationDate, daysDifference);
                }
            });

            // Show prediction form
            function showPredictionForm() {
                elements.menstrualValidation?.classList.add('hidden');
                elements.predictionForm?.classList.remove('hidden');
                setTimeout(() => initializeFormControls(), 100);
            }

            // Show waiting notice
            function showWaitingNotice(lastMenstruationDate, daysPassed) {
                const optimalDate = new Date(lastMenstruationDate);
                optimalDate.setDate(optimalDate.getDate() +7);
                const remainingDays = 7 - daysPassed;

                // Update display elements
                document.getElementById('displayLastMenstruation').textContent = formatDate(lastMenstruationDate);
                document.getElementById('optimalDate').textContent = formatDate(optimalDate);
                document.getElementById('remainingDays').textContent = remainingDays;

                elements.menstrualValidation?.classList.add('hidden');
                elements.waitingNotice?.classList.remove('hidden');
            }

            // Change date button
            elements.changeDateBtn?.addEventListener('click', function() {
                elements.waitingNotice?.classList.add('hidden');
                elements.menstrualValidation?.classList.remove('hidden');
                elements.lastMenstruationInput.value = '';
                elements.lastMenstruationInput.focus();
            });

            // Format date function
            function formatDate(date) {
                return date.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }

            // Enable validate button when date is selected
            elements.lastMenstruationInput?.addEventListener('change', function() {
                elements.validateCycleBtn.disabled = !this.value;
            });
        });
    </script>
@endpush
