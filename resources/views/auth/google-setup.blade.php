@extends('layouts.app')

@section('title', 'Setup Google OAuth')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="text-center mb-8">
                    <div class="mx-auto h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fab fa-google text-blue-600 text-xl"></i>
                    </div>
                    <h1 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Setup Google OAuth
                    </h1>
                    <p class="mt-2 text-gray-600">
                        Ikuti langkah-langkah berikut untuk mengaktifkan login dengan Google
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                        <div class="flex">
                            <i class="fas fa-info-circle text-blue-400 mt-0.5"></i>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">
                                    Google OAuth belum dikonfigurasi
                                </h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <p>Tombol "Login dengan Google" disembunyikan karena credentials Google OAuth belum
                                        diatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-md p-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">
                            <i class="fas fa-cogs text-gray-500 mr-2"></i>
                            Langkah Setup
                        </h2>

                        <ol class="list-decimal list-inside space-y-4 text-gray-700">
                            <li>
                                <strong>Buka Google Cloud Console</strong>
                                <p class="ml-6 text-sm text-gray-600">
                                    Kunjungi <a href="https://console.cloud.google.com/" target="_blank"
                                        class="text-blue-600 hover:text-blue-500">console.cloud.google.com</a>
                                </p>
                            </li>

                            <li>
                                <strong>Buat Project Baru</strong>
                                <p class="ml-6 text-sm text-gray-600">
                                    Klik "New Project" dan beri nama "Breast Cancer Detection"
                                </p>
                            </li>

                            <li>
                                <strong>Enable APIs</strong>
                                <p class="ml-6 text-sm text-gray-600">
                                    Di "APIs & Services" → "Library", enable "Google+ API"
                                </p>
                            </li>

                            <li>
                                <strong>Buat OAuth Credentials</strong>
                                <p class="ml-6 text-sm text-gray-600">
                                    Di "APIs & Services" → "Credentials" → "Create Credentials" → "OAuth client ID"
                                </p>
                            </li>

                            <li>
                                <strong>Konfigurasi OAuth</strong>
                                <div class="ml-6 text-sm text-gray-600">
                                    <p>Pilih "Web application" dan isi:</p>
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        <li><strong>Authorized JavaScript origins:</strong> <code
                                                class="bg-gray-100 px-1 rounded">http://127.0.0.1:8000</code></li>
                                        <li><strong>Authorized redirect URIs:</strong> <code
                                                class="bg-gray-100 px-1 rounded">http://127.0.0.1:8000/auth/google/callback</code>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <strong>Update .env File</strong>
                                <div class="ml-6 text-sm text-gray-600">
                                    <p>Copy Client ID dan Client Secret ke file <code
                                            class="bg-gray-100 px-1 rounded">.env</code>:</p>
                                    <pre class="mt-2 bg-gray-100 p-2 rounded text-xs overflow-x-auto">GOOGLE_CLIENT_ID=your-client-id-here
GOOGLE_CLIENT_SECRET=your-client-secret-here</pre>
                                </div>
                            </li>

                            <li>
                                <strong>Clear Config Cache</strong>
                                <p class="ml-6 text-sm text-gray-600">
                                    Jalankan: <code class="bg-gray-100 px-1 rounded">php artisan config:clear</code>
                                </p>
                            </li>
                        </ol>
                    </div>

                    <div class="bg-green-50 border border-green-200 rounded-md p-4">
                        <div class="flex">
                            <i class="fas fa-check-circle text-green-400 mt-0.5"></i>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">
                                    Setelah Setup Selesai
                                </h3>
                                <div class="mt-2 text-sm text-green-700">
                                    <p>Tombol "Login dengan Google" akan muncul di halaman login dan register.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('user.login') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
