<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Tambah Produk</title>

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
            gap: 12px;
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

        .admin-dropdown a,
        .admin-dropdown button {
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

        .admin-dropdown a:hover,
        .admin-dropdown button:hover {
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

        /* FORM */
        .form-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 30px;
            max-width: 560px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #d1d5db;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            background: transparent;
            border: 1px solid #4b5563;
            color: #ffffff;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #6b7280;
        }

        .form-group select option {
            background: #1b1b1b;
            color: #ffffff;
        }

        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 10px;
        }

        .btn-simpan {
            background: #dc2626;
            color: #ffffff;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background: #b91c1c;
        }

        .link-kembali {
            color: #9ca3af;
            font-size: 14px;
        }

        .link-kembali:hover {
            color: #ffffff;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="sidebar">

            <div class="sidebar-top">

                <div class="logo">
                    <h1><span>DZ</span>Motoshop</h1>
                    <p>ADMIN PANEL</p>
                </div>

                <div class="menu">
                    <a href="{{ url('/admin/dashboard') }}">🏠 Dashboard</a>
                    <a href="{{ url('/admin/orders') }}">🛒 Pesanan</a>
                    <a href="{{ url('/admin/products') }}" class="active">📦 Produk</a>
                    <a href="{{ url('/admin/settings') }}">⚙️ Pengaturan</a>
                </div>

            </div>

            <div class="logout-box">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">↩ Keluar</button>
                </form>
            </div>

        </div>

        <div class="main">

            <div class="topbar">

                <div class="topbar-left">
                    <h2>Tambah Produk</h2>
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

                            <a href="{{ url('/admin/products') }}">
                                ← Kembali
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="content">

                <h3>Tambah Produk</h3>
                <p class="subtitle">Tambahkan produk baru ke toko DZ Motoshop</p>

                <div class="form-box">

                    <form action="{{ url('/admin/products') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Nama produk">
                            @error('nama_produk')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Harga">
                            @error('harga')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" value="{{ old('stok') }}" placeholder="Jumlah stok">
                            @error('stok')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori">
                                <option value="Knalpot" {{ old('kategori') == 'Knalpot' ? 'selected' : '' }}>Knalpot</option>
                                <option value="Oli" {{ old('kategori') == 'Oli' ? 'selected' : '' }}>Oli</option>
                                <option value="Master Rem" {{ old('kategori') == 'Master Rem' ? 'selected' : '' }}>Master Rem</option>
                                <option value="Velg" {{ old('kategori') == 'Velg' ? 'selected' : '' }}>Velg</option>
                                <option value="Kaliper" {{ old('kategori') == 'Kaliper' ? 'selected' : '' }}>Kaliper</option>
                                <option value="Shockbreaker" {{ old('kategori') == 'Shockbreaker' ? 'selected' : '' }}>Shockbreaker</option>
                                <option value="Perlampuan" {{ old('kategori') == 'Perlampuan' ? 'selected' : '' }}>Perlampuan</option>
                                <option value="Ecu" {{ old('kategori') == 'Ecu' ? 'selected' : '' }}>Ecu</option>
                            </select>
                            @error('kategori')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="5" placeholder="Deskripsi produk">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" name="gambar" accept="image/*">
                            @error('gambar')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-simpan">Simpan Produk</button>
                            <a href="{{ url('/admin/products') }}" class="link-kembali">← Kembali</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
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
    </script>

</body>

</html>