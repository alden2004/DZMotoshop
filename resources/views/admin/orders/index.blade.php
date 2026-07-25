<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Pesanan</title>

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

        /* MAIN */
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
            gap: 16px;
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

        .content-header h3 {
            margin: 0 0 4px;
            font-size: 18px;
        }

        .content-header p.subtitle {
            margin: 0 0 20px;
            color: #9ca3af;
            font-size: 13px;
        }

        .alert-success {
            background: rgba(22, 163, 74, 0.2);
            border: 1px solid #16a34a;
            color: #4ade80;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        /* TABLE */
        .table-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: left;
            padding: 14px 20px;
            font-size: 13px;
            color: #9ca3af;
            border-bottom: 1px solid #262626;
            text-transform: uppercase;
        }

        tbody td {
            padding: 16px 20px;
            font-size: 14px;
            border-bottom: 1px solid #262626;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            font-weight: bold;
            color: #ffffff;
            font-family: monospace;
        }

        .select-status {
            background: #0d0d0d;
            color: #ffffff;
            border: 1px solid #333333;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            outline: none;
        }

        .select-status:focus {
            border-color: #dc2626;
        }

        .btn-update {
            background: #dc2626;
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 4px;
            transition: background 0.2s;
        }

        .btn-update:hover {
            background: #b91c1c;
        }

        .btn-delete {
            background: #dc2626;
            color: #ffffff;
            border: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 4px;
            transition: background 0.2s;
        }

        .btn-delete:hover {
            background: #991b1b;
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
        }

        /* MODAL KUSTOM */
        .chat-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 999;
            align-items: center;
            justify-content: center;
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
                <a href="{{ url('/admin/dashboard') }}">
                    <span>🏠</span> <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ url('/admin/orders') }}" class="active">
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
                <button class="btn-toggle-sidebar" id="sidebarToggle" title="Toggle Sidebar">☰</button>
                <h2>Pesanan</h2>
            </div>

            <div class="topbar-right">
                <div class="admin-menu" id="adminMenuToggle">
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <span>
                        {{ Auth::user()->name ?? 'Administrator' }}
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

            <div class="content-header">
                <h3>Daftar Pesanan</h3>
                <p class="subtitle">Kelola Status Pesanan Pelanggan</p>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>No. Invoice</th>
                            <th>Tanggal</th>
                            <th>Pelanggan / Penerima</th>
                            <th>Total</th>
                            <th>Status Pesanan (Ubah & Aksi)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $ordersList = $orders ?? session('orders_history', []);
                        @endphp

                        @forelse($ordersList as $index => $order)
                            @php
                                $currentStatus = strtolower($order['status'] ?? ($order->status ?? 'dikemas'));
                                $invoice = $order['invoice_no'] ?? ($order->invoice_no ?? '#DZS'.str_pad($index+1, 5, '0', STR_PAD_LEFT));
                                
                                $namaRaw = $order['nama_penerima'] ?? ($order->nama_penerima ?? 'Pelanggan');
                                $nama = trim(explode('(', $namaRaw)[0]); 
                                $nohp = $order['no_hp'] ?? ($order->no_hp ?? '08123456789');

                                $orderId = $order['id'] ?? ($order->id ?? $index);
                                $totalBayar = $order['total_bayar'] ?? ($order['total_harga'] ?? ($order->total_bayar ?? ($order->total_harga ?? 0)));
                                $createdAt = $order['created_at'] ?? ($order->created_at ?? date('d M Y'));
                            @endphp
                            <tr id="row-order-{{ $orderId }}">
                                <td>
                                    <span class="order-id">{{ $invoice }}</span>
                                </td>

                                <td>
                                    {{ is_string($createdAt) ? $createdAt : $createdAt->format('d M Y') }}
                                </td>

                                <td>
                                    <strong>{{ $nama }}</strong><br>
                                    <small style="color: #9ca3af;">{{ $nohp }}</small>
                                </td>

                                <td>
                                    Rp {{ number_format($totalBayar, 0, ',', '.') }}
                                </td>

                                <td>
                                    <div style="display: flex; align-items: center; gap: 4px;">
                                        <!-- Form Update Status -->
                                        @php
                                            $updateAction = Route::has('admin.orders.updateStatus') ? route('admin.orders.updateStatus', $orderId) : url('/admin/orders/'.$orderId.'/status');
                                        @endphp
                                        <form method="POST" action="{{ $updateAction }}" style="display: flex; align-items: center;">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="select-status">
                                                <option value="dibuat" {{ $currentStatus == 'dibuat' ? 'selected' : '' }}>📝 Dibuat</option>
                                                <option value="dikemas" {{ $currentStatus == 'dikemas' ? 'selected' : '' }}>📦 Dikemas</option>
                                                <option value="dikirim" {{ $currentStatus == 'dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                                                <option value="selesai" {{ $currentStatus == 'selesai' ? 'selected' : '' }}>🏠 Selesai</option>
                                            </select>
                                            <button type="submit" class="btn-update">Simpan</button>
                                        </form>

                                        <!-- Form Delete Terhubung ke Route Backend DELETE -->
                                        @php
                                            $deleteAction = Route::has('admin.orders.destroy') ? route('admin.orders.destroy', $orderId) : url('/admin/orders/'.$orderId);
                                        @endphp
                                        <form id="delete-form-{{ $orderId }}" method="POST" action="{{ $deleteAction }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-delete" title="Hapus Pesanan" onclick="confirmDelete('{{ $orderId }}', '{{ $invoice }}')">🗑️ Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">Belum ada pesanan.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

<!-- MODAL KONFIRMASI HAPUS KUSTOM -->
<div class="chat-modal" id="deleteModal" style="display: none;">
    <div class="chat-container" style="background: #141414; border: 1px solid #262626; border-radius: 12px; width: 400px; height: auto; flex-direction: column; padding: 24px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.9);">
        <h3 style="margin-top: 0; color: #ffffff;">Konfirmasi Hapus</h3>
        <p id="deleteModalMessage" style="color: #9ca3af; font-size: 14px; margin-bottom: 20px;">Apakah Anda yakin ingin menghapus data ini?</p>
        <div style="display: flex; justify-content: center; gap: 10px;">
            <button type="button" onclick="closeDeleteModal()" style="padding: 8px 16px; background: #374151; color: #fff; border: none; border-radius: 6px; cursor: pointer;">Batal</button>
            <button type="button" id="btnConfirmDelete" style="padding: 8px 16px; background: #dc2626; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">Hapus</button>
        </div>
    </div>
</div>

<script>
    // 1. Sidebar Toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
        });
    }

    // 2. Admin Dropdown Toggle
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

    // 3. Custom Delete Modal Handlers
    let currentDeleteId = null;

    function confirmDelete(orderId, invoice) {
        currentDeleteId = orderId;
        document.getElementById('deleteModalMessage').innerText = `Apakah Anda yakin ingin menghapus permanen data pesanan ${invoice}?`;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        currentDeleteId = null;
        document.getElementById('deleteModal').style.display = 'none';
    }

    document.getElementById('btnConfirmDelete').addEventListener('click', function() {
        if (currentDeleteId) {
            const form = document.getElementById('delete-form-' + currentDeleteId);
            if (form) {
                form.submit();
            }
        }
    });
</script>

</body>

</html>