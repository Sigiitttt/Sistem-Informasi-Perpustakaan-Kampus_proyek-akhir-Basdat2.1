<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Kampus Digital</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Menambahkan sedikit style untuk background hero */
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070&auto=format&fit=crop');
        }
    </style>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    {{-- Container utama --}}
    <div class="w-full">
        
        {{-- BAGIAN NAVIGASI --}}
        <header x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm shadow-md">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        <a href="/" class="flex items-center gap-2">
                            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 22H3V20H21V22ZM21 18H3C2.44772 18 2 17.5523 2 17V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V17C22 17.5523 21.5523 18 21 18ZM20 5H4V16H20V5ZM18 7H6V9H18V7ZM18 10H6V12H18V10Z"></path></svg>
                            Mari<span class="text-blue-600">Membaca</span>
                        </a>
                    </div>
                    
                    {{-- Navigasi untuk Desktop --}}
                    <nav class="hidden md:flex items-center gap-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-white bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded-lg transition">Register</a>
                                @endif
                            @endauth
                        @endif
                    </nav>

                    {{-- Tombol Hamburger untuk Mobile --}}
                    <div class="md:hidden">
                        <button @click="open = !open" class="text-gray-900 dark:text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        </button>
                    </div>
                </div>

                {{-- Menu Mobile --}}
                <div x-show="open" @click.away="open = false" class="md:hidden mt-4 flex flex-col items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block w-full text-center py-2 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center py-2 font-semibold hover:text-blue-600 dark:hover:text-blue-400 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block w-full text-center text-white bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded-lg transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        {{-- BAGIAN HERO --}}
        <section class="hero-bg bg-cover bg-center pt-32 pb-20 text-white text-center">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-down">Gerbang Menuju Dunia Pengetahuan</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto animate-fade-in-up">
                    Jelajahi ribuan koleksi buku, pinjam dengan mudah, dan perluas wawasan Anda bersama kami.
                </p>
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white font-bold py-3 px-8 rounded-full text-lg transition transform hover:scale-105">
                    Mulai Jelajahi
                </a>
            </div>
        </section>

        {{-- BAGIAN KOLEKSI POPULER --}}
        <section class="py-20 bg-gray-100 dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-10">Koleksi Populer</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    {{-- Buku 1 (Placeholder) --}}
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition">
                        <img src="https://covers.openlibrary.org/b/id/8264783-L.jpg" alt="Atomic Habits" class="mx-auto h-56 rounded-md mb-4">
                        <h3 class="font-bold">Atomic Habits</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">James Clear</p>
                    </div>
                    {{-- Buku 2 (Placeholder) --}}
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition">
                        <img src="https://covers.openlibrary.org/b/id/10250099-L.jpg" alt="Filosofi Teras" class="mx-auto h-56 rounded-md mb-4">
                        <h3 class="font-bold">Filosofi Teras</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Henry Manampiring</p>
                    </div>
                    {{-- Buku 3 (Placeholder) --}}
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition">
                        <img src="https://covers.openlibrary.org/b/id/12648866-L.jpg" alt="Sapiens" class="mx-auto h-56 rounded-md mb-4">
                        <h3 class="font-bold">Sapiens</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Yuval Noah Harari</p>
                    </div>
                    {{-- Buku 4 (Placeholder) --}}
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition">
                        <img src="https://covers.openlibrary.org/b/id/14421635-L.jpg" alt="The Psychology of Money" class="mx-auto h-56 rounded-md mb-4">
                        <h3 class="font-bold">Psychology of Money</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Morgan Housel</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- BAGIAN CARA KERJA --}}
        <section class="py-20 bg-white dark:bg-gray-800">
             <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12">Cara Kerja Perpustakaan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                    {{-- Step 1 --}}
                    <div>
                        <div class="mx-auto mb-4 flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 dark:bg-blue-900/50">
                            <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 11.5C10.6193 11.5 9.5 10.3807 9.5 9C9.5 7.61929 10.6193 6.5 12 6.5C13.3807 6.5 14.5 7.61929 14.5 9C14.5 10.3807 13.3807 11.5 12 11.5ZM7.58042 16.5C7.87971 15.1764 9.02641 14.2 10.5 14.2H13.5C14.9736 14.2 16.1203 15.1764 16.4196 16.5H7.58042Z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Daftar & Cari</h3>
                        <p class="text-gray-600 dark:text-gray-400">Buat akun anggota dan temukan buku yang Anda inginkan dari koleksi kami.</p>
                    </div>
                    {{-- Step 2 --}}
                    <div>
                        <div class="mx-auto mb-4 flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 dark:bg-blue-900/50">
                             <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7ZM9 3V5H15V3H9ZM20 7H4V19H20V7Z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Pinjam Buku</h3>
                        <p class="text-gray-600 dark:text-gray-400">Lakukan peminjaman buku favorit Anda secara online melalui sistem kami.</p>
                    </div>
                    {{-- Step 3 --}}
                    <div>
                        <div class="mx-auto mb-4 flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 dark:bg-blue-900/50">
                             <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM11 12V7H13V12H18V14H13V16.5L9.63293 14.3164L8.36707 15.6836L12.5 19L16.6329 15.6836L15.3671 14.3164L13 15.9085V14H11V12Z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Kembalikan Tepat Waktu</h3>
                        <p class="text-gray-600 dark:text-gray-400">Nikmati waktu membaca Anda dan kembalikan buku sesuai tanggal jatuh tempo.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- BAGIAN FOOTER --}}
        <footer class="bg-gray-800 dark:bg-gray-900 text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} Perpustakaan Kita. Semua Hak Cipta Dilindungi.</p>
            </div>
        </footer>

    </div>
</body>
</html>