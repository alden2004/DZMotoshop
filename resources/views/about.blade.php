<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami | DZ Motoshop</title>

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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        /* MAIN CONTENT */
        .about-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 40px;
            flex: 1;
            width: 100%;
        }

        .subtitle {
            color: #dc2626;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .about-text h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-text h1 span {
            color: #dc2626;
        }

        .about-text p {
            color: #9ca3af;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* STATS & FEATURES GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .stat-card {
            background: #141414;
            border: 1px solid #222;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
        }

        .stat-card .icon {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .stat-card .number {
            font-size: 18px;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 4px;
        }

        .stat-card .label {
            font-size: 12px;
            color: #9ca3af;
        }

        /* BANNER RIGHT */
        .about-banner {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 380px;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 10%, rgba(0, 0, 0, 0.3) 100%), url('/images/hero-motor.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 30px;
            border: 1px solid #1f1f1f;
        }

        .banner-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .banner-logo span {
            color: #dc2626;
        }

        .banner-tagline {
            font-size: 10px;
            color: #9ca3af;
            letter-spacing: 1px;
        }

        @media (max-width: 900px) {
            .about-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 12px 20px;
            }

            .navbar-menu {
                display: none;
            }

            .about-container {
                padding: 0 20px;
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

        <div class="navbar-menu">
            <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}">Home</a>
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

    {{-- MAIN CONTENT --}}
    <div class="about-container">

        <p class="subtitle">/// Tentang Kami</p>

        <div class="about-grid">

            <div class="about-text">
                <h1 id="aboutTitleUser"><span>DZ</span> Motoshop</h1>

                <p id="aboutDescUser">
                    DZ Motoshop adalah toko online yang menyediakan berbagai aksesoris motor berkualitas dengan harga terbaik. Kami berkomitmen memberikan produk original, layanan terbaik, dan pengalaman belanja yang mudah, aman, dan terpercaya.
                </p>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon">🎁</div>
                        <div class="number">500+</div>
                        <div class="label">Produk</div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">👥</div>
                        <div class="number">200K+</div>
                        <div class="label">Pelanggan</div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">❤️</div>
                        <div class="number">99%</div>
                        <div class="label">Kepuasan</div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">✅</div>
                        <div class="label" style="font-weight: bold; color: #fff; margin-top: 4px;">Produk</div>
                        <div class="label">Original</div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">🛡️</div>
                        <div class="label" style="font-weight: bold; color: #fff; margin-top: 4px;">Transaksi</div>
                        <div class="label">Aman</div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">🎧</div>
                        <div class="label" style="font-weight: bold; color: #fff; margin-top: 4px;">Layanan</div>
                        <div class="label">24/7</div>
                    </div>
                </div>
            </div>

            <div class="about-banner">
                <p class="banner-logo" id="bannerLogoUser"><span>DZ</span>Motoshop</p>
                <p class="banner-tagline" id="bannerTaglineUser">BEST QUALITY FOR YOUR RIDE</p>
            </div>

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

        // --- LOAD DATA DARI LOCALSTORAGE ---
        const STORAGE_KEY = 'dz_motoshop_settings';

        function loadUserSettings() {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (!saved) return;

            const data = JSON.parse(saved);

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

            // 1. Navbar Logo & Tagline
            if (data.namaTokoUser) {
                renderLogo('navLogoUser', data.namaTokoUser);
                renderLogo('aboutTitleUser', data.namaTokoUser);
                renderLogo('bannerLogoUser', data.namaTokoUser);
            }

            if (data.bioTokoUser) {
                if (document.getElementById('navTaglineUser')) {
                    document.getElementById('navTaglineUser').textContent = data.bioTokoUser;
                }
                if (document.getElementById('bannerTaglineUser')) {
                    document.getElementById('bannerTaglineUser').textContent = data.bioTokoUser;
                }
                if (document.getElementById('aboutDescUser')) {
                    const nama = data.namaTokoUser || 'DZ Motoshop';
                    document.getElementById('aboutDescUser').textContent = 
                        `${nama} adalah toko online yang menyediakan berbagai aksesoris motor berkualitas dengan harga terbaik. ${data.bioTokoUser}. Kami berkomitmen memberikan produk original, layanan terbaik, dan pengalaman belanja yang mudah, aman, dan terpercaya.`;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>