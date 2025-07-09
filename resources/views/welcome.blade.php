<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deliyana Dental Care - Klinik Gigi Modern & Terpercaya</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inline Styles & Scripts -->
    <style>
        /* Tema Warna */
        .bg-gradient-purple { background: linear-gradient(90deg, #8B5CF6, #6D28D9); }
        .text-purple-accent { color: #6D28D9; }
        
        /* Efek Underline Navigasi */
        .nav-link-hover { position: relative; padding-bottom: 0.25rem; }
        .nav-link-hover::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8B5CF6;
            transition: width 0.3s ease-in-out;
        }
        .nav-link-hover:hover::after { width: 100%; }

        /* Efek Tombol Utama */
        .cta-button-hover:hover {
            background: linear-gradient(90deg, #A78BFA, #8B5CF6);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3), 0 6px 6px rgba(139, 92, 246, 0.25);
        }
        
        /* Animasi Fade-in */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-gray-800" x-data>
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <a href="#beranda" class="flex items-center">
                        <svg class="h-8 w-8 text-purple-accent mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                        <span class="text-xl font-bold text-gray-800">Deliyana Dental Care</span>
                    </a>
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="#layanan" class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Layanan</a>
                        <a href="#tentang" class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Tentang Kami</a>
                        <a href="#kontak" class="nav-link-hover text-gray-600 hover:text-purple-accent transition duration-300">Kontak</a>
                    </nav>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="hidden sm:block text-sm font-medium text-gray-600 hover:text-purple-accent transition duration-300">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">Daftar</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section id="beranda" class="min-h-screen flex flex-col justify-center bg-white fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 leading-tight">
                        Senyum Sehat & Percaya Diri <br class="hidden md:block"> Dimulai di <span class="text-purple-accent">Sini</span>.
                    </h1>
                    <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-600">
                        Deliyana Dental Care menyediakan layanan perawatan gigi terbaik dengan teknologi modern dan dokter berpengalaman untuk Anda dan keluarga.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('register') }}" class="cta-button-hover px-8 py-3 text-lg font-semibold text-white bg-gradient-purple rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
                            Buat Janji Temu Sekarang
                        </a>
                    </div>
                </div>
            </section>

            <!-- Layanan Section (Diperbarui) -->
            <section id="layanan" class="min-h-screen flex flex-col justify-center py-20 bg-slate-50 fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Layanan Holistik untuk Anda</h2>
                        <p class="mt-4 max-w-2xl mx-auto text-gray-600">Dari perawatan rutin hingga estetika, kami memiliki solusi lengkap untuk memastikan senyum Anda selalu dalam kondisi terbaik.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Service Card 1 -->
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 text-purple-accent">Perawatan Umum</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li>Pembersihan Karang Gigi</li>
                                <li>Penambalan Gigi</li>
                                <li>Pencabutan Gigi</li>
                                <li>Perawatan Saluran Akar</li>
                            </ul>
                        </div>
                        <!-- Service Card 2 -->
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 text-purple-accent">Gigi Tiruan</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li>Gigi Tiruan Lepasan</li>
                                <li>Crown & Bridge (Mahkota)</li>
                                <li>Implan Gigi</li>
                                <li>Veneer</li>
                            </ul>
                        </div>
                        <!-- Service Card 3 -->
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 text-purple-accent">Estetika Gigi</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li>Pemutihan (Bleaching)</li>
                                <li>Behel / Kawat Gigi</li>
                                <li>Smile Makeover</li>
                                <li>Dental SPA</li>
                            </ul>
                        </div>
                        <!-- Service Card 4 -->
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-purple-200 hover:-translate-y-2 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 text-purple-accent">Bedah Minor</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li>Odontektomi (Gigi Bungsu)</li>
                                <li>Frenectomy</li>
                                <li>Gingivektomi</li>
                                <li>Kuretase</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tentang Kami Section (Diperbarui) -->
            <section id="tentang" class="min-h-screen flex items-center bg-white py-20 fade-in">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                        <div class="order-2 md:order-1">
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Komitmen Kami untuk <span class="text-purple-accent">Senyum Terbaik Anda</span></h2>
                            <p class="text-gray-600 mb-6">Di Deliyana Dental Care, kami percaya bahwa setiap pasien berhak mendapatkan perawatan gigi yang tidak hanya berkualitas, tetapi juga nyaman dan personal. Kami menggabungkan keahlian, teknologi, dan keramahan untuk menciptakan pengalaman yang positif bagi Anda.</p>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4"><span class="text-purple-accent font-bold">1</span></div>
                                    <div>
                                        <h4 class="font-semibold">Dokter Berpengalaman</h4>
                                        <p class="text-gray-600">Tim kami terdiri dari para profesional yang berdedikasi dan terus mengikuti perkembangan ilmu kedokteran gigi.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4"><span class="text-purple-accent font-bold">2</span></div>
                                    <div>
                                        <h4 class="font-semibold">Fasilitas Modern</h4>
                                        <p class="text-gray-600">Menggunakan peralatan canggih untuk diagnosis yang presisi dan perawatan yang efektif serta minim rasa sakit.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center mr-4"><span class="text-purple-accent font-bold">3</span></div>
                                    <div>
                                        <h4 class="font-semibold">Lingkungan Nyaman</h4>
                                        <p class="text-gray-600">Kami mendesain klinik kami agar terasa hangat dan menenangkan, mengurangi kecemasan Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-1 md:order-2">
                            <img src="https://placehold.co/600x700/8B5CF6/FFFFFF?text=Klinik+Kami" alt="Interior Klinik Deliyana Dental Care" class="rounded-xl shadow-2xl w-full h-auto object-cover">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer id="kontak" class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-bold">Deliyana Dental Care</h3>
                        <p class="mt-2 text-gray-400">Perawatan gigi profesional untuk senyum sehat keluarga Anda.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Kontak Kami</h3>
                        <ul class="mt-2 space-y-2 text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Jl. Kesehatan Gigi No. 123, Kota Anda
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                (021) 123-4567
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Jam Buka</h3>
                        <ul class="mt-2 space-y-2 text-gray-400">
                            <li>Senin - Jumat: 09:00 - 20:00</li>
                            <li>Sabtu: 09:00 - 17:00</li>
                            <li>Minggu: Tutup</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Deliyana Dental Care. All Rights Reserved.
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.fade-in');
            
            // Initial fade-in for the first section
            setTimeout(() => {
                sections.forEach(section => {
                    // Check if the section is already in view on load
                    const rect = section.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom >= 0) {
                        section.classList.add('is-visible');
                    }
                });
            }, 100); // Small delay to ensure styles are applied

            // Fade-in on scroll
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.1 });

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>
</html>