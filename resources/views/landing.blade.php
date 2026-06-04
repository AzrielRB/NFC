<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurul Fried Chicken — Ayam Goreng Nikmat</title>
    <link rel="icon" href="{{ asset('images/logo2.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ===== Reset & Base ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --red: #C62828;
            --red-dark: #A31F1F;
            --red-light: #EF5350;
            --gold: #FFB300;
            --gold-light: #FFE082;
            --dark: #1A1A2E;
            --text: #333333;
            --text-light: #666666;
            --bg: #FAFAFA;
            --white: #FFFFFF;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
            --shadow-lg: 0 8px 30px rgba(0,0,0,0.12);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: var(--bg);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== Navbar ===== */
        .navbar {
            background: var(--red);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(198, 40, 40, 0.35);
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
            height: 64px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            font-weight: 800;
            font-size: 22px;
        }

        .navbar-brand i {
            font-size: 26px;
            color: var(--gold);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .navbar-nav a {
            color: rgba(255,255,255,0.85);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-nav a:hover,
        .navbar-nav a.active {
            background: rgba(255,255,255,0.15);
            color: var(--white);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-login {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            background: var(--white);
            color: var(--red);
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-login:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 22px;
            cursor: pointer;
            padding: 6px;
        }

        /* ===== Hero ===== */
        .hero {
            background: linear-gradient(135deg, var(--red) 0%, var(--red-dark) 60%, #7B1818 100%);
            padding: 140px 0 80px;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 60px;
            background: var(--bg);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            backdrop-filter: blur(4px);
        }

        .hero-badge i { color: var(--gold); }

        .hero h1 {
            font-size: 48px;
            font-weight: 900;
            line-height: 1.15;
            margin-bottom: 20px;
            color: var(--gold);
        }

        .hero h1 span { color: var(--gold); }

        .hero p {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 32px;
            max-width: 500px;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-hero-primary {
            background: var(--gold);
            color: var(--dark);
        }

        .btn-hero-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 179, 0, 0.4);
        }

        .btn-hero-outline {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255,255,255,0.4);
        }

        .btn-hero-outline:hover {
            border-color: var(--white);
            background: rgba(255,255,255,0.1);
        }

        .hero-image {
            flex: 0 0 400px;
            text-align: center;
        }

        .hero-emoji {
            font-size: 200px;
            line-height: 1;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* ===== Section Styles ===== */
        .section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 32px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .section-header h2 span { color: var(--red); }

        .section-header p {
            font-size: 16px;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-divider {
            width: 60px;
            height: 4px;
            background: var(--red);
            border-radius: 2px;
            margin: 16px auto 0;
        }

        /* ===== Menu Section ===== */
        .menu-section { background: var(--white); }

        .menu-tabs {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .menu-tab {
            padding: 10px 24px;
            border: 2px solid var(--red);
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: transparent;
            color: var(--red);
            font-family: inherit;
        }

        .menu-tab:hover,
        .menu-tab.active {
            background: var(--red);
            color: var(--white);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
        }

        .menu-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #F0F0F0;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
        }

        .menu-card-icon {
            height: 250px;
            background: linear-gradient(135deg, #FFF3E0, #FFE0B2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }

        .menu-card-body {
            padding: 20px;
        }

        .menu-card-kategori {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }

        .kat-makanan { background: #FFEBEE; color: var(--red); }
        .kat-minuman { background: #E3F2FD; color: #1565C0; }
        .kat-paket { background: #F3E5F5; color: #7B1FA2; }
        .kat-lainnya { background: #F5F5F5; color: #616161; }

        .menu-card h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .menu-card-price {
            font-size: 20px;
            font-weight: 800;
            color: var(--red);
        }

        .menu-card-price small {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-light);
        }

        /* ===== Cabang Section ===== */
        .cabang-section {
            background: var(--bg);
        }

        .cabang-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
        }

        .cabang-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 28px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--red);
        }

        .cabang-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .cabang-card h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cabang-card h4 i {
            color: var(--red);
        }

        .cabang-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .cabang-info-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: var(--text-light);
        }

        .cabang-info-item i {
            color: var(--red);
            margin-top: 3px;
            width: 16px;
            text-align: center;
        }

        /* ===== Sejarah Section ===== */
        .sejarah-section { background: var(--white); }

        .sejarah-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .sejarah-text {
            flex: 1;
        }

        .sejarah-text p {
            font-size: 15px;
            color: var(--text-light);
            line-height: 1.9;
            margin-bottom: 16px;
        }

        .sejarah-image {
            flex: 0 0 300px;
            text-align: center;
            font-size: 150px;
            line-height: 1;
        }

        .sejarah-stats {
            display: flex;
            gap: 30px;
            margin-top: 24px;
        }

        .sejarah-stat {
            text-align: center;
        }

        .sejarah-stat .number {
            font-size: 32px;
            font-weight: 800;
            color: var(--red);
        }

        .sejarah-stat .label {
            font-size: 13px;
            color: var(--text-light);
            font-weight: 500;
        }

        /* ===== Visi Misi Section ===== */
        .visimisi-section { background: var(--bg); }

        .visimisi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .visimisi-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 36px;
            transition: all 0.3s ease;
        }

        .visimisi-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .visimisi-card .card-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 24px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(198, 40, 40, 0.3);
        }

        .visimisi-card h4 {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 14px;
        }

        .visimisi-card p {
            font-size: 15px;
            color: var(--text-light);
            line-height: 1.8;
        }

        .visimisi-card ul {
            list-style: none;
            margin-top: 8px;
        }

        .visimisi-card ul li {
            font-size: 14px;
            color: var(--text-light);
            padding: 6px 0;
            padding-left: 20px;
            position: relative;
            line-height: 1.7;
        }

        .visimisi-card ul li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--red);
            font-size: 12px;
        }

        /* ===== About Section ===== */
        .about-section { background: var(--white); }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .about-card {
            text-align: center;
            padding: 36px 24px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .about-card:hover {
            background: var(--bg);
            transform: translateY(-4px);
        }

        .about-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--red), var(--red-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--white);
            font-size: 28px;
            box-shadow: 0 6px 20px rgba(198, 40, 40, 0.3);
        }

        .about-card h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .about-card p {
            font-size: 14px;
            color: var(--text-light);
            line-height: 1.7;
        }

        /* ===== Footer ===== */
        .footer {
            background: var(--dark);
            color: rgba(255,255,255,0.7);
            padding: 50px 0 24px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 36px;
        }

        .footer h4 {
            color: var(--white);
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .footer p, .footer li {
            font-size: 14px;
            line-height: 1.8;
        }

        .footer ul {
            list-style: none;
        }

        .footer ul li a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: var(--gold);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 20px;
            font-weight: 800;
            color: var(--white);
        }

        .footer-brand i { color: var(--gold); font-size: 24px; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            text-align: center;
            font-size: 13px;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .navbar-nav { display: none; }
            .mobile-toggle { display: block; }

            .hero { padding: 120px 0 60px; }
            .hero-content { flex-direction: column; text-align: center; gap: 30px; }
            .hero h1 { font-size: 32px; }
            .hero p { font-size: 16px; margin: 0 auto 24px; }
            .hero-buttons { justify-content: center; }
            .hero-image { flex: 0 0 auto; }
            .hero-emoji { font-size: 120px; }

            .section { padding: 60px 0; }
            .section-header h2 { font-size: 26px; }

            .about-grid { grid-template-columns: 1fr; }
            .cabang-grid { grid-template-columns: 1fr; }
            .visimisi-grid { grid-template-columns: 1fr; }
            .sejarah-content { flex-direction: column; text-align: center; }
            .sejarah-image { flex: 0 0 auto; font-size: 100px; }
            .sejarah-stats { justify-content: center; }
            .footer-grid { grid-template-columns: 1fr; gap: 24px; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 28px; }
            .menu-grid { grid-template-columns: 1fr; }
        }

        /* ===== Mobile Nav ===== */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 64px;
            left: 0;
            right: 0;
            background: var(--red-dark);
            padding: 16px;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .mobile-nav.open { display: block; }

        .mobile-nav a {
            display: block;
            padding: 12px 16px;
            color: rgba(255,255,255,0.9);
            font-size: 15px;
            font-weight: 500;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .mobile-nav a:hover { background: rgba(255,255,255,0.1); }
    </style>
</head>
<body>

    <!-- ===== Navbar ===== -->
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('landing') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="NFC Logo" style="height: 50px; width: auto; vertical-align: middle; margin-right: 6px;">
                Nurul Fried Chicken
            </a>

            <ul class="navbar-nav">
                <li><a href="#beranda" class="active">Beranda</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#cabang">Cabang</a></li>
                <li><a href="#sejarah">Tentang</a></li>
            </ul>

            <div class="navbar-actions">
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login Admin
                </a>
                <button class="mobile-toggle" id="mobileToggle" onclick="toggleMobileNav()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Nav -->
    <div class="mobile-nav" id="mobileNav">
        <a href="#beranda">Beranda</a>
        <a href="#menu">Menu</a>
        <a href="#cabang">Cabang</a>
        <a href="#sejarah">Tentang</a>
        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login Admin</a>
    </div>

    <!-- ===== Hero Section ===== -->
    <section class="hero" id="beranda">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i> Nikmat, Fresh & Crispy
                    </div>
                    <h1>Nurul Fried Chicken<br><span style="color: var(--white);">Renyah & Nikmat!</span></h1>
                    <p>Nikmati kelezatan ayam goreng crispy dengan bumbu rahasia pilihan. Tersedia berbagai pilihan menu yang menggugah selera.</p>
                    <div class="hero-buttons">
                        <a href="#menu" class="btn-hero btn-hero-primary">
                            <i class="fas fa-utensils"></i> Lihat Menu
                        </a>
                        <a href="#cabang" class="btn-hero btn-hero-outline">
                            <i class="fas fa-map-marker-alt"></i> Lokasi Cabang
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('images/logo.png') }}" alt="NFC Logo" class="hero-emoji" style="width: 350px; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Menu Section ===== -->
    <section class="section menu-section" id="menu">
        <div class="container">
            <div class="section-header">
                <h2>Menu <span>Kami</span></h2>
                <p>Pilihan menu lezat yang siap memanjakan lidah Anda</p>
                <div class="section-divider"></div>
            </div>

            <!-- Menu Tabs -->
            <div class="menu-tabs">
                <button class="menu-tab active" onclick="filterMenu('semua')">Semua</button>
                @foreach($menus->keys() as $kat)
                <button class="menu-tab" onclick="filterMenu('{{ strtolower($kat) }}')">{{ $kat }}</button>
                @endforeach
            </div>

            <!-- Menu Grid -->
            <div class="menu-grid" id="menuGrid">
                @foreach($menus as $kategori => $items)
                    @foreach($items as $item)
                    <div class="menu-card" data-kategori="{{ strtolower($kategori) }}">
                        <div class="menu-card-icon">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_menu }}" style="width:100%;height:100%;object-fit:cover;">
                            @elseif(strtolower($kategori) === 'makanan')
                                
                            @elseif(strtolower($kategori) === 'paket')
                                
                            @else
                                
                            @endif
                        </div>
                        <div class="menu-card-body">
                            <span class="menu-card-kategori kat-{{ strtolower($kategori) }}">{{ $kategori }}</span>
                            <h4>{{ $item->nama_menu }}</h4>
                            @if($item->deskripsi)
                                <p style="font-size:12px;color:var(--text-light);margin:6px 0 0;line-height:1.5;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $item->deskripsi }}</p>
                            @endif
                            <div class="menu-card-price">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                            <a href="https://wa.me/6289671554991?text=Halo%20Admin%20Nurul%20Fried%20Chicken%2C%0ASaya%20ingin%20memesan%20menu%20berikut%3A%0A%F0%9F%93%A6%20Pesanan%3A%20{{ rawurlencode($item->nama_menu) }}%0A%F0%9F%94%A2%20Jumlah%3A%20...%0A%F0%9F%93%8D%20Alamat%20Pengiriman%3A%0A%5BIsi%20Alamat%20Lengkap%5D%0A%0AMohon%20informasi%20total%20harga%20dan%20nomor%20rekeningnya.%20Terima%20kasih%21" 
   target="_blank" 
   rel="noopener noreferrer" 
   style="display:block; margin-top:12px; padding:8px 0; background-color:#25D366; color:white; border-radius:6px; font-size:13px; font-weight:600; text-align:center; text-decoration:none; transition:opacity 0.3s;" 
   onmouseover="this.style.opacity='0.85'" 
   onmouseout="this.style.opacity='1'">
    <i class="fab fa-whatsapp"></i> Pesan Sekarang
