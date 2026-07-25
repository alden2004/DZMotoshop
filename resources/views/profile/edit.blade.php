<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Saya | DZ Motoshop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
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

        .navbar-menu {
            display: flex;
            gap: 24px;
            font-size: 14px;
        }

        .navbar-menu a {
            color: #d1d5db;
            transition: color 0.2s;
        }

        .navbar-menu a:hover {
            color: #ffffff;
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
            user-select: none;
        }

        .user-menu .avatar-nav {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            overflow: hidden;
        }

        .user-menu .avatar-nav img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

        .user-dropdown a {
            display: block;
            width: 100%;
            padding: 10px 14px;
            font-size: 13px;
            color: #d1d5db;
        }

        .user-dropdown a:hover {
            background: #262626;
            color: #ffffff;
        }

        /* PAGE CONTENT */
        .page-wrapper {
            padding: 30px 20px 60px;
            max-width: 750px;
            margin: 0 auto;
        }

        /* WA-STYLE PROFILE HEADER CARD */
        .wa-profile-header {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 16px;
            padding: 30px 20px;
            text-align: center;
            margin-bottom: 24px;
            position: relative;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .wa-avatar-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 16px auto;
        }

        .wa-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #262626;
            border: 3px solid #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.2);
        }

        .wa-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .wa-status-badge {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 16px;
            height: 16px;
            background: #22c55e;
            border: 3px solid #1b1b1b;
            border-radius: 50%;
        }

        .wa-profile-name {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .wa-profile-email {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .wa-profile-bio {
            font-size: 12px;
            color: #6b7280;
            font-style: italic;
        }

        .profile-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .profile-card {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 24px 28px;
        }

        /* CARD MENU PESANAN SAYA */
        .order-menu-card {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .order-menu-card:hover {
            border-color: #dc2626;
            background: #221515;
        }

        .order-menu-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .order-icon {
            width: 48px;
            height: 48px;
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid #dc2626;
            color: #dc2626;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .order-menu-info h3 {
            font-size: 16px;
            margin: 0 0 4px 0;
            color: #ffffff;
        }

        .order-menu-info p {
            font-size: 12px;
            color: #9ca3af;
            margin: 0;
        }

        .btn-view-orders {
            background: #dc2626;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            flex-shrink: 0;
        }

        .order-menu-card:hover .btn-view-orders {
            background: #b91c1c;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 12px 20px;
            }
            .navbar-menu {
                display: none;
            }
            .page-wrapper {
                padding: 20px 15px;
            }
            .order-menu-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .btn-view-orders {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <div class="navbar">
        <div class="navbar-left">
            <p class="logo"><span>DZ</span>Motoshop</p>
            <p class="tagline">BEST QUALITY FOR YOUR RIDE</p>
        </div>

        <div class="navbar-menu">
            <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}">Home</a>
            <a href="{{ url('/products') }}">Produk</a>
            <a href="{{ Route::has('about') ? route('about') : url('/about') }}">Tentang Kami</a>
            <a href="{{ Route::has('contact') ? route('contact') : url('/contact') }}">Kontak</a>
        </div>

        <div class="navbar-right">
            <a href="{{ Route::has('cart') ? route('cart') : url('/cart') }}" class="cart" title="Keranjang Belanja">🛒</a>

            <div class="user-menu" id="userMenuToggle">
                <div class="avatar-nav">
                    @if(!empty(Auth::user()->avatar))
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar">
                    @else
                        👤
                    @endif
                </div>
                <span>{{ Auth::user()->name ?? 'Pengguna' }}</span>

                <div class="user-dropdown" id="userDropdown">
                    <a href="{{ url('/dashboard') }}">← Kembali</a>
                </div>
            </div>
        </div>
    </div>

    {{-- PAGE CONTENT --}}
    <div class="page-wrapper">

        {{-- WHATSAPP-STYLE PROFILE HEADER --}}
        <div class="wa-profile-header">
            <div class="wa-avatar-container">
                <div class="wa-avatar">
                    @if(!empty(Auth::user()->avatar))
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Foto Profil">
                    @else
                        👤
                    @endif
                </div>
                <div class="wa-status-badge" title="Online"></div>
            </div>
            <div class="wa-profile-name">{{ Auth::user()->name ?? 'Pengguna DZ Motoshop' }}</div>
            <div class="wa-profile-email">{{ Auth::user()->email ?? '-' }}</div>
            <div class="wa-profile-bio">"Siap melengkapi kebutuhan berkendara terbaikmu bersama DZ Motoshop."</div>
        </div>

        <div class="profile-stack">

            {{-- 📦 LINK LANGSUNG KE HALAMAN PACKED --}}
            <a href="{{ Route::has('order.packed') ? route('order.packed') : url('/order/packed') }}" class="order-menu-card">
                <div class="order-menu-left">
                    <div class="order-icon">📦</div>
                    <div class="order-menu-info">
                        <h3>Pesanan Saya</h3>
                        <p>Lihat status pengemasan, rincian produk, & progress pengiriman</p>
                    </div>
                </div>
                <div class="btn-view-orders">
                    Lihat Pesanan &rarr;
                </div>
            </a>

            {{-- FORM INFORMASI PROFIL (Dilengkapi Upload Foto) --}}
            <div class="profile-card">
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- FORM UPDATE PASSWORD --}}
            <div class="profile-card">
                @include('profile.partials.update-password-form')
            </div>

            {{-- FORM HAPUS AKUN --}}
            <div class="profile-card">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

    <script>
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
    </script>

</body>

</html>