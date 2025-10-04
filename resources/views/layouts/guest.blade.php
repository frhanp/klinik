<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .bg-gradient-purple-auth {
            background: linear-gradient(135deg, #8B5CF6, #5B21B6);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
        <!-- Kolom Kiri (Branding) -->
        <div class="hidden md:flex flex-col justify-center items-center p-12 bg-gradient-purple-auth text-white text-center">
            <a href="/" class="flex items-center mb-6 text-3xl font-bold">
                {{-- <img src="{{ asset('images/logodeliyana.png') }}" alt="Logo Deliyana Dental Care"
                            class="h-10 w-10 mr-2"> --}}
                Deliyana Dental Care
            </a>
            <p class="max-w-md">
                Memberikan layanan terbaik untuk senyum sehat Anda. Daftar atau masuk untuk mengatur janji temu Anda dengan mudah.
            </p>
            <img src="{{ asset('images/deli.jpeg') }}" alt="Ilustrasi Klinik Gigi" class="mt-8 rounded-lg">
        </div>

        <!-- Kolom Kanan (Form) -->
        <div class="flex flex-col justify-center items-center p-6 sm:p-12 bg-slate-50">
            <div class="w-full sm:max-w-md">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>