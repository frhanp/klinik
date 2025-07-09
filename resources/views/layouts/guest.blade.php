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
                <svg class="h-10 w-10 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
                Deliyana Dental Care
            </a>
            <p class="max-w-md">
                Memberikan layanan terbaik untuk senyum sehat Anda. Daftar atau masuk untuk mengatur janji temu Anda dengan mudah.
            </p>
            <img src="https://placehold.co/400x300/FFFFFF/6D28D9?text=Ilustrasi+Gigi" alt="Ilustrasi Klinik Gigi" class="mt-8 rounded-lg">
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