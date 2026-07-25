<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ Motoshop Admin - Pengaturan</title>

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

        /* SETTINGS BOX */
        .settings-box {
            background: #1b1b1b;
            border: 1px solid #262626;
            border-radius: 12px;
            padding: 24px 28px;
            max-width: 700px;
        }

        .settings-box .box-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 4px;
        }

        .settings-box .box-subtitle {
            margin: 0 0 20px;
            color: #9ca3af;
            font-size: 13px;
        }

        hr {
            border: none;
            border-top: 1px solid #262626;
            margin: 20px 0;
        }

        .alert-success {
            display: none;
            background: #15803d;
            color: #ffffff;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 18px;
        }

        .form-row label {
            width: 180px;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .form-row input {
            flex: 1;
            padding: 10px 12px;
            background: #0d0d0d;
            border: 1px solid #4b5563;
            color: #ffffff;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-row input:focus {
            outline: none;
            border-color: #dc2626;
        }

        .form-row input::placeholder {
            color: #6b7280;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
        }

        .btn-simpan {
            background: #dc2626;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background: #b91c1c;
        }

        .footer-note {
            text-align: center;
            color: #6b7280;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }
            .form-row label {
                width: auto;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-top">
            <div class="logo">
                <h1 id="sidebarLogoAdmin"><span>DZ</span>Motoshop</h1>
                <p id="sidebarBioAdmin">ADMIN PANEL</p>
            </div>

            <div class="menu">
                <a href="{{ url('/admin/dashboard') }}">
                    <span>🏠</span> <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ url('/admin/orders') }}">
                    <span>🛒</span> <span class="menu-text">Pesanan</span>
                </a>
                <a href="{{ url('/admin/products') }}">
                    <span>📦</span> <span class="menu-text">Produk</span>
                </a>
                <a href="{{ url('/admin/settings') }}" class="active">
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
                <h2>Pengaturan</h2>
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

            <div class="settings-box">

                <p class="box-title">⚙️ Pengaturan Toko</p>
                <p class="box-subtitle">Kelola informasi identitas toko untuk tampilan Admin dan User</p>

                <div id="alertSuccess" class="alert-success">
                    ✅ Perubahan berhasil disimpan!
                </div>

                <hr>

                <form id="formSettings">
                    <div class="form-row">
                        <label>Nama Toko (Admin)</label>
                        <input type="text" id="namaTokoAdmin" value="Dz Motoshop">
                    </div>

                    <div class="form-row">
                        <label>Bio Toko (Admin)</label>
                        <input type="text" id="bioTokoAdmin" value="Admin Panel">
                    </div>

                    <div class="form-row">
                        <label>Nama Toko (User)</label>
                        <input type="text" id="namaTokoUser" value="Dz Motoshop">
                    </div>

                    <div class="form-row">
                        <label>Bio Toko (User)</label>
                        <input type="text" id="bioTokoUser" value="BEST QUALITY FOR YOU RIDE">
                    </div>

                    <div class="form-row">
                        <label>Lokasi</label>
                        <input type="text" id="lokasiToko" value="Jalan Raya A.Yani No.12, Pati, Indonesia">
                    </div>

                    <div class="form-row">
                        <label>No. TLP</label>
                        <input type="text" id="tlpToko" value="0812-3110-2856">
                    </div>

                    <div class="form-row">
                        <label>Email</label>
                        <input type="email" id="emailToko" value="DZMotoshop@gmail.com">
                    </div>

                    <div class="form-row">
                        <label>Jam Operasional</label>
                        <input type="text" id="jamOperasional" value="Senin - Sabtu: 08.00 - 17.00 WIB">
                    </div>

                    <hr>

                    <div class="form-actions">
                        <button type="submit" class="btn-simpan">
                            💾 Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>

            <p class="footer-note">© {{ date('Y') }} DZ Motoshop. All rights reserved.</p>

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

    // 2. Toggle Dropdown Profile
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

    // Key untuk LocalStorage
    const STORAGE_KEY = 'dz_motoshop_settings';

    // Nilai Default
    const defaultSettings = {
        namaTokoAdmin: 'Dz Motoshop',
        bioTokoAdmin: 'ADMIN PANEL',
        namaTokoUser: 'Dz Motoshop',
        bioTokoUser: 'BEST QUALITY FOR YOU RIDE',
        lokasiToko: 'Jalan Raya A.Yani No.12, Pati, Indonesia',
        tlpToko: '0812-3110-2856',
        emailToko: 'DZMotoshop@gmail.com',
        jamOperasional: 'Senin - Sabtu: 08.00 - 17.00 WIB'
    };

    // Fungsi Memuat Data dari LocalStorage
    function loadSettings() {
        const saved = localStorage.getItem(STORAGE_KEY);
        const data = saved ? JSON.parse(saved) : defaultSettings;

        document.getElementById('namaTokoAdmin').value = data.namaTokoAdmin || defaultSettings.namaTokoAdmin;
        document.getElementById('bioTokoAdmin').value = data.bioTokoAdmin || defaultSettings.bioTokoAdmin;
        document.getElementById('namaTokoUser').value = data.namaTokoUser || defaultSettings.namaTokoUser;
        document.getElementById('bioTokoUser').value = data.bioTokoUser || defaultSettings.bioTokoUser;
        document.getElementById('lokasiToko').value = data.lokasiToko || defaultSettings.lokasiToko;
        document.getElementById('tlpToko').value = data.tlpToko || defaultSettings.tlpToko;
        document.getElementById('emailToko').value = data.emailToko || defaultSettings.emailToko;
        document.getElementById('jamOperasional').value = data.jamOperasional || defaultSettings.jamOperasional;

        // Update tampilan sidebar admin
        updateSidebarAdmin(data.namaTokoAdmin, data.bioTokoAdmin);
    }

    // Fungsi Update Tampilan Logo Sidebar Admin
    function updateSidebarAdmin(nama, bio) {
        const logoEl = document.getElementById('sidebarLogoAdmin');
        const bioEl = document.getElementById('sidebarBioAdmin');

        if (logoEl && nama) {
            // Pisahkan 2 huruf depan untuk efek warna merah
            const parts = nama.split(' ');
            if (parts.length > 1) {
                logoEl.innerHTML = `<span>${parts[0]}</span> ${parts.slice(1).join(' ')}`;
            } else {
                logoEl.innerHTML = `<span>${nama.substring(0,2)}</span>${nama.substring(2)}`;
            }
        }
        if (bioEl && bio) {
            bioEl.textContent = bio.toUpperCase();
        }
    }

    // Simpan Data
    document.getElementById('formSettings').addEventListener('submit', function (e) {
        e.preventDefault();

        const dataToSave = {
            namaTokoAdmin: document.getElementById('namaTokoAdmin').value,
            bioTokoAdmin: document.getElementById('bioTokoAdmin').value,
            namaTokoUser: document.getElementById('namaTokoUser').value,
            bioTokoUser: document.getElementById('bioTokoUser').value,
            lokasiToko: document.getElementById('lokasiToko').value,
            tlpToko: document.getElementById('tlpToko').value,
            emailToko: document.getElementById('emailToko').value,
            jamOperasional: document.getElementById('jamOperasional').value
        };

        localStorage.setItem(STORAGE_KEY, JSON.stringify(dataToSave));
        updateSidebarAdmin(dataToSave.namaTokoAdmin, dataToSave.bioTokoAdmin);

        // Tampilkan Notifikasi Sukses
        const alertBox = document.getElementById('alertSuccess');
        alertBox.style.display = 'block';
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000);
    });

    // Jalankan pemuatan data saat halaman selesai di-load
    document.addEventListener('DOMContentLoaded', loadSettings);
</script>

</body>

</html>