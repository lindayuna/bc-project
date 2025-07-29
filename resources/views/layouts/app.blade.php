<!-- filepath: d:\dev\breast-cancer-web\resources\views\layouts\app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>@yield('title', config('app.name'))</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="antialiased min-h-screen bg-gray-50">
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('partials.footer')

    @stack('scripts')
</body>

</html>