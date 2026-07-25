<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Edit Produk</title>

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
            transition: background 0.2s, color 0.2s;
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
            border: 1px solid #262626;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .logout-box button:hover {
            background: #262626;
        }

        /* MAIN CONTENT */
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
            user-select: none;
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
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

        /* FORM STYLES */
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
            background: #121212;
            border: 1px solid #4b5563;
            color: #ffffff;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #dc2626;
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
            margin-bottom: 0;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .btn-simpan {
            background: #dc2626;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-simpan:hover {
            background: #b91c1c;
        }

        .btn-hapus {
            background: #262626;
            color: #ef4444;
            border: 1px solid #ef4444;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .btn-hapus:hover {
            background: #ef4444;
            color: #ffffff;
        }

        .link-kembali {
            color: #9ca3af;
            font-size: 14px;
            margin-left: auto;
            transition: color 0.2s;
        }

        .link-kembali:hover {
            color: #ffffff;
        }

        /* PRATINJAU GAMBAR */
        .current-image-preview {
            margin-bottom: 12px;
        }

        .current-image-preview p {
            font-size: 12px;
            color: #9ca3af;
            margin: 0 0 6px 0;
        }

        .current-image-preview img {
            max-width: 140px;
            max-height: 140px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #4b5563;
            display: block;
        }

        .help-text {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 6px;
        }

        /* MODAL POPUP KONFIRMASI HAPUS */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
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
            max-width: 420px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .modal-icon {
            font-size: 40px;
            margin-bottom: 12px;
        }

        .modal-box h4 {
            margin: 0 0 8px 0;
            font-size: 18px;
            color: #ffffff;
        }

        .modal-box p {
            font-size: 13px;
            color: #9ca3af;
            margin: 0 0 24px 0;
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
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            flex: 1;
            transition: background 0.2s;
        }

        .btn-batal:hover {
            background: #374151;
        }

        .btn-konfirmasi-hapus {
            background: #dc2626;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            flex: 1;
            transition: background 0.2s;
        }

        .btn-konfirmasi-hapus:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
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

        <!-- MAIN SECTION -->
        <div class="main">

            <!-- TOPBAR -->
            <div class="topbar">
                <div class="topbar-left">
                    <h2>Edit Produk</h2>
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

            <!-- CONTENT -->
            <div class="content">

                <h3>Edit Produk</h3>
                <p class="subtitle">Perbarui data produk {{ $product->nama_produk }}</p>

                <div class="form-box">

                    <!-- FORM EDIT PRODUK -->
                    <form action="{{ url('/admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" placeholder="Nama produk">
                            @error('nama_produk')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga (Rp)</label>
                            <input type="number" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" placeholder="Harga">
                            @error('harga')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" id="stok" name="stok" value="{{ old('stok', $product->stok) }}" placeholder="Jumlah stok">
                            @error('stok')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select id="kategori" name="kategori">
                                <option value="Knalpot" {{ old('kategori', $product->kategori) == 'Knalpot' ? 'selected' : '' }}>Knalpot</option>
                                <option value="Oli" {{ old('kategori', $product->kategori) == 'Oli' ? 'selected' : '' }}>Oli</option>
                                <option value="Master Rem" {{ old('kategori', $product->kategori) == 'Master Rem' ? 'selected' : '' }}>Master Rem</option>
                                <option value="Velg" {{ old('kategori', $product->kategori) == 'Velg' ? 'selected' : '' }}>Velg</option>
                                <option value="Kaliper" {{ old('kategori', $product->kategori) == 'Kaliper' ? 'selected' : '' }}>Kaliper</option>
                                <option value="Shockbreaker" {{ old('kategori', $product->kategori) == 'Shockbreaker' ? 'selected' : '' }}>Shockbreaker</option>
                                <option value="Perlampuan" {{ old('kategori', $product->kategori) == 'Perlampuan' ? 'selected' : '' }}>Perlampuan</option>
                                <option value="Ecu" {{ old('kategori', $product->kategori) == 'Ecu' ? 'selected' : '' }}>Ecu</option>
                            </select>
                            @error('kategori')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imageInput">Gambar Produk</label>

                            <div class="current-image-preview">
                                <p id="previewTitle">{{ $product->gambar ? 'Gambar saat ini:' : 'Pratinjau gambar:' }}</p>
                                <img id="imgPreview" src="{{ $product->gambar ? asset('storage/' . $product->gambar) : '' }}" alt="Foto Produk" style="{{ $product->gambar ? '' : 'display:none;' }}">
                            </div>

                            <input type="file" name="gambar" id="imageInput" accept="image/*">
                            <p class="help-text">*Biarkan kosong jika tidak ingin mengubah gambar.</p>

                            @error('gambar')
                                <p class="error-text">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-simpan">Update Produk</button>

                            <!-- Tombol untuk memicu Pop-Up Modal Konfirmasi Hapus -->
                            <button type="button" class="btn-hapus" onclick="openDeleteModal()">🗑 Hapus Produk</button>

                            <a href="{{ url('/admin/products') }}" class="link-kembali">← Kembali</a>
                        </div>
                    </form>

                    <!-- Form tersembunyi khusus untuk mengeksekusi HAPUS (DELETE) -->
                    <form id="deleteForm" action="{{ url('/admin/products/' . $product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- MODAL POPUP KONFIRMASI HAPUS -->
    <div class="modal-overlay" id="deleteModal" onclick="handleOverlayClick(event)">
        <div class="modal-box">
            <div class="modal-icon">⚠️</div>
            <h4>Konfirmasi Hapus</h4>
            <p>Apakah Anda yakin ingin menghapus produk <strong>"{{ $product->nama_produk }}"</strong>? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-actions">
                <button type="button" class="btn-batal" onclick="closeDeleteModal()">Tidak, Batal</button>
                <button type="button" class="btn-konfirmasi-hapus" onclick="submitDelete()">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // Dropdown Admin Menu Toggle
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

        // Live Image Preview saat Admin Upload File Baru
        const imageInput = document.getElementById('imageInput');
        const imgPreview = document.getElementById('imgPreview');
        const previewTitle = document.getElementById('previewTitle');

        if (imageInput) {
            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imgPreview.src = e.target.result;
                        imgPreview.style.display = 'block';
                        previewTitle.innerText = 'Pratinjau gambar baru:';
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Modal Konfirmasi Hapus Controls
        const deleteModal = document.getElementById('deleteModal');

        function openDeleteModal() {
            deleteModal.classList.add('active');
        }

        function closeDeleteModal() {
            deleteModal.classList.remove('active');
        }

        function handleOverlayClick(event) {
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        }

        function submitDelete() {
            document.getElementById('deleteForm').submit();
        }

        // Tutup modal jika menekan tombol Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && deleteModal.classList.contains('active')) {
                closeDeleteModal();
            }
        });
    </script>

</body>

</html>