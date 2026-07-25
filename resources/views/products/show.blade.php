<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama_produk ?? 'Detail Produk' }} | DZ Motoshop</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #0a0a0a;
            color: #ffffff;
            min-height: 100vh;
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

        .navbar-right .cart-icon {
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
            font-weight: bold;
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

        /* CONTAINER */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px 20px 60px;
        }

        /* TOMBOL BACK */
        .btn-back-wrapper {
            margin-bottom: 16px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1a1a1a;
            color: #d1d5db;
            border: 1px solid #333333;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #262626;
            color: #ffffff;
            border-color: #444444;
        }

        /* BREADCRUMB */
        .breadcrumb {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 24px;
        }

        .breadcrumb a {
            color: #d1d5db;
        }

        .breadcrumb a:hover {
            color: #dc2626;
        }

        /* DETAIL LAYOUT */
        .product-detail-card {
            background: #141414;
            border: 1px solid #262626;
            border-radius: 16px;
            padding: 30px;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        /* IMAGE SECTION */
        .product-image-box {
            flex: 1;
            min-width: 300px;
            height: 380px;
            background: #1f1f1f;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #2c2c2c;
        }

        .product-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            color: #6b7280;
            font-size: 14px;
            font-weight: bold;
        }

        /* INFO SECTION */
        .product-info {
            flex: 1.2;
            min-width: 300px;
            display: flex;
            flex-direction: column;
        }

        .category-badge {
            display: inline-block;
            background: rgba(220, 38, 38, 0.15);
            color: #dc2626;
            border: 1px solid rgba(220, 38, 38, 0.3);
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
            width: fit-content;
            margin-bottom: 12px;
        }

        .product-title {
            font-size: 26px;
            font-weight: bold;
            line-height: 1.3;
            margin-bottom: 14px;
            color: #ffffff;
        }

        .product-price {
            font-size: 28px;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 16px;
        }

        .product-stock {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #262626;
        }

        .product-stock span {
            color: #22c55e;
            font-weight: bold;
        }

        .product-description {
            font-size: 14px;
            line-height: 1.6;
            color: #d1d5db;
            margin-bottom: 26px;
            flex-grow: 1;
        }

        .product-description h4 {
            color: #ffffff;
            font-size: 14px;
            margin-bottom: 8px;
        }

        /* ACTION SECTION */
        .action-area {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-cart {
            flex: 1;
            min-width: 140px;
            background: #1f1f1f;
            border: 1px solid #dc2626;
            color: #dc2626;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cart:hover {
            background: #dc2626;
            color: #ffffff;
        }

        .btn-buy {
            flex: 1;
            min-width: 140px;
            background: #dc2626;
            border: none;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-buy:hover {
            background: #b91c1c;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 12px 20px;
            }

            .navbar-menu {
                display: none;
            }

            .container {
                padding: 16px 15px 40px;
            }

            .product-detail-card {
                padding: 16px;
                gap: 20px;
            }

            .product-image-box {
                height: 260px;
            }

            .product-title {
                font-size: 20px;
            }

            .product-price {
                font-size: 22px;
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
            <a href="{{ url('/products') }}" class="active">Produk</a>
            <a href="{{ Route::has('about') ? route('about') : url('/about') }}">Tentang Kami</a>
            <a href="{{ Route::has('contact') ? route('contact') : url('/contact') }}">Kontak</a>
        </div>

        <div class="navbar-right">
            <a href="{{ Route::has('cart') ? route('cart') : url('/cart') }}" class="cart-icon">🛒</a>

            @auth
                <div class="user-menu" id="userMenuToggle">
                    <div class="avatar">👤</div>
                    <span>{{ Auth::user()->name }}</span>

                    <div class="user-dropdown" id="userDropdown">
                        <a href="{{ Route::has('profile.edit') ? route('profile.edit') : url('/profile') }}">👤 Profil Saya</a>
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

    {{-- CONTENT CONTAINER --}}
    <div class="container">

        {{-- TOMBOL KEMBALI --}}
        <div class="btn-back-wrapper">
            <a href="{{ url('/products') }}" class="btn-back">
                ⬅ Kembali ke Daftar Produk
            </a>
        </div>

        {{-- BREADCRUMB --}}
        <div class="breadcrumb">
            <a href="{{ url('/products') }}">Produk</a> &nbsp; / &nbsp; 
            <span>{{ $product->kategori ?? 'Detail' }}</span> &nbsp; / &nbsp; 
            <span style="color: #ffffff;">{{ $product->nama_produk ?? 'Detail Produk' }}</span>
        </div>

        {{-- DETAIL CARD --}}
        <div class="product-detail-card">

            {{-- FOTO PRODUK --}}
            <div class="product-image-box">
                @if(!empty($product->gambar))
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                @else
                    <div class="no-image">FOTO PRODUK TIDAK TERSEDIA</div>
                @endif
            </div>

            {{-- INFORMASI PRODUK --}}
            <div class="product-info">
                <div class="category-badge">{{ $product->kategori ?? 'Umum' }}</div>

                <h1 class="product-title">{{ $product->nama_produk ?? 'Nama Produk Tidak Tersedia' }}</h1>

                <div class="product-price">
                    Rp {{ number_format($product->harga ?? 0, 0, ',', '.') }}
                </div>

                <div class="product-stock">
                    Status Stok: <span>{{ ($product->stok ?? 0) > 0 ? 'Tersedia (' . $product->stok . ' item)' : 'Stok Habis' }}</span>
                </div>

                <div class="product-description">
                    <h4>Deskripsi Produk:</h4>
                    <p>{{ $product->deskripsi ?? 'Belum ada deskripsi lengkap untuk produk ini.' }}</p>
                </div>

                {{-- AKSI TAMBAH / BELI --}}
                <div class="action-area">
                    <div class="button-group">
                        {{-- Tombol Masuk Keranjang --}}
                        <form action="{{ Route::has('cart.add') ? route('cart.add') : url('/cart/add') }}" method="POST" style="flex: 1; display: flex;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-cart" style="width: 100%;">+ Keranjang</button>
                        </form>

                        {{-- Tombol Beli Sekarang (Diperbaiki ke POST dengan rute khusus direct checkout) --}}
                        <form action="{{ Route::has('checkout.buy-now') ? route('checkout.buy-now') : url('/checkout/buy-now') }}" method="POST" style="flex: 1; display: flex;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn-buy" style="width: 100%;">Beli Sekarang</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        // Toggle User Menu Dropdown
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

        // Load Header & Branding dari LocalStorage Admin Settings
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

            if (data.namaTokoUser) {
                renderLogo('navLogoUser', data.namaTokoUser);
            }

            if (data.bioTokoUser && document.getElementById('navTaglineUser')) {
                document.getElementById('navTaglineUser').textContent = data.bioTokoUser;
            }
        }

        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>