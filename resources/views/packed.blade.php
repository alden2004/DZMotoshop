<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pesanan | DZ Motoshop</title>

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

        .navbar-right a {
            font-size: 13px;
            color: #d1d5db;
            background: #1f1f1f;
            padding: 8px 14px;
            border-radius: 6px;
            border: 1px solid #333;
            transition: 0.2s;
        }

        .navbar-right a:hover {
            background: #282828;
            color: #fff;
        }

        /* MAIN CONTAINER */
        .status-container {
            max-width: 850px;
            margin: 30px auto;
            padding: 0 20px 40px 20px;
            flex: 1;
            width: 100%;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .page-header p {
            color: #9ca3af;
            font-size: 13px;
        }

        /* ALERT SUCCESS */
        .alert-success {
            background: rgba(22, 163, 74, 0.2);
            border: 1px solid #16a34a;
            color: #4ade80;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* LIST CARD (ORDER CONTAINER) */
        .order-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
            transition: border-color 0.3s;
        }

        .order-card:hover {
            border-color: #333;
        }

        /* CARD HEADER (LIST SUMMARY) */
        .order-card-header {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            background: #141414;
            border-bottom: 1px solid #1f1f1f;
        }

        .order-info-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .order-icon-box {
            width: 44px;
            height: 44px;
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid #dc2626;
            color: #dc2626;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .invoice-title {
            font-size: 14px;
            font-weight: bold;
            font-family: monospace;
            color: #f3f4f6;
        }

        .badge-status {
            display: inline-block;
            background: #dc2626;
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 4px;
            margin-top: 4px;
            text-transform: uppercase;
        }

        .badge-status.success {
            background: #16a34a;
        }

        .badge-status.info {
            background: #2563eb;
        }

        .order-info-right {
            text-align: right;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .order-total-price {
            font-size: 16px;
            font-weight: bold;
            color: #dc2626;
        }

        .btn-toggle-detail {
            background: #222222;
            color: #ffffff;
            border: 1px solid #333333;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-toggle-detail:hover {
            background: #dc2626;
            border-color: #dc2626;
        }

        /* COLLAPSIBLE DETAILS BODY */
        .order-card-body {
            display: none;
            padding: 24px;
            background: #111111;
            animation: fadeIn 0.3s ease-in-out;
        }

        .order-card-body.show {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* STATUS TRACKER / STEPPER */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin: 10px 0 30px 0;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 10%;
            right: 10%;
            height: 3px;
            background: #222222;
            z-index: 1;
        }

        .step-progress {
            position: absolute;
            top: 20px;
            left: 10%;
            height: 3px;
            background: #dc2626;
            z-index: 1;
            transition: width 0.3s ease;
        }

        .step {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 25%;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #181818;
            border: 2px solid #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .step.active .step-icon {
            background: #dc2626;
            border-color: #dc2626;
            color: #ffffff;
            box-shadow: 0 0 10px rgba(220, 38, 38, 0.5);
        }

        .step.completed .step-icon {
            background: #16a34a;
            border-color: #16a34a;
            color: #ffffff;
        }

        .step-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 600;
            text-align: center;
        }

        .step.active .step-label { color: #ffffff; }
        .step.completed .step-label { color: #a3e635; }

        /* DETAILS GRID */
        .section-title {
            font-size: 13px;
            font-weight: bold;
            color: #dc2626;
            margin: 20px 0 12px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #1a1a1a;
            padding-bottom: 8px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-box label {
            display: block;
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .info-box p {
            font-size: 13px;
            color: #ffffff;
            font-weight: 500;
        }

        /* LIST PRODUK */
        .item-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid #1a1a1a;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-img {
            width: 48px;
            height: 48px;
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
            margin-bottom: 3px;
        }

        .item-qty {
            color: #9ca3af;
            font-size: 12px;
        }

        .item-price {
            font-weight: bold;
            font-size: 13px;
            color: #ffffff;
        }

        /* ACTION BUTTONS */
        .action-group {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            cursor: default; /* Berubah jadi kursor biasa karena hanya variasi */
            border: none;
        }

        .btn-chat {
            background: #dc2626;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* EMPTY STATE */
        .empty-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            color: #9ca3af;
        }

        .empty-card h3 {
            color: #ffffff;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        @media (max-width: 640px) {
            .navbar {
                padding: 16px 20px;
            }
            .order-card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .order-info-right {
                width: 100%;
                justify-content: space-between;
            }
            .info-grid {
                grid-template-columns: 1fr;
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
        <div class="navbar-right">
            <a href="{{ route('profile.edit') }}">👤 Kembali ke Profil</a>
        </div>
    </div>

    {{-- MAIN CONTAINER --}}
    <div class="status-container">

        <div class="page-header">
            <h1>Pesanan Saya</h1>
            <p>Daftar produk yang telah berhasil dibayar dan status pemrosesannya</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @php
            $ordersList = $orders ?? session('orders_history', []);
        @endphp

        @if(!empty($ordersList) && is_array($ordersList) && count($ordersList) > 0)
            
            @foreach($ordersList as $index => $orderData)
                @php
                    $currentStatus = strtolower($orderData['status'] ?? 'dikemas');
                    $invoiceNo = $orderData['invoice_no'] ?? 'INV/2026/DZ/0000';
                    $orderId = $orderData['id'] ?? $invoiceNo;
                    
                    $statusLevel = 1;
                    if ($currentStatus == 'dikemas') $statusLevel = 2;
                    elseif ($currentStatus == 'dikirim') $statusLevel = 3;
                    elseif ($currentStatus == 'selesai') $statusLevel = 4;

                    $progressWidth = '0%';
                    if ($statusLevel == 2) $progressWidth = '26%';
                    elseif ($statusLevel == 3) $progressWidth = '53%';
                    elseif ($statusLevel == 4) $progressWidth = '80%';
                @endphp
                
                <div class="order-card">
                    
                    <div class="order-card-header">
                        <div class="order-info-left">
                            <div class="order-icon-box">📦</div>
                            <div>
                                <div class="invoice-title">{{ $invoiceNo }}</div>
                                <span class="badge-status {{ $statusLevel == 4 ? 'success' : ($statusLevel == 3 ? 'info' : '') }}">
                                    {{ ucfirst($currentStatus) }}
                                </span>
                                @if(!empty($orderData['created_at']))
                                    <span style="font-size: 11px; color: #6b7280; margin-left: 8px;">• {{ $orderData['created_at'] }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="order-info-right">
                            <div>
                                <div style="font-size: 10px; color: #9ca3af; text-transform: uppercase;">Total Pembayaran</div>
                                <div class="order-total-price">Rp {{ number_format($orderData['total_bayar'] ?? 0, 0, ',', '.') }}</div>
                            </div>

                            <button class="btn-toggle-detail" onclick="toggleOrderDetails(this)">
                                <span>👁️ Lihat Detail & Proses</span>
                            </button>
                        </div>
                    </div>

                    <div class="order-card-body {{ $loop->first ? 'show' : '' }}">
                        
                        <div class="section-title">🚀 Progress Pengiriman</div>
                        <div class="stepper">
                            <div class="step-progress" style="width: {{ $progressWidth }};"></div>

                            <div class="step {{ $statusLevel > 1 ? 'completed' : ($statusLevel == 1 ? 'active' : '') }}">
                                <div class="step-icon">{{ $statusLevel > 1 ? '✓' : '📝' }}</div>
                                <div class="step-label">Dibuat</div>
                            </div>

                            <div class="step {{ $statusLevel > 2 ? 'completed' : ($statusLevel == 2 ? 'active' : '') }}">
                                <div class="step-icon">{{ $statusLevel > 2 ? '✓' : '📦' }}</div>
                                <div class="step-label">Dikemas</div>
                            </div>

                            <div class="step {{ $statusLevel > 3 ? 'completed' : ($statusLevel == 3 ? 'active' : '') }}">
                                <div class="step-icon">{{ $statusLevel > 3 ? '✓' : '🚚' }}</div>
                                <div class="step-label">Dikirim</div>
                            </div>

                            <div class="step {{ $statusLevel == 4 ? 'completed active' : '' }}">
                                <div class="step-icon">{{ $statusLevel == 4 ? '✓' : '🏠' }}</div>
                                <div class="step-label">Selesai</div>
                            </div>
                        </div>

                        <div class="section-title">📍 Data Penerima</div>
                        <div class="info-grid">
                            <div class="info-box">
                                <label>Nama Penerima</label>
                                <p>{{ $orderData['nama_penerima'] ?? '-' }} ({{ $orderData['no_hp'] ?? '-' }})</p>
                            </div>

                            <div class="info-box">
                                <label>Metode Bayar</label>
                                <p style="color: #dc2626; font-weight: bold;">{{ $orderData['metode_bayar'] ?? 'Transfer' }}</p>
                            </div>

                            <div class="info-box" style="grid-column: span 2;">
                                <label>Alamat Pengiriman</label>
                                <p>{{ $orderData['alamat'] ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="section-title">🛒 Barang yang Dibeli</div>
                        @if(!empty($orderData['items']) && is_array($orderData['items']))
                            @foreach($orderData['items'] as $item)
                                <div class="item-row">
                                    @if(!empty($item['gambar']))
                                        <img src="{{ asset('storage/' . $item['gambar']) }}" class="item-img" alt="{{ $item['nama_produk'] ?? 'Produk' }}">
                                    @else
                                        <div class="item-img" style="display:flex;align-items:center;justify-content:center;font-size:9px;color:#6b7280;">NO IMG</div>
                                    @endif

                                    <div class="item-details">
                                        <div class="item-name">{{ $item['nama_produk'] ?? 'Produk' }}</div>
                                        <div class="item-qty">{{ $item['quantity'] ?? 1 }} x Rp {{ number_format($item['harga'] ?? 0, 0, ',', '.') }}</div>
                                    </div>

                                    <div class="item-price">
                                        Rp {{ number_format(($item['harga'] ?? 0) * ($item['quantity'] ?? 1), 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p style="font-size: 12px; color: #9ca3af; padding: 10px 0;">Tidak ada rincian barang.</p>
                        @endif

                        <!-- TOMBOL SEBAGAI VARIASI (TIDAK BERFUNGSI / STATIC) -->
                        <div class="action-group">
                            <div class="btn btn-chat">
                                💬 Hubungi Penjual / Admin
                            </div>
                        </div>

                    </div>

                </div>

            @endforeach

        @else
            <div class="empty-card">
                <p style="font-size: 36px;">🛵</p>
                <h3>Belum Ada Pesanan Aktif</h3>
                <p style="font-size: 13px; margin-bottom: 15px;">Kamu belum memiliki barang yang sedang diproses saat ini.</p>
                <a href="{{ url('/products') }}" style="color: #dc2626; font-weight: bold; font-size: 13px;">Belanja Sekarang &rarr;</a>
            </div>
        @endif

    </div>

    <!-- SCRIPT HANYA UNTUK COLLAPSE DETAIL -->
    <script>
        function toggleOrderDetails(button) {
            const cardBody = button.closest('.order-card').querySelector('.order-card-body');
            if (cardBody.classList.contains('show')) {
                cardBody.classList.remove('show');
                button.innerHTML = '<span>👁️ Lihat Detail & Proses</span>';
            } else {
                cardBody.classList.add('show');
                button.innerHTML = '<span>▲ Sembunyikan Detail</span>';
            }
        }
    </script>
</body>

</html>