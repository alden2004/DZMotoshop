<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Admin | DZ Motoshop</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    *{
        box-sizing:border-box;
    }

    body{
        font-family:Arial,sans-serif;
        background:#0a0a0a;
        color:#ffffff;
        margin:0;
    }

    a{
        text-decoration:none;
        color:inherit;
    }

    /* =========================
       NAVBAR
    ========================== */

    .navbar{
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:16px 40px;
        background:#0a0a0a;
        border-bottom:1px solid #1f1f1f;
        flex-wrap:wrap;
        gap:15px;
    }

    .navbar-left .logo{
        font-size:22px;
        font-weight:bold;
        margin:0;
    }

    .navbar-left .logo span{
        color:#dc2626;
    }

    .navbar-left .tagline{
        font-size:10px;
        color:#9ca3af;
        letter-spacing:1px;
        margin:2px 0 0;
    }

    .navbar-menu{
        display:flex;
        gap:24px;
        font-size:14px;
    }

    .navbar-menu a{
        color:#d1d5db;
        transition:.2s;
    }

    .navbar-menu a:hover{
        color:#ffffff;
    }

    .navbar-menu a.active{
        color:#ffffff;
        border-bottom:2px solid #dc2626;
        padding-bottom:4px;
    }

    .navbar-right{
        display:flex;
        align-items:center;
        gap:20px;
        position:relative;
    }

    .user-menu{
        display:flex;
        align-items:center;
        gap:8px;
        cursor:pointer;
    }

    .avatar{
        width:30px;
        height:30px;
        border-radius:50%;
        background:#374151;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:13px;
        font-weight:bold;
    }

    .user-dropdown{
        display:none;
        position:absolute;
        top:40px;
        right:0;
        background:#1b1b1b;
        border:1px solid #262626;
        border-radius:8px;
        min-width:170px;
        overflow:hidden;
        z-index:999;
    }

    .user-dropdown.show{
        display:block;
    }

    .user-dropdown a,
    .user-dropdown button{
        display:block;
        width:100%;
        padding:12px 14px;
        background:none;
        border:none;
        color:#d1d5db;
        text-align:left;
        cursor:pointer;
        font-size:13px;
    }

    .user-dropdown a:hover,
    .user-dropdown button{
        background:#262626;
    }

    /* =========================
       CONTENT
    ========================== */

    .page-wrapper{
        max-width:700px;
        margin:auto;
        padding:35px 20px 60px;
    }

    /* WHATSAPP/MODERN-STYLE PROFILE HEADER CARD */
    .wa-profile-header {
        background: #1b1b1b;
        border: 1px solid #262626;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        margin-bottom: 24px;
        position: relative;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .wa-avatar-container {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto 16px auto;
    }

    .wa-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid #dc2626;
        background: #374151;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        font-weight: bold;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(220, 38, 38, 0.2);
    }

    .wa-status-badge {
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 16px;
        height: 16px;
        background: #22c55e;
        border: 3px solid #1b1b1b;
        border-radius: 50%;
    }

    .wa-profile-name {
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 6px;
    }

    .wa-profile-email {
        font-size: 13px;
        color: #9ca3af;
        margin-bottom: 4px;
    }

    .wa-profile-bio {
        font-size: 12px;
        color: #6b7280;
        font-style: italic;
    }

    .profile-stack{
        display:flex;
        flex-direction:column;
        gap:20px;
    }

    .profile-card{
        background:#1b1b1b;
        border:1px solid #262626;
        border-radius:12px;
        padding:25px;
    }

    @media(max-width:700px){
        .navbar{
            padding:15px 20px;
        }

        .navbar-menu{
            display:none;
        }

        .page-wrapper{
            padding:20px;
        }
    }

    </style>

</head>

<body>

<div class="navbar">
    <div class="navbar-left">
        <p class="logo">
            <span>DZ</span>Motoshop
        </p>
        <p class="tagline">
            ADMIN PANEL
        </p>
    </div>

    <div class="navbar-menu">
        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
        <a href="{{ url('/admin/products') }}">
            Produk
        </a>
        <a href="{{ route('admin.orders.index') }}">
            Pesanan
        </a>
        <a href="{{ route('admin.settings.index') }}">
            Pengaturan
        </a>
    </div>

    <div class="navbar-right">
        <div class="user-menu" id="userMenuToggle">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <span>
                {{ Auth::user()->name }}
            </span>

            <div class="user-dropdown" id="userDropdown">
                <a href="{{ route('admin.dashboard') }}">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-wrapper">

    {{-- KARTU HEADER PROFIL ADMIN (Gaya Modern) --}}
    <div class="wa-profile-header">
        <div class="wa-avatar-container">
            <div class="wa-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="wa-status-badge" title="Administrator Online"></div>
        </div>
        <div class="wa-profile-name">{{ Auth::user()->name }}</div>
        <div class="wa-profile-email">{{ Auth::user()->email }}</div>
        <div class="wa-profile-bio">"Panel Kontrol Administrator DZ Motoshop"</div>
    </div>

    <div class="profile-stack">

        <!-- Informasi Profil -->
        <div class="profile-card">
            @include('admin.profile.partials.update-profile-information-form')
        </div>

        <!-- Password -->
        <div class="profile-card">
            @include('admin.profile.partials.update-password-form')
        </div>

        <!-- Hapus Akun -->
        <div class="profile-card">
            @include('admin.profile.partials.delete-user-form')
        </div>

    </div>

</div>

<script>
const userMenuToggle = document.getElementById('userMenuToggle');
const userDropdown = document.getElementById('userDropdown');

if(userMenuToggle && userDropdown){
    userMenuToggle.addEventListener('click', function(e){
        e.stopPropagation();
        userDropdown.classList.toggle('show');
    });

    document.addEventListener('click', function(e){
        if(!userMenuToggle.contains(e.target)){
            userDropdown.classList.remove('show');
        }
    });
}
</script>

</body>
</html>