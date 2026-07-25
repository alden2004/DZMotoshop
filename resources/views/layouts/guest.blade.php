<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#0d0d0d]">

        @php
            /*
                Halaman Produk, Tentang Kami, Kontak, dan Keranjang semuanya
                butuh login (middleware auth). Karena layout ini dipakai di
                halaman login MAUPUN register (tamu belum login), semua link
                navbar diarahkan ke halaman yang sedang aktif saat ini:
                - Kalau sedang di halaman Register -> semua link ke Register
                - Selain itu (termasuk saat di Login) -> semua link ke Login
            */
            $authTarget = request()->routeIs('register') ? route('register') : route('login');
        @endphp

        {{-- Navbar --}}
        <header class="border-b border-[#1f1f1f]">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                {{-- Logo --}}
                <a href="{{ url('/') }}" class="leading-tight">
                    <span class="text-xl font-extrabold"><span class="text-red-600">DZ</span><span class="text-white">Motoshop</span></span>
                    <p class="text-[10px] text-gray-400 tracking-wide -mt-1">BEST QUALITY FOR YOU RIDE</p>
                </a>

                {{-- Nav links --}}
                <nav class="hidden md:flex items-center gap-8 text-sm text-gray-300">
                    <a href="{{ $authTarget }}" class="hover:text-white">Home</a>
                    <a href="{{ $authTarget }}" class="hover:text-white">Produk</a>
                    <a href="{{ $authTarget }}" class="hover:text-white">Tentang Kami</a>
                    <a href="{{ $authTarget }}" class="hover:text-white">Kontak</a>
                </nav>

                {{-- Right icons --}}
                <div class="flex items-center gap-5 text-gray-200">

                    {{-- Keranjang --}}
                    <a href="{{ $authTarget }}" class="hover:text-white" title="Keranjang">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m-9-4v6a1 1 0 001 1h1m6-7v6a1 1 0 01-1 1h-1"/>
                        </svg>
                    </a>

                    <a href="{{ $authTarget }}" class="flex items-center gap-1 text-sm hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Masuk/Daftar
                    </a>
                </div>
            </div>
        </header>

        <div class="min-h-[calc(100vh-73px)] flex flex-col items-center justify-center px-4">
            {{ $slot }}
        </div>
    </body>
</html>