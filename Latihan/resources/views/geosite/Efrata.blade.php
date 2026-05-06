<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Air Terjun Efarata - Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f0f4f3; }

        :root {
            --bi-blue: #003366;
            --bi-gold: #c6a43b;
            --bi-light: #e8f0f0;
        }

        .navbar {
            position: fixed;
            top: 0; width: 100%;
            background: rgba(0,51,102,0.95);
            padding: 12px 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-logo { display: flex; align-items: center; gap: 16px; }
        .flag-img { width: 70px; height: auto; border-radius: 5px; }
        .logo-divider { width: 1px; height: 30px; background: rgba(255,255,255,0.3); }
        .del-img { width: 35px; height: auto; border-radius: 5px; }
        .logo-text h4 { font-size: 0.9rem; font-weight: 700; color: white; }
        .logo-text p { font-size: 0.45rem; color: rgba(255,255,255,0.6); }
        .nav-menu { display: flex; gap: 30px; align-items: center; }
        .nav-link {
            font-size: 0.7rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            transition: 0.3s;
            padding: 6px 0;
        }
        .nav-link:hover { color: var(--bi-gold); }
        .home-btn {
            background: var(--bi-gold);
            color: var(--bi-blue) !important;
            padding: 6px 18px;
            border-radius: 40px;
        }

        /* ========== HAMBURGER ========== */
        .hamburger {
            display: none;
            cursor: pointer;
            padding: 8px 12px;
            background: rgba(255,255,255,0.1);
            border-radius: 50px;
        }
        .hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: white;
            margin: 5px 0;
        }
        .mobile-overlay {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: var(--bi-blue);
            z-index: 1001;
            transition: right 0.3s;
            padding: 80px 30px;
        }
        .mobile-overlay.active { right: 0; }
        .mobile-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: white;
        }
        .mobile-link {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .mobile-link:hover { color: var(--bi-gold); }
        .mobile-home {
            background: var(--bi-gold);
            color: var(--bi-blue) !important;
            border-radius: 40px;
            margin-bottom: 10px;
        }

        /* ========== HERO DENGAN FOTO ========== */
        .hero {
            height: 55vh;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,51,102,0.7)),
            url('/image/efarata/hero.jpg');
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-top: 65px;
            text-align: center;
        }

        .hero-title { font-size: 3rem; }

        .section { padding: 60px 0; }
        .container { max-width: 1100px; margin: auto; padding: 0 24px; }

        .sejarah-item { display: flex; gap: 40px; margin-bottom: 40px; flex-wrap: wrap; }
        .reverse { flex-direction: row-reverse; }

        .sejarah-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4,1fr);
            gap: 10px;
        }

        .galeri-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .cta {
            background: var(--bi-blue);
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .cta-btn {
            background: var(--bi-gold);
            padding: 10px 25px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .cta-btn:hover { background: white; transform: translateY(-2px); }

        /* ========== LIGHTBOX ========== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 10002;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .lightbox.active { display: flex; }
        .lightbox img { max-width: 90%; max-height: 85vh; border-radius: 6px; }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 32px;
            cursor: pointer;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .hamburger { display: block; }
            .hero-title { font-size: 2rem; }
            .section { padding: 40px 0; }
            .galeri-grid { grid-template-columns: repeat(2, 1fr); }
            .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
            .sejarah-image img { height: 220px; }
            .section-title h2 { font-size: 1.6rem; }
        }
        @media (max-width: 576px) {
            .hero-title { font-size: 1.6rem; }
            .galeri-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="[GANTI_LINK_BENDERA]" alt="Bendera" class="flag-img">
            <div class="logo-divider"></div>
            <img src="[GANTI_LINK_DEL]" alt="D el" class="del-img">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#galeri" class="nav-link">Galeri</a>
        </div>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">×</div>
    <a href="{{ url('/') }}" class="mobile-link mobile-home">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
</div>

<!-- HERO -->
<section class="hero">
    <div>
        <h1 class="hero-title">AIR TERJUN EFARATA</h1>
        <p>Harian · Samosir · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section class="section">
<div class="container">

    <!-- Sejarah 1 -->
    <div class="sejarah-item">
        <div class="sejarah-image">
            <img src="/image/efarata/sejarah1.jpg">
        </div>
        <div>
            <p>Air Terjun Efarata merupakan salah satu destinasi wisata alam yang terkenal di Pulau Samosir. Air terjun ini memiliki aliran air yang deras dengan ketinggian sekitar 20 meter.</p>
        </div>
    </div>

    <!-- Sejarah 2 -->
    <div class="sejarah-item reverse">
        <div class="sejarah-image">
            <img src="/image/efarata/sejarah2.jpg">
        </div>
        <div>
            <p>Nama "Efarata" berasal dari bahasa Batak yang berarti "tempat yang diberkati". Kawasan ini memiliki nilai budaya dan spiritual bagi masyarakat setempat.</p>
        </div>
    </div>

    <!-- Sejarah 3 -->
    <div class="sejarah-item">
        <div class="sejarah-image">
            <img src="/image/efarata/sejarah3.jpg">
        </div>
        <div>
            <p>Selain keindahan air terjun, lokasi ini juga dikelilingi oleh tebing batu dan pemandangan alam yang asri, menjadikannya tempat yang cocok untuk wisata dan fotografi.</p>
        </div>
    </div>

</div>
</section>

<!-- GALERI -->
<section class="section">
<div class="container">
    <div class="galeri-grid">
        <img src="/image/efarata/galeri1.jpg">
        <img src="/image/efarata/galeri2.jpg">
        <img src="/image/efarata/galeri3.jpg">
        <img src="/image/efarata/galeri4.jpg">
    </div>
</div>
</section>

<!-- CTA -->
<section class="cta">
    <h3>Kunjungi Air Terjun Efarata</h3>
    <p>Nikmati keindahan air terjun alami di Pulau Samosir</p>
    <a href="{{ url('/') }}" class="cta-btn">Kembali</a>
</section>

</body>
</html>