<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Produk</title>

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

        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .content-header h3 {
            margin: 0 0 4px;
            font-size: 18px;
        }

        .content-header p.subtitle {
            margin: 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .btn-tambah {
            background: #dc2626;
            color: #fff;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #b91c1c;
        }

        /* FILTER & VIEW SWITCHER BOX */
        .filter-box {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .filter-left {
            display: flex;
            gap: 12px;
            flex: 1;
            flex-wrap: wrap;
        }

        .filter-box input, .filter-box select {
            padding: 10px 14px;
            background: #1b1b1b;
            border: 1px solid #262626;
            color: #ffffff;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .filter-box input {
            flex: 1;
            min-width: 200px;
        }

        .filter-box select option {
            background: #1b1b1b;
            color: #ffffff;
        }

        /* VIEW SWITCHER BUTTONS */
        .view-switcher {
            display: flex;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 8px;
            padding: 3px;
            gap: 2px;
        }

        .view-btn {
            background: transparent;
            border: none;
            color: #9ca3af;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .view-btn:hover {
            color: #ffffff;
            background: #262626;
        }

        .view-btn.active {
            background: #dc2626;
            color: #ffffff;
        }

        /* ALERT */
        .alert-success {
            background: #064e3b;
            color: #34d399;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid #059669;
        }

        /* COMMON STYLES & BADGES */
        .produk-item-flex {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .img-produk {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 6px;
            background: #262626;
            border: 1px solid #374151;
            flex-shrink: 0;
        }

        .produk-nama {
            font-weight: bold;
            color: #ffffff;
            display: block;
        }

        .badge-kategori {
            display: inline-block;
            padding: 4px 10px;
            background: #262626;
            color: #f87171;
            border: 1px solid #dc2626;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .aksi-group {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-edit {
            color: #38bdf8;
            font-size: 16px;
            transition: opacity 0.2s;
        }

        .btn-edit:hover {
            opacity: 0.8;
        }

        .btn-hapus {
            background: none;
            border: none;
            color: #ef4444;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            transition: opacity 0.2s;
        }

        .btn-hapus:hover {
            opacity: 0.8;
        }

        /* --- MODE 1: DETAILS (TABLE VIEW) --- */
        .products-container.mode-details .table-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            overflow-x: auto;
        }

        .products-container.mode-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .products-container.mode-details thead th {
            text-align: left;
            padding: 14px 20px;
            font-size: 13px;
            color: #9ca3af;
            border-bottom: 1px solid #262626;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .products-container.mode-details tbody td {
            padding: 12px 20px;
            font-size: 14px;
            border-bottom: 1px solid #262626;
            vertical-align: middle;
        }

        .products-container.mode-details tbody tr:last-child td {
            border-bottom: none;
        }

        /* --- MODE 2: TILES (GRID CARDS VIEW) --- */
        .products-container.mode-tiles table,
        .products-container.mode-tiles thead {
            display: block;
            width: 100%;
        }

        .products-container.mode-tiles thead {
            display: none;
        }

        .products-container.mode-tiles tbody {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            width: 100%;
        }

        .products-container.mode-tiles tr.product-item {
            display: flex;
            flex-direction: column;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 14px;
            gap: 10px;
            transition: transform 0.2s, border-color 0.2s;
        }

        .products-container.mode-tiles tr.product-item:hover {
            transform: translateY(-3px);
            border-color: #374151;
        }

        .products-container.mode-tiles td {
            display: block;
            padding: 0;
            border: none;
        }

        .products-container.mode-tiles .produk-item-flex {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .products-container.mode-tiles .img-produk {
            width: 100%;
            height: 160px;
            border-radius: 8px;
        }

        .products-container.mode-tiles .produk-nama {
            font-size: 14px;
            line-height: 1.4;
            height: 38px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .products-container.mode-tiles .tile-price {
            font-size: 15px;
            font-weight: bold;
            color: #22c55e;
        }

        .products-container.mode-tiles .tile-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #262626;
            padding-top: 10px;
            margin-top: 4px;
        }

        /* --- MODE 3: LIST (COMPACT ROW VIEW) --- */
        .products-container.mode-list table,
        .products-container.mode-list thead {
            display: block;
            width: 100%;
        }

        .products-container.mode-list thead {
            display: none;
        }

        .products-container.mode-list tbody {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .products-container.mode-list tr.product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 8px;
            padding: 8px 14px;
        }

        .products-container.mode-list td {
            display: flex;
            align-items: center;
            padding: 0;
            border: none;
        }

        .products-container.mode-list .img-produk {
            width: 36px;
            height: 36px;
        }

        /* --- MODE 4: CONTENT (EXPANDED ROW VIEW) --- */
        .products-container.mode-content table,
        .products-container.mode-content thead {
            display: block;
            width: 100%;
        }

        .products-container.mode-content thead {
            display: none;
        }

        .products-container.mode-content tbody {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .products-container.mode-content tr.product-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            align-items: center;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 10px;
            padding: 14px 18px;
            gap: 15px;
        }

        .products-container.mode-content td {
            display: block;
            padding: 0;
            border: none;
        }

        .products-container.mode-content .img-produk {
            width: 64px;
            height: 64px;
        }

        .products-container.mode-content .content-info label {
            display: block;
            font-size: 11px;
            color: #9ca3af;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 20px;
            font-size: 13px;
            color: #9ca3af;
            background: #1b1b1b;
            border: 1px solid #262626;
            border-top: none;
            border-radius: 0 0 12px 12px;
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
            width: 100%;
        }

        /* MODAL POPUP KONFIRMASI HAPUS CUSTOM */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 24px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .modal-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .modal-box h4 {
            margin: 0 0 8px 0;
            font-size: 18px;
            color: #ffffff;
        }

        .modal-box p {
            font-size: 13px;
            color: #9ca3af;
            margin: 0 0 20px 0;
            line-height: 1.5;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-batal {
            background: #262626;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            flex: 1;
        }

        .btn-batal:hover {
            background: #374151;
        }

        .btn-konfirmasi-hapus {
            background: #dc2626;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            flex: 1;
        }

        .btn-konfirmasi-hapus:hover {
            background: #b91c1c;
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
                <a href="{{ url('/admin/orders') }}">
                    <span>🛒</span> <span class="menu-text">Pesanan</span>
                </a>
                <a href="{{ url('/admin/products') }}" class="active">
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
                <h2>Produk</h2>
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

            @if(session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="content-header">
                <div>
                    <h3>Daftar Produk</h3>
                    <p class="subtitle">Kelola Semua Produk Toko</p>
                </div>

                <a href="{{ url('/admin/products/create') }}" class="btn-tambah">+ Tambah Produk</a>
            </div>

            <!-- FILTER PENCARIAN & VIEW SWITCHER (ALA WINDOWS EXPLORER) -->
            <div class="filter-box">
                <div class="filter-left">
                    <input type="text" id="adminSearchInput" placeholder="Cari nama produk...">
                    <select id="adminCategoryFilter">
                        <option value="">Semua Kategori</option>
                        <option value="Knalpot">Knalpot</option>
                        <option value="Oli">Oli</option>
                        <option value="Master Rem">Master Rem</option>
                        <option value="Velg">Velg</option>
                        <option value="Kaliper">Kaliper</option>
                        <option value="Shockbreaker">Shockbreaker</option>
                        <option value="Perlampuan">Perlampuan</option>
                        <option value="Ecu">Ecu</option>
                    </select>
                </div>

                <!-- LAYOUT SWITCHER -->
                <div class="view-switcher">
                    <button class="view-btn active" data-view="details" title="Details View">
                        📄 Details
                    </button>
                    <button class="view-btn" data-view="tiles" title="Tiles View">
                        🔲 Tiles
                    </button>
                    <button class="view-btn" data-view="list" title="List View">
                        ☰ List
                    </button>
                    <button class="view-btn" data-view="content" title="Content View">
                        📑 Content
                    </button>
                </div>
            </div>

            <!-- CONTAINER PRODUK -->
            <div class="products-container mode-details" id="productsContainer">
                <div class="table-box">
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="adminProductTable">
                            @forelse($products as $product)
                                <tr class="product-item" data-category="{{ $product->kategori }}">
                                    <!-- TD PRODUK (FOTO + NAMA) -->
                                    <td class="td-produk">
                                        <div class="produk-item-flex">
                                            @if(!empty($product->foto))
                                                <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="img-produk">
                                            @elseif(!empty($product->gambar))
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" class="img-produk">
                                            @else
                                                <img src="https://via.placeholder.com/150?text=No+Image" alt="No Image" class="img-produk">
                                            @endif
                                            
                                            <span class="produk-nama">{{ $product->nama_produk }}</span>
                                        </div>
                                    </td>

                                    <!-- TD STOK -->
                                    <td class="td-stok">
                                        <div class="content-info">
                                            <label class="info-label">Stok</label>
                                            <span class="stok-val">{{ $product->stok }} pcs</span>
                                        </div>
                                    </td>

                                    <!-- TD HARGA -->
                                    <td class="td-harga">
                                        <div class="content-info">
                                            <label class="info-label">Harga</label>
                                            <span class="tile-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </td>

                                    <!-- TD KATEGORI -->
                                    <td class="td-kategori">
                                        <div class="content-info">
                                            <label class="info-label">Kategori</label>
                                            <span class="badge-kategori">{{ $product->kategori }}</span>
                                        </div>
                                    </td>

                                    <!-- TD AKSI -->
                                    <td class="td-aksi">
                                        <div class="tile-footer">
                                            <div class="aksi-group">
                                                <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="btn-edit" title="Edit">✏️</a>

                                                <button type="button" class="btn-hapus" title="Hapus" 
                                                        onclick="openDeleteModal('{{ url('/admin/products/' . $product->id) }}', '{{ $product->nama_produk }}')">
                                                    🗑️
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">Belum ada produk. Klik "Tambah Produk" untuk menambahkan.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if(method_exists($products, 'total'))
                        <div class="table-footer">
                            <span>Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
                            <div>{{ $products->links() }}</div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>

<!-- FORM HAPUS HIDDEN -->
<form id="customDeleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- MODAL POPUP KONFIRMASI HAPUS WEB -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">⚠️</div>
        <h4>Hapus Produk?</h4>
        <p>Apakah Anda yakin ingin menghapus <strong id="deleteProductName" style="color: #ffffff;"></strong>?</p>
        <div class="modal-actions">
            <button type="button" class="btn-batal" onclick="closeDeleteModal()">Batal</button>
            <button type="button" class="btn-konfirmasi-hapus" onclick="submitDelete()">Hapus</button>
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

    // 3. Layout Switcher Script (Details, Tiles, List, Content)
    const viewButtons = document.querySelectorAll('.view-btn');
    const productsContainer = document.getElementById('productsContainer');

    viewButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedView = this.getAttribute('data-view');
            productsContainer.className = 'products-container mode-' + selectedView;
        });
    });

    // 4. Interactive Search & Category Filter Script
    const searchInput = document.getElementById('adminSearchInput');
    const categoryFilter = document.getElementById('adminCategoryFilter');
    const tableRows = document.querySelectorAll('#adminProductTable tr.product-item');

    function filterProducts() {
        const searchText = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();

        tableRows.forEach(row => {
            const productNameEl = row.querySelector('.produk-nama');
            if (!productNameEl) return;

            const productName = productNameEl.innerText.toLowerCase();
            const productCategory = (row.getAttribute('data-category') || '').toLowerCase();

            const matchesSearch = productName.includes(searchText);
            const matchesCategory = selectedCategory === '' || productCategory === selectedCategory;

            if (matchesSearch && matchesCategory) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    if (searchInput && categoryFilter) {
        searchInput.addEventListener('input', filterProducts);
        categoryFilter.addEventListener('change', filterProducts);
    }

    // 5. Modal Konfirmasi Hapus Custom
    function openDeleteModal(actionUrl, productName) {
        document.getElementById('customDeleteForm').action = actionUrl;
        document.getElementById('deleteProductName').innerText = '"' + productName + '"';
        document.getElementById('deleteModal').classList.add('active');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('active');
    }

    function submitDelete() {
        document.getElementById('customDeleteForm').submit();
    }
</script>

</body>

</html>