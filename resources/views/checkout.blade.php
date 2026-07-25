<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan | DZ Motoshop</title>

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
        }

        .navbar-left .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar-left .logo span {
            color: #dc2626;
        }

        .navbar-left .tagline {
            font-size: 10px;
            color: #9ca3af;
            letter-spacing: 1px;
        }

        /* LAYOUT CHECKOUT */
        .checkout-container {
            max-width: 1080px;
            margin: 30px auto;
            padding: 0 20px;
            flex: 1;
            width: 100%;
        }

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

        .page-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            border-bottom: 1px solid #1f1f1f;
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 0.5px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 25px;
        }

        /* FORM CARDS */
        .form-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 24px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #d1d5db;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            background: #181818;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            outline: none;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #dc2626;
            box-shadow: 0 0 8px rgba(220, 38, 38, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        /* METODE PEMBAYARAN - DARK THEME CARDS */
        .payment-subtitle {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 12px;
            margin-bottom: 20px;
        }

        .payment-item {
            position: relative;
        }

        .payment-item input[type="radio"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .payment-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #181818;
            border: 1px solid #2a2a2a;
            border-radius: 10px;
            padding: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            height: 65px;
            text-align: center;
        }

        /* Badge/Pill Putih Lembut Khusus Logo agar Warna Ciri Khas Tetap Muncul Jelas */
        .logo-badge {
            background: #ffffff;
            border-radius: 6px;
            padding: 4px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            max-height: 42px;
        }

        .payment-card img {
            max-height: 28px;
            max-width: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: all 0.2s;
        }

        .payment-card svg {
            max-height: 32px;
            max-width: 85%;
            width: auto;
            height: auto;
            transition: all 0.2s;
        }

        .payment-card .cod-icon {
            font-size: 20px;
            margin-bottom: 2px;
        }

        .payment-card span {
            font-size: 11px;
            font-weight: bold;
            color: #d1d5db;
            margin-top: 2px;
        }

        /* STATE SELEKSI (CHECKED & HOVER) */
        .payment-item input[type="radio"]:checked + .payment-card {
            border: 2px solid #dc2626;
            background: #221515;
            box-shadow: 0 0 12px rgba(220, 38, 38, 0.3);
        }

        .payment-item input[type="radio"]:checked + .payment-card span {
            color: #ffffff;
        }

        .payment-item input[type="radio"]:checked + .payment-card .logo-badge {
            box-shadow: 0 0 6px rgba(255, 255, 255, 0.5);
        }

        .payment-item input[type="radio"]:checked + .payment-card img,
        .payment-item input[type="radio"]:checked + .payment-card svg {
            transform: scale(1.05);
        }

        .payment-item:hover .payment-card {
            border-color: #dc2626;
            background: #1f1a1a;
        }

        /* RINGKASAN PESANAN CARD */
        .summary-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 24px;
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .item-list {
            list-style: none;
            margin-bottom: 20px;
            max-height: 320px;
            overflow-y: auto;
            padding-right: 5px;
        }

        .item-list::-webkit-scrollbar {
            width: 4px;
        }
        .item-list::-webkit-scrollbar-thumb {
            background: #262626;
            border-radius: 4px;
        }

        .item-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #1a1a1a;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-img {
            width: 54px;
            height: 54px;
            border-radius: 8px;
            background: #222222;
            object-fit: cover;
            border: 1px solid #282828;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            color: #ffffff;
            font-size: 13px;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .item-qty {
            color: #9ca3af;
            font-size: 12px;
        }

        .item-price {
            font-weight: bold;
            font-size: 13px;
            color: #ffffff;
            text-align: right;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #262626;
        }

        .total-row span {
            font-size: 14px;
            color: #9ca3af;
            font-weight: 500;
        }

        .total-row h3 {
            font-size: 22px;
            color: #dc2626;
            font-weight: bold;
        }

        .btn-submit {
            width: 100%;
            background: #dc2626;
            color: #ffffff;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
        }

        @media (max-width: 768px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }
            .payment-options {
                grid-template-columns: repeat(2, 1fr);
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
    </div>

    {{-- MAIN CONTAINER --}}
    <div class="checkout-container">

        <a href="{{ route('cart') }}" class="btn-back">
            ➔ Kembali ke Keranjang
        </a>

        <div class="page-title">
            📦 FORM PEMESANAN & PENGIRIMAN
        </div>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            
            <div class="checkout-grid">
                
                {{-- FORM DATA & METODE PEMBAYARAN --}}
                <div class="form-card">
                    
                    <!-- DATA PENERIMA -->
                    <div class="section-title">👤 Data Penerima</div>

                    <div class="form-group">
                        <label>Nama Lengkap Penerima</label>
                        <input type="text" name="nama_penerima" class="form-control" value="{{ Auth::user()->name }}" required placeholder="Masukkan nama penerima">
                    </div>

                    <div class="form-group">
                        <label>Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" class="form-control" required placeholder="Contoh: 081234567890">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap Pengiriman</label>
                        <textarea name="alamat" class="form-control" required placeholder="Jalan, No. Rumah, RT/RW, Kecamatan, Kota, Kode Pos"></textarea>
                    </div>

                    <!-- METODE PEMBAYARAN FULL COLOR & DARK THEME COMPATIBLE -->
                    <div class="section-title" style="margin-top: 30px;">💳 Metode Pembayaran</div>

                    <!-- Transfer Bank -->
                    <div class="payment-subtitle">Transfer Bank</div>
                    <div class="payment-options">
                        
                        <!-- BCA VECTOR -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="Transfer BCA" required checked>
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <svg viewBox="0 0 280 80">
                                        <path d="M 10,10 C 25,2 55,2 70,10 C 75,35 75,50 70,70 C 55,78 25,78 10,70 C 5,50 5,35 10,10 Z" fill="#00529C"/>
                                        <path d="M 40,20 C 32,20 25,30 25,48 C 30,55 37,55 40,40 C 43,55 50,55 55,48 C 55,30 48,20 40,20 Z" fill="#FFFFFF"/>
                                        <path d="M 22,40 C 15,48 20,62 32,60 C 35,55 32,48 28,45 C 24,42 22,40 22,40 Z" fill="#FFFFFF"/>
                                        <path d="M 58,40 C 65,48 60,62 48,60 C 45,55 48,48 52,45 C 56,42 58,40 58,40 Z" fill="#FFFFFF"/>
                                        <text x="20" y="73" font-family="Arial, sans-serif" font-weight="bold" font-size="7" fill="#FFFFFF" letter-spacing="0.5">GRUP BCA</text>
                                        <text x="88" y="62" font-family="'Arial Black', Gadget, sans-serif" font-weight="900" font-style="italic" font-size="58" fill="#00529C" letter-spacing="-2">BCA</text>
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- MANDIRI (Original Color + Yellow Ribbon) -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="Transfer Mandiri">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri">
                                </div>
                            </div>
                        </label>

                        <!-- BRI (Original Blue & Orange) -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="Transfer BRI">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI">
                                </div>
                            </div>
                        </label>

                        <!-- BNI VECTOR (Original Orange & Teal) -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="Transfer BNI">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <svg viewBox="0 0 250 80">
                                        <rect x="0" y="10" width="60" height="60" fill="#F15A23" rx="4"/>
                                        <path d="M 12,22 L 30,22 L 20,58 L 12,58 Z" fill="#FFFFFF"/>
                                        <path d="M 28,22 L 48,22 C 48,35 30,38 30,46 C 30,52 46,50 46,58 L 22,58 C 22,42 42,40 42,32 C 42,28 32,28 28,22 Z" fill="#FFFFFF"/>
                                        <text x="72" y="60" font-family="'Times New Roman', Times, serif" font-weight="bold" font-size="52" fill="#00665E" letter-spacing="1">BNI</text>
                                    </svg>
                                </div>
                            </div>
                        </label>

                    </div>

                    <!-- E-Wallet -->
                    <div class="payment-subtitle">E-Wallet</div>
                    <div class="payment-options">

                        <!-- DANA -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="DANA">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA">
                                </div>
                            </div>
                        </label>

                        <!-- GOPAY (Original Green & Black) -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="GoPay">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="GoPay">
                                </div>
                            </div>
                        </label>

                        <!-- OVO (Original Purple) -->
                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="OVO">
                            <div class="payment-card">
                                <div class="logo-badge">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="OVO">
                                </div>
                            </div>
                        </label>

                    </div>

                    <!-- Bayar Di Tempat -->
                    <div class="payment-subtitle">Lainnya</div>
                    <div class="payment-options">

                        <label class="payment-item">
                            <input type="radio" name="metode_bayar" value="COD (Bayar di Tempat)">
                            <div class="payment-card">
                                <div class="cod-icon">📦</div>
                                <span>COD (Bayar di Tempat)</span>
                            </div>
                        </label>

                    </div>

                </div>

                {{-- RINGKASAN PRODUK --}}
                <div class="summary-card">
                    <div class="section-title">🛒 Ringkasan Pesanan</div>

                    <ul class="item-list">
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                            @php 
                                $subtotal = $item['harga'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp
                            <li class="item-row">
                                {{-- FOTO PRODUK --}}
                                @if(!empty($item['gambar']))
                                    <img src="{{ asset('storage/' . $item['gambar']) }}" class="item-img" alt="{{ $item['nama_produk'] }}">
                                @else
                                    <div class="item-img" style="display:flex;align-items:center;justify-content:center;font-size:10px;color:#6b7280;">NO IMG</div>
                                @endif

                                <div class="item-details">
                                    <div class="item-name">{{ $item['nama_produk'] }}</div>
                                    <div class="item-qty">{{ $item['quantity'] }}x @ Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                                </div>

                                <div class="item-price">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="total-row">
                        <span>Total Bayar</span>
                        <h3>Rp {{ number_format($total, 0, ',', '.') }}</h3>
                    </div>

                    <button type="submit" class="btn-submit">
                        Konfirmasi Pesanan ➔
                    </button>
                </div>

            </div>
        </form>

    </div>

</body>

</html>