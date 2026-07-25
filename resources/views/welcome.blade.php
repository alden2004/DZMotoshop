<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DZ Motoshop | Selamat Datang</title>

    <style>

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body{
        font-family: Arial, sans-serif;
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
        padding: 18px 40px;
        border-bottom: 1px solid #1f1f1f;
    }

    .navbar .logo{
        font-size: 22px;
        font-weight: bold;
    }

    .navbar .logo span{
        color: #dc2626;
    }

    .navbar .tagline{
        font-size: 10px;
        color: #9ca3af;
        letter-spacing: 1px;
        margin-top: 2px;
    }

    .navbar-actions{
        display: flex;
        gap: 12px;
    }

    .btn-outline{
        border: 1px solid #4b5563;
        color: #fff;
        padding: 9px 20px;
        border-radius: 8px;
        font-size: 13px;
    }

    .btn-outline:hover{
        background: #1b1b1b;
    }

    .btn-solid{
        background: #dc2626;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: bold;
    }

    .btn-solid:hover{
        background: #b91c1c;
    }

    /* HERO */
    .hero{
        position: relative;
        min-height: 520px;
        background-image: linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.9) 100%), url('/images/hero-motor.png');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 20px;
    }

    .hero .badge{
        background: #1b1b1b;
        border: 1px solid #dc2626;
        color: #dc2626;
        font-size: 12px;
        font-weight: bold;
        padding: 6px 14px;
        border-radius: 20px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .hero h1{
        font-size: 46px;
        line-height: 1.2;
        max-width: 700px;
        margin-bottom: 18px;
    }

    .hero h1 span{
        color: #dc2626;
    }

    .hero p{
        color: #d1d5db;
        font-size: 15px;
        max-width: 500px;
        margin-bottom: 30px;
    }

    .hero-cta{
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-hero-primary{
        background: #dc2626;
        color: #fff;
        padding: 14px 30px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 15px;
    }

    .btn-hero-primary:hover{
        background: #b91c1c;
    }

    .btn-hero-secondary{
        border: 1px solid #ffffff;
        color: #fff;
        padding: 14px 30px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 15px;
    }

    .btn-hero-secondary:hover{
        background: #1b1b1b;
    }

    /* FEATURES */
    .features-section{
        padding: 60px 40px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .features-title{
        text-align: center;
        margin-bottom: 40px;
    }

    .features-title p.label{
        color: #dc2626;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .features-title h2{
        font-size: 28px;
    }

    .features-grid{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .feature-card{
        background: #141414;
        border: 1px solid #262626;
        border-radius: 12px;
        padding: 28px 20px;
        text-align: center;
    }

    .feature-icon{
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: #1b1b1b;
        border: 1px solid #dc2626;
        color: #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin: 0 auto 16px;
    }

    .feature-card h3{
        font-size: 16px;
        margin-bottom: 8px;
    }

    .feature-card p{
        color: #9ca3af;
        font-size: 13px;
        line-height: 1.6;
    }

    /* STATS BAR */
    .stats-bar{
        display: flex;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
        padding: 40px 20px;
        border-top: 1px solid #1f1f1f;
        border-bottom: 1px solid #1f1f1f;
    }

    .stat-block{
        text-align: center;
    }

    .stat-block .stat-number{
        color: #dc2626;
        font-size: 28px;
        font-weight: bold;
    }

    .stat-block .stat-label{
        color: #9ca3af;
        font-size: 12px;
        margin-top: 4px;
    }

    /* BOTTOM CTA */
    .bottom-cta{
        text-align: center;
        padding: 70px 20px;
    }

    .bottom-cta h2{
        font-size: 26px;
        margin-bottom: 12px;
    }

    .bottom-cta p{
        color: #9ca3af;
        font-size: 14px;
        margin-bottom: 26px;
    }

    /* FOOTER */
    .footer{
        text-align: center;
        color: #6b7280;
        font-size: 12px;
        padding: 20px;
        border-top: 1px solid #1f1f1f;
    }

    @media (max-width: 768px){
        .navbar{
            padding: 14px 20px;
        }
        .hero h1{
            font-size: 30px;
        }
        .features-section{
            padding: 40px 20px;
        }
        .features-grid{
            grid-template-columns: 1fr;
        }
        .stats-bar{
            gap: 30px;
        }
    }

    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <div class="navbar">

        <div>
            <p class="logo"><span>DZ</span>Motoshop</p>
            <p class="tagline">BEST QUALITY FOR YOU RIDE</p>
        </div>

        <div class="navbar-actions">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-solid">Masuk ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline">Masuk</a>
                <a href="{{ route('register') }}" class="btn-solid">Daftar Sekarang</a>
            @endauth
        </div>

    </div>

    {{-- HERO --}}
    <div class="hero">

        <p class="badge">✦ TOKO AKSESORIS MOTOR TERPERCAYA</p>

        <h1>Selamat Datang di <span>DZ Motoshop</span></h1>

        <p>
            Temukan berbagai aksesoris motor berkualitas dengan harga terbaik.
            Gabung sekarang dan nikmati kemudahan belanja untuk motor kesayanganmu.
        </p>

        <div class="hero-cta">

            @auth
                <a href="{{ url('/dashboard') }}" class="btn-hero-primary">Mulai Belanja →</a>
            @else
                <a href="{{ route('register') }}" class="btn-hero-primary">Daftar Sekarang →</a>
                <a href="{{ route('login') }}" class="btn-hero-secondary">Sudah Punya Akun? Masuk</a>
            @endauth

        </div>

    </div>

    {{-- FEATURES --}}
    <div class="features-section">

        <div class="features-title">
            <p class="label">/// KENAPA PILIH KAMI</p>
            <h2>Belanja Aman, Cepat, dan Terpercaya</h2>
        </div>

        <div class="features-grid">

            <div class="feature-card">
                <div class="feature-icon">✅</div>
                <h3>Produk Original</h3>
                <p>Semua produk yang kami jual dijamin 100% asli dan bergaransi resmi.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Transaksi Aman</h3>
                <p>Sistem pembayaran terenkripsi dan terpercaya untuk melindungi setiap transaksi kamu.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>Layanan 24/7</h3>
                <p>Tim customer service kami siap membantu kapan saja kamu membutuhkan.</p>
            </div>

        </div>

    </div>

    {{-- STATS --}}
    <div class="stats-bar">

        <div class="stat-block">
            <p class="stat-number">500+</p>
            <p class="stat-label">Produk</p>
        </div>

        <div class="stat-block">
            <p class="stat-number">200K+</p>
            <p class="stat-label">Pelanggan</p>
        </div>

        <div class="stat-block">
            <p class="stat-number">99%</p>
            <p class="stat-label">Kepuasan</p>
        </div>

    </div>

    {{-- BOTTOM CTA --}}
    <div class="bottom-cta">

        <h2>Siap Lengkapi Motor Kesayanganmu?</h2>
        <p>Daftar sekarang dan dapatkan pengalaman belanja aksesoris motor terbaik.</p>

        @auth
            <a href="{{ url('/dashboard') }}" class="btn-hero-primary">Mulai Belanja →</a>
        @else
            <a href="{{ route('register') }}" class="btn-hero-primary">Daftar Gratis Sekarang →</a>
        @endauth

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        © {{ date('Y') }} DZ Motoshop. All rights reserved.
    </div>

</body>

</html>