</a>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== Cabang Section ===== -->
    <section class="section cabang-section" id="cabang">
        <div class="container">
            <div class="section-header">
                <h2>Cabang <span>Kami</span></h2>
                <p>Temukan cabang Nurul Fried Chicken terdekat dari lokasi Anda</p>
                <div class="section-divider"></div>
            </div>

            <div class="cabang-grid">
                @forelse($cabangs as $cabang)
                <div class="cabang-card">
                    <h4><i class="fas fa-store"></i> {{ $cabang->nama_cabang }}</h4>
                    <div class="cabang-info">
                        <div class="cabang-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $cabang->alamat }}</span>
                        </div>
                        <div class="cabang-info-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $cabang->telepon }}</span>
                        </div>
                        <div class="cabang-info-item">
                            <i class="fas fa-clock"></i>
                            <span>Senin - Minggu, {{ $cabang->jam_buka }} - {{ $cabang->jam_tutup }} WIB</span>
                        </div>
                    </div>
                    @if($cabang->link_maps)
                        <a href="{{ $cabang->link_maps }}" target="_blank" rel="noopener noreferrer" style="display:block; margin-top:16px; padding:10px 0; background-color:var(--bg); border: 1px solid var(--red); color:var(--red); border-radius:6px; font-size:13px; font-weight:600; text-align:center; text-decoration:none; transition:all 0.3s;" onmouseover="this.style.backgroundColor='var(--red)'; this.style.color='var(--white)';" onmouseout="this.style.backgroundColor='var(--bg)'; this.style.color='var(--red)';">
                            <i class="fas fa-map-marked-alt"></i> Lihat di Google Maps
                        </a>
                    @endif
                </div>
                @empty
                <div class="cabang-card">
                    <h4><i class="fas fa-info-circle"></i> Belum ada data cabang</h4>
                    <div class="cabang-info">
                        <div class="cabang-info-item">
                            <span>Informasi cabang akan segera ditambahkan.</span>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== Sejarah Section ===== -->
    <section class="section sejarah-section" id="sejarah">
        <div class="container">
            <div class="section-header">
                <h2>Sejarah <span>Kami</span></h2>
                <p>Perjalanan Nurul Fried Chicken dari warung kecil hingga menjadi brand ayam goreng terpercaya</p>
                <div class="section-divider"></div>
            </div>

            <div class="sejarah-content">
                <div class="sejarah-text">
                    <p>Perjalanan kurasi bisnis ini dimulai sejak merantau di awal 2003. Setelah sempat bersinergi mengelola usaha bersama keluarga pada April 2004, langkah mandiri pun dimulai pada Oktober 2004 dengan dibukanya gerai di Gang Raden Sungging dan Ratu Jaya, Depok. Hingga kini, kami juga mengoperasikan unit usaha pemotongan ayam untuk menjaga kualitas bahan baku utama kami.</p>
                    <div class="sejarah-stats">
                        <div class="sejarah-stat">
                            <div class="number">2004</div>
                            <div class="label">Tahun Berdiri</div>
                        </div>
                        <div class="sejarah-stat">
                            <div class="number">{{ $cabangs->count() }}+</div>
                            <div class="label">Cabang</div>
                        </div>
                        <div class="sejarah-stat">
                            <div class="number">{{ $menus->flatten()->count() }}+</div>
                            <div class="label">Menu</div>
                        </div>
                    </div>
                </div>
                <div class="sejarah-image">
                    <img src="{{ asset('images/logo2.png') }}" alt="Logo NFC" style="max-width: 280px; height: auto; margin: 0 auto; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.15));">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Visi Misi Section ===== -->
    <section class="section visimisi-section" id="visimisi">
        <div class="container">
            <div class="section-header">
                <h2>Visi & <span>Misi</span></h2>
                <p>Komitmen kami untuk terus berkembang dan memberikan yang terbaik</p>
                <div class="section-divider"></div>
            </div>

            <div class="visimisi-grid">
                <div class="visimisi-card">
                    <div class="card-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h4>Visi</h4>
                    <p>Menjadi brand ayam goreng lokal terdepan yang dikenal luas oleh masyarakat Indonesia, dengan mengutamakan kualitas rasa, kebersihan, dan pelayanan terbaik di setiap cabang.</p>
                </div>

                <div class="visimisi-card">
                    <div class="card-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4>Misi</h4>
                    <ul>
                        <li>Untuk mensejahterakan banyak orang dalam lingkup ( Karyawan)</li>
                        <li>Memberikan layanan terbaik dengan kompetitif serta membangun loyalitas pelanggan.</li>
                        <li>Fokus pada produk, pelayanan pelanggan, dan bisnis</li>
                        <li>Terus berinovasi dalam menu dan pelayanan demi pengalaman terbaik</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Tentang Section ===== -->
    <section class="section about-section" id="tentang">
        <div class="container">
            <div class="section-header">
                <h2>Kenapa <span>Nurul Fried Chicken?</span></h2>
                <p>Alasan mengapa pelanggan selalu kembali ke Nurul Fried Chicken</p>
                <div class="section-divider"></div>
            </div>

            <div class="about-grid">
                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h4>Selalu Fresh</h4>
                    <p>Ayam digoreng langsung saat dipesan untuk menjamin kerenyahan dan kenikmatan di setiap gigitan.</p>
                </div>

                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-mortar-pestle"></i>
                    </div>
                    <h4>Bumbu Rahasia</h4>
                    <p>Racikan bumbu spesial yang telah dikembangkan selama bertahun-tahun untuk cita rasa yang khas dan tak terlupakan.</p>
                </div>

                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <h4>Harga Terjangkau</h4>
                    <p>Kualitas premium dengan harga yang ramah di kantong. Cocok untuk mahasiswa hingga keluarga.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Footer ===== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand">
                        <i class="fas fa-drumstick-bite"></i> Nurul Fried Chicken
                    </div>
                    <p>Nurul Fried Chicken — Nikmati kelezatan ayam goreng crispy dengan bumbu rahasia pilihan. Selalu fresh, selalu nikmat.</p>
                </div>
                <div>
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#cabang">Cabang</a></li>
                        <li><a href="#tentang">Tentang</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="https://wa.me/6285956689966?text=Halo%20Admin%20Nurul%20Fried%20Chicken%2C%0A%0ASaya%20ingin%20memesan%20menu%20berikut%3A%0A-%20...%0A-%20...%0A%0AAlamat%20Pengiriman%3A%0A...%0A%0ATerima%20kasih." target="_blank" rel="noopener noreferrer"><i class="fas fa-phone" style="color:var(--gold);margin-right:6px;"></i>0896-7155-4991</a></li>
                        <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=nurulfriedchicken06@gmail.com&su=Pesanan%20Menu%20NFC&body=Halo%20Admin%20Nurul%20Fried%20Chicken%2C%0A%0ASaya%20ingin%20memesan%20menu%20berikut%3A%0A-%20...%0A-%20...%0A%0AAlamat%20Pengiriman%3A%0A...%0A%0ATerima%20kasih." target="_blank" rel="noopener noreferrer"><i class="fas fa-envelope" style="color:var(--gold);margin-right:6px;"></i>nurulfriedchicken06@gmail.com</a></li>
                        <li><i class="fas fa-map-marker-alt" style="color:var(--gold);margin-right:6px;"></i>  Jl. Cagar Alam Sel., RT.4/RW.2, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} <a href="https://github.com/AzrielRB" target="_blank" rel="noopener noreferrer" style="color:inherit; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='inherit'">Azriel Rakhan Bilal</a>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Nav Toggle
        function toggleMobileNav() {
            document.getElementById('mobileNav').classList.toggle('open');
        }

        // Close mobile nav when clicking a link
        document.querySelectorAll('.mobile-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                document.getElementById('mobileNav').classList.remove('open');
            });
        });

        // Menu Filter
        function filterMenu(kategori) {
            // Update active tab
            document.querySelectorAll('.menu-tab').forEach(function(tab) {
                tab.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter cards
            document.querySelectorAll('.menu-card').forEach(function(card) {
                if (kategori === 'semua' || card.getAttribute('data-kategori') === kategori) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Navbar scroll effect + active link scroll-spy
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.navbar-nav a');

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(198, 40, 40, 0.97)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = '#C62828';
                navbar.style.backdropFilter = 'none';
            }

            // Scroll-spy: update active nav link
            let current = '';
            sections.forEach(function(section) {
                const sectionTop = section.offsetTop - 100;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(function(link) {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

</body>
</html>
