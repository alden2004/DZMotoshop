<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | DZ Motoshop</title>

    <style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body{
        background: #0a0a0a;
        color: #ffffff;
    }

    a{
        text-decoration: none;
        color: inherit;
    }

    /* NAVBAR */
    .navbar{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 40px;
        background: #0a0a0a;
        border-bottom: 1px solid #1f1f1f;
        flex-wrap: wrap;
        gap: 15px;
    }

    .navbar-left .logo{
        font-size: 22px;
        font-weight: bold;
        margin: 0;
    }

    .navbar-left .logo span{
        color: #dc2626;
    }

    .navbar-left .tagline{
        font-size: 10px;
        color: #9ca3af;
        letter-spacing: 1px;
        margin: 2px 0 0;
    }

    .navbar-menu{
        display: flex;
        gap: 24px;
        font-size: 14px;
    }

    .navbar-menu a{
        color: #d1d5db;
    }

    .navbar-menu a.active{
        color: #ffffff;
        border-bottom: 2px solid #dc2626;
        padding-bottom: 4px;
    }

    .navbar-right{
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 14px;
        position: relative;
    }

    .navbar-right .cart-icon{
        font-size: 18px;
    }

    .user-menu{
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .user-menu .avatar{
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #374151;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }

    .user-dropdown{
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

    .user-dropdown.show{
        display: block;
    }

    .user-dropdown a, .user-dropdown button{
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

    .user-dropdown a:hover, .user-dropdown button:hover{
        background: #262626;
    }

    /* CONTACT LAYOUT */
    .contact-wrapper{
        display: flex;
        gap: 40px;
        padding: 50px 40px 60px;
        flex-wrap: wrap;
    }

    .contact-text{
        flex: 1;
        min-width: 300px;
    }

    .contact-label{
        color: #dc2626;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .contact-text h1{
        font-size: 34px;
        line-height: 1.2;
        color: #dc2626;
        margin-bottom: 16px;
    }

    .contact-text p{
        color: #bdbdbd;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 26px;
        max-width: 400px;
    }

    .contact-info-list{
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-width: 400px;
    }

    .contact-info-item{
        display: flex;
        align-items: center;
        gap: 12px;
        background: #141414;
        border: 1px solid #262626;
        border-radius: 8px;
        padding: 14px 16px;
        font-size: 13px;
    }

    .contact-info-item .icon{
        color: #dc2626;
        font-size: 16px;
        flex-shrink: 0;
    }

    /* RIGHT SIDE */
    .contact-right{
        flex: 1;
        min-width: 320px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .contact-image{
        min-height: 260px;
        border-radius: 16px;
        background-image: linear-gradient(90deg, rgba(0,0,0,0.75) 15%, rgba(0,0,0,0.15) 70%), url('/images/hero-motor.png');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-start;
        padding: 26px;
    }

    .contact-image .brand{
        font-size: 22px;
        font-weight: bold;
    }

    .contact-image .brand span{
        color: #dc2626;
    }

    .contact-image .brand-tagline{
        font-size: 10px;
        color: #d1d5db;
        letter-spacing: 1px;
        margin-top: 4px;
    }

    /* FULL MAP BOX (REPLACES FORM & SMALL MAP) */
    .map-container-box{
        width: 100%;
        height: 380px;
        background: #141414;
        border: 1px solid #262626;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .map-header {
        padding: 14px 18px;
        background: #1a1a1a;
        border-bottom: 1px solid #262626;
        font-size: 13px;
        font-weight: bold;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .map-header span {
        color: #dc2626;
    }

    .map-iframe-wrapper {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .map-iframe-wrapper iframe {
        width: 100%;
        height: 100%;
        border: 0;
        /* Filter agar google maps terlihat menyatu dengan tema gelap */
        filter: grayscale(20%) invert(90%) hue-rotate(180deg) brightness(95%) contrast(90%);
    }

    @media (max-width: 600px){
        .navbar{
            padding: 12px 20px;
        }
        .navbar-menu{
            display: none;
        }
        .contact-wrapper{
            padding: 30px 20px;
        }
        .contact-text h1{
            font-size: 26px;
        }
        .map-container-box {
            height: 300px;
        }
    }

    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <div class="navbar">

        <div class="navbar-left">
            <p class="logo" id="navLogoUser"><span>DZ</span>Motoshop</p>
            <p class="tagline" id="navTaglineUser">BEST QUALITY FOR YOU RIDE</p>
        </div>

        <div class="navbar-menu">
            <a href="{{ auth()->check() ? url('/dashboard') : url('/') }}">Home</a>
            <a href="{{ url('/products') }}">Produk</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('contact') }}" class="active">Kontak</a>
        </div>

        <div class="navbar-right">

            <a href="{{ route('cart') }}" class="cart-icon">🛒</a>

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

    {{-- CONTACT CONTENT --}}
    <div class="contact-wrapper">

        {{-- LEFT: TEXT + INFO --}}
        <div class="contact-text">

            <p class="contact-label">/// Kontak Kami</p>

            <h1>HUBUNGI<br>KAMI</h1>

            <p>
                Kami siap membantu anda untuk menjawab pertanyaan, memberikan
                informasi, atau melayani kebutuhan anda. Jangan ragu untuk
                menghubungi kami
            </p>

            <div class="contact-info-list">

                <div class="contact-info-item">
                    <span class="icon">📍</span>
                    <span id="userLokasi">Jalan Raya A.Yani No.12, Pati, Indonesia</span>
                </div>

                <div class="contact-info-item">
                    <span class="icon">📞</span>
                    <span id="userTlp">0812-3110-2856</span>
                </div>

                <div class="contact-info-item">
                    <span class="icon">✉️</span>
                    <span id="userEmail">DZMotoshop@gmail.com</span>
                </div>

                <div class="contact-info-item">
                    <span class="icon">🕒</span>
                    <span id="userJamOperasional">Senin - Sabtu: 08.00 - 17.00 WIB</span>
                </div>

            </div>

        </div>

        {{-- RIGHT: IMAGE + FULL MAPS --}}
        <div class="contact-right">

            <div class="contact-image">
                <div>
                    <p class="brand" id="bannerLogoUser"><span>DZ</span>Motoshop</p>
                    <p class="brand-tagline" id="bannerTaglineUser">BEST QUALITY FOR YOU RIDE</p>
                </div>
            </div>

            {{-- MAPS SECTION PANJANG --}}
            <div class="map-container-box">
                <div class="map-header">
                    <span>📍</span> Lokasi Bengkel Kami di Peta
                </div>
                <div class="map-iframe-wrapper">
                    <!-- Google Maps Embed dengan penyesuaian lokasi Pati, Indonesia -->
                    <iframe id="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d111.041687!3d-6.752395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d24123456789%3A0x123456789abcdef!2sPati%2C%2County%2C%20Central%20Java!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>

    </div>

    <script>
        // Toggle User Dropdown
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

        // --- BACA DATA PENGATURAN DARI LOCALSTORAGE ---
        const STORAGE_KEY = 'dz_motoshop_settings';

        function loadUserSettings() {
            const saved = localStorage.getItem(STORAGE_KEY);
            
            // Nilai Default jika LocalStorage masih kosong
            const data = saved ? JSON.parse(saved) : {
                namaTokoUser: 'Dz Motoshop',
                bioTokoUser: 'BEST QUALITY FOR YOU RIDE',
                lokasiToko: 'Jalan Raya A.Yani No.12, Pati, Indonesia',
                tlpToko: '0812-3110-2856',
                emailToko: 'DZMotoshop@gmail.com',
                jamOperasional: 'Senin - Sabtu: 08.00 - 17.00 WIB'
            };

            // Helper untuk merender logo dengan warna merah di kata pertama
            function renderLogo(elementId, text) {
                const el = document.getElementById(elementId);
                if (el && text) {
                    const parts = text.split(' ');
                    if (parts.length > 1) {
                        el.innerHTML = `<span>${parts[0]}</span> ${parts.slice(1).join(' ')}`;
                    } else {
                        el.innerHTML = `<span>${text.substring(0,2)}</span>${text.substring(2)}`;
                    }
                }
            }

            // Update Navbar Logo & Bio/Tagline User
            renderLogo('navLogoUser', data.namaTokoUser);
            if (document.getElementById('navTaglineUser')) {
                document.getElementById('navTaglineUser').textContent = data.bioTokoUser || '';
            }

            // Update Banner Image Logo & Tagline User
            renderLogo('bannerLogoUser', data.namaTokoUser);
            if (document.getElementById('bannerTaglineUser')) {
                document.getElementById('bannerTaglineUser').textContent = data.bioTokoUser || '';
            }

            // Update Informasi Kontak (Lokasi, TLP, Email, Jam Operasional)
            if (document.getElementById('userLokasi')) {
                document.getElementById('userLokasi').textContent = data.lokasiToko || '';
            }
            if (document.getElementById('userTlp')) {
                document.getElementById('userTlp').textContent = data.tlpToko || '';
            }
            if (document.getElementById('userEmail')) {
                document.getElementById('userEmail').textContent = data.emailToko || '';
            }
            if (document.getElementById('userJamOperasional')) {
                document.getElementById('userJamOperasional').textContent = data.jamOperasional || '';
            }

            // Update dynamic search query ke Google Maps Iframe jika lokasi berubah
            if (data.lokasiToko) {
                const mapFrame = document.getElementById('mapFrame');
                if (mapFrame) {
                    mapFrame.src = `https://maps.google.com/maps?q=${encodeURIComponent(data.lokasiToko)}&t=&z=15&ie=UTF8&iwloc=&output=embed`;
                }
            }
        }

        // Panggil fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', loadUserSettings);
    </script>

</body>

</html>