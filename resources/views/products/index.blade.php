<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk | DZ Motoshop</title>

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

        /* HERO */
        .hero {
            position: relative;
            min-height: 320px;
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
            font-size: 36px;
            line-height: 1.2;
            margin: 0 0 12px;
        }

        .hero-content h1 span {
            color: #dc2626;
        }

        .hero-content p {
            color: #d1d5db;
            font-size: 14px;
            margin-bottom: 20px;
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

        /* PAGE LAYOUT */
        .page-wrapper {
            display: flex;
            gap: 25px;
            padding: 30px 40px 60px;
            align-items: flex-start;
        }

        /* SPONSOR SIDEBAR */
        .sponsor-sidebar {
            width: 200px;
            flex-shrink: 0;
            background: #141414;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 18px;
        }

        .sponsor-sidebar h3 {
            font-size: 13px;
            letter-spacing: 1px;
            color: #9ca3af;
            margin-bottom: 14px;
        }

        .sponsor-item {
            background: #1f1f1f;
            border-radius: 8px;
            padding: 14px 10px;
            text-align: center;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 0.5px;
        }

        .sponsor-item.brembo { color: #dc2626; }
        .sponsor-item.ohlins { color: #facc15; }
        .sponsor-item.rcb { color: #ef4444; }
        .sponsor-item.enkei { color: #ffffff; }
        .sponsor-item.accossato { color: #dc2626; }
        .sponsor-item.motul { color: #f97316; }
        .sponsor-item.wrx { color: #ffffff; font-size: 13px; }

        /* PRODUCT MAIN AREA */
        .product-main {
            flex: 1;
        }

        /* CATEGORY FILTER BAR */
        .filter-section {
            margin-bottom: 25px;
        }

        .category-pills {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .category-btn {
            background: #1b1b1b;
            border: 1px solid #262626;
            color: #d1d5db;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .category-btn:hover,
        .category-btn.active {
            background: #dc2626;
            color: #ffffff;
            border-color: #dc2626;
        }

        /* PRODUCT GRID */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #2c2c2c;
            border-radius: 12px;
            overflow: hidden;
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: #dc2626;
        }

        .image {
            height: 160px;
            background: #262626;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 13px;
            overflow: hidden;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content {
            padding: 16px;
        }

        .content h2 {
            font-size: 16px;
            margin-bottom: 6px;
        }

        .kategori {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .harga {
            color: #dc2626;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .stok {
            color: #cccccc;
            font-size: 12px;
            margin-bottom: 14px;
        }

        .button-group {
            display: flex;
            gap: 8px;
        }

        .detail {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            background: #303030;
            color: white;
            font-size: 13px;
        }

        .detail:hover {
            background: #444;
        }

        .cart-form {
            flex: 1;
            display: flex;
        }

        .cart {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #dc2626;
            color: white;
            cursor: pointer;
            font-size: 13px;
        }

        .cart:hover {
            background: #b91c1c;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            color: #9ca3af;
            padding: 40px 0;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .page-wrapper {
                flex-direction: column;
            }

            .sponsor-sidebar {
                width: 100%;
                display: flex;
                gap: 10px;
                overflow-x: auto;
            }

            .sponsor-item {
                margin-bottom: 0;
                flex-shrink: 0;
                min-width: 100px;
            }
        }

        @media (max-width: 600px) {
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

            .hero {
                padding: 0 20px;
            }

            .hero-content h1 {
                font-size: 26px;
            }

            .page-wrapper {
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

        {{-- SEARCH BAR ATAS --}}
        <form class="navbar-search" action="{{ url('/products') }}" method="GET">
            <input type="text" name="q" id="navbarSearchInput" placeholder="Cari Aksesoris Motor..." value="{{ request('q') }}">
            <button type="submit">🔍</button>
        </form>

        <div class="navbar-menu">
            <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}" class="{{ request()->is('/') || request()->is('dashboard') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/products') }}" class="{{ request()->is('products*') ? 'active' : '' }}">Produk</a>
            <a href="{{ Route::has('about') ? route('about') : '#' }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ Route::has('contact') ? route('contact') : '#' }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        </div>

        <div class="navbar-right">

            <a href="{{ Route::has('cart') ? route('cart') : url('/cart') }}" class="cart-icon">🛒</a>

            @auth
                <div class="user-menu" id="userMenuToggle">
                    <div class="avatar">👤</div>
                    <span>{{ Auth::user()->name }}</span>

                    <div class="user-dropdown" id="userDropdown">
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
            <button class="btn-belanja" onclick="document.querySelector('.container').scrollIntoView({behavior:'smooth'});">🛍 Belanja Sekarang</button>
        </div>
    </div>

    {{-- PAGE CONTENT --}}
    <div class="page-wrapper">

        {{-- SPONSOR SIDEBAR --}}
        <div class="sponsor-sidebar">
            <h3>SPONSOR</h3>

            <div class="sponsor-item brembo">Brembo</div>
            <div class="sponsor-item ohlins">ÖHLINS</div>
            <div class="sponsor-item rcb">RCB</div>
            <div class="sponsor-item enkei">ENKEI</div>
            <div class="sponsor-item accossato">ACCOSSATO</div>
            <div class="sponsor-item motul">MOTUL</div>
            <div class="sponsor-item wrx">WRX RACING EXHAUST</div>
        </div>

        {{-- PRODUCTS MAIN --}}
        <div class="product-main">

            <div class="filter-section">
                {{-- FILTER KATEGORI --}}
                <div class="category-pills">
                    <button class="category-btn active" data-category="all">Semua</button>
                    <button class="category-btn" data-category="Knalpot">Knalpot</button>
                    <button class="category-btn" data-category="Oli">Oli</button>
                    <button class="category-btn" data-category="Master Rem">Master Rem</button>
                    <button class="category-btn" data-category="Velg">Velg</button>
                    <button class="category-btn" data-category="Kaliper">Kaliper</button>
                    <button class="category-btn" data-category="Perlampuan">Perlampuan</button>
                    <button class="category-btn" data-category="Ecu">Ecu</button>
                    <button class="category-btn" data-category="Shockbreaker">Shockbreaker</button>
                </div>
            </div>

            <div class="container" id="productContainer">

                @forelse($products ?? [] as $product)

                    <div class="card" data-category="{{ $product->kategori }}">

                        <div class="image">
                            @if(!empty($product->gambar))
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}">
                            @else
                                FOTO PRODUK
                            @endif
                        </div>

                        <div class="content">

                            <h2>{{ $product->nama_produk }}</h2>

                            <div class="kategori">{{ $product->kategori }}</div>

                            <div class="harga">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>

                            <div class="stok">Stok : {{ $product->stok }}</div>

                            <div class="button-group">

                                <a href="{{ url('/products/' . $product->id) }}" class="detail">Detail</a>

                                {{-- FORM + KERANJANG DIRECT KE HARAMAN KERANJANG --}}
                                <form action="{{ Route::has('cart.add') ? route('cart.add') : url('/cart') }}" method="POST" class="cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="redirect_to" value="cart">
                                    <button type="submit" class="cart">+ Keranjang</button>
                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="empty-state">Belum ada produk tersedia.</div>

                @endforelse

            </div>

        </div>

    </div>

    <script>
        // Dropdown User Menu Toggle
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

        // Real-time Search dari Navbar & Filter Kategori
        const searchInput = document.getElementById('navbarSearchInput');
        const categoryBtns = document.querySelectorAll('.category-btn');
        const productCards = document.querySelectorAll('#productContainer .card');
        let currentSelectedCategory = 'all';

        function filterProducts() {
            const searchText = searchInput ? searchInput.value.toLowerCase() : '';

            productCards.forEach(card => {
                const productName = card.querySelector('h2') ? card.querySelector('h2').innerText.toLowerCase() : '';
                const productCategory = (card.getAttribute('data-category') || '').toLowerCase();

                const matchesSearch = productName.includes(searchText);
                const matchesCategory = (currentSelectedCategory === 'all') || (productCategory === currentSelectedCategory.toLowerCase());

                if (matchesSearch && matchesCategory) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }

        // Listener Filter Kategori
        categoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                categoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                currentSelectedCategory = this.getAttribute('data-category');
                filterProducts();
            });
        });

        // Listener Search Input Real-time dari Navbar
        if (searchInput) {
            searchInput.addEventListener('input', filterProducts);
            
            // Jalankan filter saat halaman dimuat jika URL membawa kata kunci pencarian
            if(searchInput.value) {
                filterProducts();
            }
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

            // Update Logo & Tagline dari Setting
            if (data.namaTokoUser) {
                renderLogo('navLogoUser', data.namaTokoUser);
            }

            if (data.bioTokoUser) {
                if (document.getElementById('navTaglineUser')) {
                    document.getElementById('navTaglineUser').textContent = data.bioTokoUser;
                }
                if (document.getElementById('heroBioText')) {
                    const nama = data.namaTokoUser || 'DZMotoshop';
                    document.getElementById('heroBioText').textContent = 
                        `Temukan berbagai aksesoris motor berkualitas dengan harga terbaik hanya di ${nama}`;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>