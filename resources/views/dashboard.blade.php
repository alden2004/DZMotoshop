<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | DZ Motoshop</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #0a0a0a;
            color: #ffffff;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 40px;
            background: #0a0a0a;
            border-bottom: 1px solid #1f1f1f;
            flex-wrap: wrap;
            gap: 15px;
        }

        .navbar-left .logo {
            font-size: 22px;
            font-weight: bold;
            margin: 0;
        }

        .navbar-left .logo span {
            color: #dc2626;
        }

        .navbar-left .tagline {
            font-size: 10px;
            color: #9ca3af;
            letter-spacing: 1px;
            margin: 2px 0 0;
        }

        .navbar-search {
            flex: 1;
            max-width: 420px;
            display: flex;
            margin: 0 20px;
        }

        .navbar-search input {
            flex: 1;
            padding: 10px 14px;
            border: none;
            border-radius: 6px 0 0 6px;
            background: #1b1b1b;
            color: #fff;
            font-size: 13px;
            outline: none;
        }

        .navbar-search input::placeholder {
            color: #9ca3af;
        }

        .navbar-search button {
            background: #dc2626;
            border: none;
            color: #fff;
            padding: 0 16px;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
        }

        .navbar-menu {
            display: flex;
            gap: 24px;
            font-size: 14px;
        }

        .navbar-menu a {
            color: #d1d5db;
        }

        .navbar-menu a.active {
            color: #ffffff;
            border-bottom: 2px solid #dc2626;
            padding-bottom: 4px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            position: relative;
        }

        .navbar-right .cart {
            font-size: 18px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .user-menu .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        .user-dropdown {
            display: none;
            position: absolute;
            top: 36px;
            right: 0;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 8px;
            min-width: 160px;
            overflow: hidden;
            z-index: 10;
        }

        .user-dropdown.show {
            display: block;
        }

        .user-dropdown a,
        .user-dropdown button {
            display: block;
            width: 100%;
            padding: 10px 14px;
            font-size: 13px;
            color: #d1d5db;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        .user-dropdown a:hover,
        .user-dropdown button:hover {
            background: #262626;
        }

        /* HERO */
        .hero {
            position: relative;
            min-height: 420px;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.85) 20%, rgba(0, 0, 0, 0.2) 70%), url('/images/hero-motor.png');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 0 40px;
        }

        .hero-content {
            max-width: 550px;
        }

        .hero-content h1 {
            font-size: 42px;
            line-height: 1.2;
            margin: 0 0 15px;
        }

        .hero-content h1 span {
            color: #dc2626;
        }

        .hero-content p {
            color: #d1d5db;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .btn-belanja {
            display: inline-block;
            background: #dc2626;
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn-belanja:hover {
            background: #b91c1c;
        }

        /* PRODUCTS */
        .products-section {
            padding: 40px 40px 60px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            border-left: 4px solid #dc2626;
            padding-left: 10px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: #dc2626;
        }

        .product-card .product-image {
            width: 100%;
            height: 140px;
            background: #262626;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 12px;
            overflow: hidden;
        }

        .product-card .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 14px;
        }

        .product-info .product-name {
            font-size: 14px;
            margin: 0 0 6px;
            color: #fff;
            font-weight: 600;
        }

        .product-info .product-price {
            font-size: 14px;
            font-weight: bold;
            color: #dc2626;
            margin: 0;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .navbar-search {
                order: 3;
                width: 100%;
                max-width: 100%;
                margin: 10px 0 0;
            }

            .navbar-menu {
                display: none;
            }

            .hero-content h1 {
                font-size: 28px;
            }

            .hero {
                padding: 0 20px;
            }

            .products-section {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <div class="navbar">

        <div class="navbar-left">
            <p class="logo" id="navLogoUser"><span>DZ</span>Motoshop</p>
            <p class="tagline" id="navTaglineUser">BEST QUALITY FOR YOUR RIDE</p>
        </div>

        <form class="navbar-search" action="{{ url('/products') }}" method="GET">
            <input type="text" name="q" placeholder="Cari Aksesoris Motor...">
            <button type="submit">🔍</button>
        </form>

        <div class="navbar-menu">
            <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}" class="{{ request()->is('/') || request()->is('dashboard') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/products') }}" class="{{ request()->is('products*') ? 'active' : '' }}">Produk</a>
            <a href="{{ Route::has('about') ? route('about') : '#' }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ Route::has('contact') ? route('contact') : '#' }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        </div>

        <div class="navbar-right">

            <a href="{{ Route::has('cart') ? route('cart') : '#' }}" class="cart">🛒</a>

            @auth
                <div class="user-menu" id="userMenuToggle">
                    <div class="avatar">👤</div>
                    <span>{{ Auth::user()->name }}</span>

                    <div class="user-dropdown" id="userDropdown">
                        @if(Auth::user()->is_admin ?? false)
                            <a href="{{ url('/admin/dashboard') }}" style="color: #dc2626; font-weight: bold;">Panel Admin</a>
                        @endif
                        <a href="{{ Route::has('profile.edit') ? route('profile.edit') : '#' }}">👤 Profil Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">↩ Keluar</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}">👤 Masuk/Daftar</a>
            @endauth

        </div>

    </div>

    {{-- HERO --}}
    <div class="hero">
        <div class="hero-content">
            <h1>LENGKAPI MOTOR <span>KESAYANGANMU</span></h1>
            <p id="heroBioText">
                Temukan berbagai aksesoris motor berkualitas dengan harga
                terbaik hanya di DZMotoshop
            </p>
            <a href="{{ url('/products') }}" class="btn-belanja">🛍 Belanja Sekarang</a>
        </div>
    </div>

    {{-- PRODUCTS --}}
    <div class="products-section">

        <h2 class="section-title">Produk Terbaru</h2>

        <div class="products-grid">

            @forelse($produkTerbaru ?? [] as $produk)

                <a href="{{ url('/products/' . $produk->id) }}" class="product-card">
                    <div class="product-image">
                        @if($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
                        @else
                            🛠️
                        @endif
                    </div>
                    <div class="product-info">
                        <p class="product-name">{{ $produk->nama_produk }}</p>
                        <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                </a>

            @empty

                {{-- DATA FALLBACK / DUMMY JIKA DATABASE KOSONG --}}
                <div class="product-card">
                    <div class="product-image">🛠️</div>
                    <div class="product-info">
                        <p class="product-name">Shockbreaker Ohlins S36E</p>
                        <p class="product-price">Rp 1.450.000</p>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">🛠️</div>
                    <div class="product-info">
                        <p class="product-name">Kaliper Brembo 2pcs</p>
                        <p class="product-price">Rp 3.800.000</p>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">🛠️</div>
                    <div class="product-info">
                        <p class="product-name">Master Rem Accossato</p>
                        <p class="product-price">Rp 2.580.000</p>
                    </div>
                </div>

            @endforelse

        </div>

    </div>

    <script>
        // Toggle User Dropdown Menu
        const userMenuToggle = document.getElementById('userMenuToggle');
        const userDropdown = document.getElementById('userDropdown');

        if (userMenuToggle && userDropdown) {
            userMenuToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
            });

            document.addEventListener('click', function (e) {
                if (!userMenuToggle.contains(e.target)) {
                    userDropdown.classList.remove('show');
                }
            });
        }

        // --- BACA DATA PENGATURAN DARI LOCALSTORAGE ---
        const STORAGE_KEY = 'dz_motoshop_settings';

        function loadUserSettings() {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (!saved) return; // Jika belum ada data tersimpan, pakai teks bawaan

            const data = JSON.parse(saved);

            // Fungsi untuk mewarnai kata pertama logo dengan warna merah
            function renderLogo(elementId, text) {
                const el = document.getElementById(elementId);
                if (el && text) {
                    const parts = text.split(' ');
                    if (parts.length > 1) {
                        el.innerHTML = `<span>${parts[0]}</span> ${parts.slice(1).join(' ')}`;
                    } else {
                        el.innerHTML = `<span>${text.substring(0, 2)}</span>${text.substring(2)}`;
                    }
                }
            }

            // 1. Update Logo & Bio pada Navbar Dashboard
            if (data.namaTokoUser) {
                renderLogo('navLogoUser', data.namaTokoUser);
            }
            if (data.bioTokoUser && document.getElementById('navTaglineUser')) {
                document.getElementById('navTaglineUser').textContent = data.bioTokoUser;
            }

            // 2. Update Deskripsi Bio pada Hero Section Dashboard
            if (data.bioTokoUser && document.getElementById('heroBioText')) {
                document.getElementById('heroBioText').textContent = data.bioTokoUser;
            }
        }

        // Jalankan script saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>