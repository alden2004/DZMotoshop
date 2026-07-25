<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang | DZ Motoshop</title>

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
            padding-bottom: 4px;
            transition: all 0.2s ease;
        }

        .navbar-menu a.active {
            color: #ffffff;
            border-bottom: 2px solid #dc2626;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            position: relative;
        }

        /* Ikon Keranjang dengan Garis Bawah Aksen Merah/Oranye */
        .navbar-right .cart-link {
            font-size: 18px;
            color: #ffffff;
            padding-bottom: 4px;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .navbar-right .cart-link.active {
            border-bottom: 2px solid #dc2626;
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
        .cart-container {
            max-width: 1050px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
            width: 100%;
        }

        /* TOMBOL BACK / KEMBALI */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #9ca3af;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            padding: 8px 14px;
            background: #141414;
            border: 1px solid #222222;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            color: #ffffff;
            border-color: #374151;
            background: #1a1a1a;
            transform: translateX(-3px);
        }

        .cart-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            border-bottom: 1px solid #1f1f1f;
            padding-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: #111111;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #1f1f1f;
        }

        .cart-table th {
            text-align: left;
            padding: 16px 20px;
            background: #161616;
            color: #9ca3af;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            border-bottom: 1px solid #222222;
        }

        .cart-table td {
            padding: 20px;
            border-bottom: 1px solid #1f1f1f;
            vertical-align: middle;
            font-size: 14px;
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .product-img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            background: #262626;
            object-fit: cover;
            border: 1px solid #262626;
        }

        .product-name {
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 4px;
            color: #ffffff;
        }

        .product-cat {
            font-size: 12px;
            color: #9ca3af;
        }

        /* QTY CONTROLLER (+ / -) */
        .qty-control {
            display: inline-flex;
            align-items: center;
            background: #181818;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 2px;
        }

        .btn-qty {
            background: #222222;
            color: #ffffff;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .btn-qty:hover {
            background: #dc2626;
        }

        .qty-number {
            padding: 0 14px;
            font-weight: bold;
            font-size: 14px;
            color: #ffffff;
        }

        /* TOMBOL HAPUS - OUTLINE MERAH TERANG & JELAS */
        .btn-delete {
            background: rgba(220, 38, 38, 0.08);
            color: #ef4444;
            border: 1px solid #dc2626;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: #ffffff;
            border-color: #dc2626;
            box-shadow: 0 0 10px rgba(220, 38, 38, 0.4);
        }

        /* RINGKASAN & CHECKOUT */
        .cart-summary {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .total-price span {
            color: #9ca3af;
            font-size: 13px;
            display: block;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .total-price h2 {
            color: #dc2626;
            font-size: 26px;
            font-weight: bold;
        }

        .btn-checkout {
            background: #dc2626;
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-checkout:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
        }

        .empty-cart {
            text-align: center;
            padding: 80px 20px;
            color: #9ca3af;
            background: #111111;
            border-radius: 12px;
            border: 1px solid #1f1f1f;
        }

        .empty-cart p {
            font-size: 16px;
            margin-bottom: 12px;
        }

        .empty-cart a {
            color: #dc2626;
            font-weight: bold;
            font-size: 15px;
        }

        .empty-cart a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .navbar-menu {
                display: none;
            }

            .cart-table th:nth-child(2),
            .cart-table td:nth-child(2) {
                display: none;
            }

            .cart-summary {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .btn-checkout {
                justify-content: center;
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

            {{-- Link Keranjang dengan garis bawah aktif --}}
            <a href="{{ Route::has('cart') ? route('cart') : url('/keranjang') }}" 
               class="cart-link {{ request()->is('keranjang') || request()->is('cart') ? 'active' : '' }}">
                🛒
            </a>

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

    {{-- MAIN KERANJANG --}}
    <div class="cart-container">
        
        {{-- TOMBOL KEMBALI KE PRODUK --}}
        <a href="{{ url('/products') }}" class="btn-back">
            ➔ Kembali ke Produk
        </a>

        <div class="cart-header">
            🛒 KERANJANG BELANJA
        </div>

        @if(!empty($cart) && count($cart) > 0)
            @php $subtotal = 0; @endphp

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>PRODUK</th>
                        <th>HARGA</th>
                        <th style="text-align: center;">JUMLAH</th>
                        <th>TOTAL</th>
                        <th style="text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        @php 
                            $itemTotal = $item['harga'] * $item['quantity'];
                            $subtotal += $itemTotal;
                        @endphp
                        <tr>
                            <td>
                                <div class="product-info">
                                    @if(!empty($item['gambar']))
                                        <img src="{{ asset('storage/' . $item['gambar']) }}" class="product-img" alt="{{ $item['nama_produk'] }}">
                                    @else
                                        <div class="product-img" style="display:flex;align-items:center;justify-content:center;font-size:10px;color:#6b7280;">NO IMAGE</div>
                                    @endif
                                    <div>
                                        <div class="product-name">{{ $item['nama_produk'] }}</div>
                                        <div class="product-cat">{{ $item['kategori'] ?? 'Aksesoris' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            
                            {{-- Pengontrol Jumlah (+ / -) --}}
                            <td style="text-align: center;">
                                <div class="qty-control">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="type" value="decrease">
                                        <button type="submit" class="btn-qty">-</button>
                                    </form>

                                    <span class="qty-number">{{ $item['quantity'] }}</span>

                                    <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="type" value="increase">
                                        <button type="submit" class="btn-qty">+</button>
                                    </form>
                                </div>
                            </td>

                            <td style="color: #dc2626; font-weight: bold;">Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                            
                            {{-- Tombol Hapus --}}
                            <td style="text-align: center;">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" title="Hapus Barang">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- RINGKASAN & CHECKOUT --}}
            <div class="cart-summary">
                <div class="total-price">
                    <span>Total Pembayaran</span>
                    <h2>Rp {{ number_format($subtotal, 0, ',', '.') }}</h2>
                </div>

                <a href="{{ url('/checkout') }}" class="btn-checkout">
                    Lanjut ke Pemesanan ➔
                </a>
            </div>

        @else

            <div class="empty-cart">
                <p>Keranjang belanja kamu masih kosong.</p>
                <a href="{{ url('/products') }}">Yuk mulai belanja →</a>
            </div>

        @endif
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

        // Load Settings
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

            if (data.namaTokoUser) renderLogo('navLogoUser', data.namaTokoUser);
            if (data.bioTokoUser && document.getElementById('navTaglineUser')) {
                document.getElementById('navTaglineUser').textContent = data.bioTokoUser;
            }
        }

        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>