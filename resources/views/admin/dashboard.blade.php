<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Dashboard</title>

    <!-- CDN Chart.js untuk Grafik Penjualan -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #000000;
            color: #ffffff;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #0d0d0d;
            border-right: 1px solid #262626;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        /* Sidebar State: Collapsed (Garis 3 Toggle) */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-top .logo h1,
        .sidebar.collapsed .sidebar-top .logo p,
        .sidebar.collapsed .menu a span.menu-text,
        .sidebar.collapsed .logout-box button span.logout-text {
            display: none;
        }

        .sidebar.collapsed .menu a {
            justify-content: center;
            padding: 12px;
        }

        .sidebar.collapsed .logout-box button {
            padding: 10px 0;
            text-align: center;
        }

        .sidebar-top .logo {
            padding: 24px 20px;
            border-bottom: 1px solid #262626;
        }

        .sidebar-top .logo h1 {
            margin: 0;
            font-size: 20px;
        }

        .sidebar-top .logo h1 span {
            color: #dc2626;
        }

        .sidebar-top .logo p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #9ca3af;
            letter-spacing: 1px;
        }

        .menu {
            margin-top: 15px;
            padding: 0 12px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            margin-bottom: 4px;
            border-radius: 8px;
            color: #d1d5db;
            font-size: 14px;
        }

        .menu a:hover {
            background: #1f1f1f;
        }

        .menu a.active {
            background: #dc2626;
            color: #ffffff;
        }

        .logout-box {
            padding: 15px;
        }

        .logout-box button {
            width: 100%;
            padding: 10px;
            background: #1b1b1b;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .logout-box button:hover {
            background: #262626;
        }

        /* MAIN CONTENT */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid #262626;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .btn-toggle-sidebar {
            background: #1b1b1b;
            border: 1px solid #262626;
            color: #ffffff;
            font-size: 18px;
            cursor: pointer;
            padding: 6px 12px;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .btn-toggle-sidebar:hover {
            background: #262626;
        }

        .topbar-left h2 {
            margin: 0;
            font-size: 18px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
        }

        .admin-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin-dropdown {
            display: none;
            position: absolute;
            top: 42px;
            right: 0;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 8px;
            min-width: 160px;
            overflow: hidden;
            z-index: 10;
        }

        .admin-dropdown.show {
            display: block;
        }

        .admin-dropdown a, .admin-dropdown button {
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

        .admin-dropdown a:hover, .admin-dropdown button:hover {
            background: #262626;
        }

        .content {
            padding: 24px;
        }

        .content h3 {
            margin: 0 0 4px;
            font-size: 18px;
        }

        .content p.subtitle {
            margin: 0 0 20px;
            color: #9ca3af;
            font-size: 13px;
        }

        /* CARDS GRID */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .card {
            background: #1b1b1b;
            border: 1px solid #262626;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.2s;
        }

        .card:hover {
            border-color: #374151;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .card p.label {
            margin: 0;
            color: #9ca3af;
            font-size: 13px;
            font-weight: 600;
        }

        .card .icon-box {
            font-size: 20px;
            background: #262626;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card h1 {
            margin: 0;
            font-size: 26px;
            color: #ffffff;
        }

        .card .subtext {
            font-size: 11px;
            color: #6b7280;
            margin-top: 6px;
        }

        /* DASHBOARD SECTION LAYOUT */
        .dashboard-sections {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        @media (max-width: 992px) {
            .dashboard-sections {
                grid-template-columns: 1fr;
            }
        }

        .section-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 20px;
        }

        .section-box h4 {
            margin: 0 0 16px 0;
            font-size: 15px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* RECENT ACTIVITY TABLE */
        .activity-table {
            width: 100%;
            border-collapse: collapse;
        }

        .activity-table th {
            text-align: left;
            font-size: 12px;
            color: #9ca3af;
            padding: 10px;
            border-bottom: 1px solid #262626;
            text-transform: uppercase;
        }

        .activity-table td {
            padding: 12px 10px;
            font-size: 13px;
            border-bottom: 1px solid #262626;
        }

        .activity-table tr:last-child td {
            border-bottom: none;
        }

        .badge-status {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-success {
            background: #064e3b;
            color: #34d399;
        }

        .badge-pending {
            background: #78350f;
            color: #fbbf24;
        }

        .empty-activity {
            text-align: center;
            color: #6b7280;
            padding: 30px 10px;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-top">
            <div class="logo">
                <h1><span>DZ</span>Motoshop</h1>
                <p>ADMIN PANEL</p>
            </div>

            <div class="menu">
                <a href="{{ url('/admin/dashboard') }}" class="active">
                    <span>🏠</span> <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ url('/admin/orders') }}">
                    <span>🛒</span> <span class="menu-text">Pesanan</span>
                </a>
                <a href="{{ url('/admin/products') }}">
                    <span>📦</span> <span class="menu-text">Produk</span>
                </a>
                <a href="{{ url('/admin/settings') }}">
                    <span>⚙️</span> <span class="menu-text">Pengaturan</span>
                </a>
            </div>
        </div>

        <div class="logout-box">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    <span>↩</span> <span class="logout-text">Keluar</span>
                </button>
            </form>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="topbar">
            <div class="topbar-left">
                <!-- Tombol Garis 3 Toggle Sidebar -->
                <button class="btn-toggle-sidebar" id="sidebarToggle" title="Toggle Sidebar">☰</button>
                <h2>Dashboard</h2>
            </div>

            <div class="topbar-right">
                <div class="admin-menu" id="adminMenuToggle">
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <span>
                        {{ Auth::user()->name ?? 'Admin' }}
                    </span>

                    <div class="admin-dropdown" id="adminDropdown">
                        <a href="{{ Route::has('profile.edit') ? route('profile.edit') : '#' }}">
                            👤 Profil Saya
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">
                                ↩ Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">

            <h3>Dashboard</h3>
            <p class="subtitle">Ringkasan aktivitas toko DZ Motoshop</p>

            <!-- STATISTIK CARDS -->
            <div class="card-grid">

                <!-- CARD 1: TOTAL PRODUK -->
                <div class="card">
                    <div class="card-header">
                        <p class="label">Total Produk</p>
                        <div class="icon-box">📦</div>
                    </div>
                    <h1>{{ $totalProduk ?? 0 }}</h1>
                    <span class="subtext">Otomatis dari katalog produk</span>
                </div>

                <!-- CARD 2: TOTAL PESANAN -->
                <div class="card">
                    <div class="card-header">
                        <p class="label">Total Pesanan</p>
                        <div class="icon-box">🛒</div>
                    </div>
                    <h1>{{ $totalPesanan ?? 0 }}</h1>
                    <span class="subtext">Jumlah transaksi pembelian</span>
                </div>

                <!-- CARD 3: ESTIMASI OMSET -->
                <div class="card">
                    <div class="card-header">
                        <p class="label">Estimasi Omset</p>
                        <div class="icon-box">💰</div>
                    </div>
                    <h1>Rp {{ number_format($estimasiOmset ?? 0, 0, ',', '.') }}</h1>
                    <span class="subtext">Total pendapatan toko</span>
                </div>

                <!-- CARD 4: TOTAL USER -->
                <div class="card">
                    <div class="card-header">
                        <p class="label">Total User</p>
                        <div class="icon-box">👥</div>
                    </div>
                    <h1>{{ $totalUser ?? 0 }}</h1>
                    <span class="subtext">Pengguna terdaftar</span>
                </div>

            </div>

            <!-- GRAFIK & AKTIVITAS TERBARU -->
            <div class="dashboard-sections">
                
                <!-- BOX 1: GRAFIK PENJUALAN -->
                <div class="section-box">
                    <h4>📊 Grafik Penjualan</h4>
                    <div style="position: relative; height:260px; width:100%;">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- BOX 2: AKTIVITAS TERBARU -->
                <div class="section-box">
                    <h4>🕒 Pesanan Terbaru</h4>
                    
                    <table class="activity-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesananTerbaru ?? [] as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->user->name ?? 'Pembeli' }}</td>
                                    <td>Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge-status {{ ($pesanan->status ?? '') == 'selesai' ? 'badge-success' : 'badge-pending' }}">
                                            {{ ucfirst($pesanan->status ?? 'pending') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty-activity">
                                        Belum ada aktivitas pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    // 1. Toggle Sidebar (Garis 3)
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
        });
    }

    // 2. Dropdown Admin Menu Toggle
    const adminMenuToggle = document.getElementById('adminMenuToggle');
    const adminDropdown = document.getElementById('adminDropdown');

    if (adminMenuToggle && adminDropdown) {
        adminMenuToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            adminDropdown.classList.toggle('show');
        });

        document.addEventListener('click', function (e) {
            if (!adminMenuToggle.contains(e.target)) {
                adminDropdown.classList.remove('show');
            }
        });
    }

    // 3. Render Grafik Penjualan (Chart.js)
    const ctx = document.getElementById('salesChart').getContext('2d');
    
    // Data Dinamis / Fallback saat belum ada penjualan
    const chartLabels = {!! json_encode($chartLabels ?? ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun']) !!};
    const chartData = {!! json_encode($chartData ?? [0, 0, 0, 0, 0, 0]) !!};

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Penjualan (Rp)',
                data: chartData,
                borderColor: '#dc2626',
                backgroundColor: 'rgba(220, 38, 38, 0.15)',
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#dc2626'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        color: '#262626'
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                },
                y: {
                    grid: {
                        color: '#262626'
                    },
                    ticks: {
                        color: '#9ca3af',
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>

</body>

</html>