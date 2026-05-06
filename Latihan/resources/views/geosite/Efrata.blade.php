<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Air Terjun Efrata - Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f0f4f3; }

        :root {
            --bi-blue: #003366;
            --bi-gold: #c6a43b;
            --bi-light: #e8f0f0;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
            padding: 0.8rem 0;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .flag-img, .del-img {
            height: auto;
            border-radius: 5px;
        }
        .flag-img { width: 70px; }
        .del-img { width: 35px; }
        .logo-divider {
            width: 1px;
            height: 28px;
            background: rgba(255,255,255,0.3);
        }
        .logo-text h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: white;
        }
        .logo-text p {
            font-size: 0.45rem;
            color: rgba(255,255,255,0.6);
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }
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

        /* HAMBURGER */
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

        /* HERO */
        .hero {
            height: 55vh;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,51,102,0.7)),
                        url('{{ asset("image/efrata/hero.jpg") }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-top: 65px;
            text-align: center;
        }
        .hero-title { font-size: 3rem; }

        /* SECTION UMUM */
        .section { padding: 60px 0; }
        .container { max-width: 1100px; margin: auto; padding: 0 24px; }

        /* SEJARAH */
        .sejarah-item {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .reverse { flex-direction: row-reverse; }
        .sejarah-image {
            flex: 1;
            min-width: 200px;
        }
        .sejarah-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }
        .sejarah-text {
            flex: 1;
            font-size: 1rem;
            line-height: 1.6;
            color: #2c5f8a;
        }

        /* GALERI */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .galeri-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .galeri-item img:hover {
            transform: scale(1.02);
        }

        /* CTA */
        .cta {
            background: var(--bi-blue);
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        .cta h3 { font-size: 1.8rem; margin-bottom: 15px; }
        .cta p { margin-bottom: 25px; }
        .cta-btn {
            background: var(--bi-gold);
            color: var(--bi-blue);
            padding: 10px 25px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 40px;
            transition: 0.3s;
            display: inline-block;
        }
        .cta-btn:hover { background: white; transform: translateY(-2px); }

        /* LIGHTBOX */
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
        .lightbox img {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 6px;
        }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 32px;
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .hamburger { display: block; }
            .hero-title { font-size: 2rem; }
            .section { padding: 40px 0; }
            .galeri-grid { grid-template-columns: repeat(2, 1fr); }
            .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
            .sejarah-image img { height: 220px; }
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
            <img src="{{ asset('image/Logo/bi.jpeg') }}" alt="Bank Indonesia" class="flag-img">
            <div class="logo-divider"></div>
            <img src="{{ asset('image/Logo/del.jpeg') }}" alt="Del Institute" class="del-img">
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
    <div data-aos="fade-up">
        <h1 class="hero-title">AIR TERJUN EFRATA</h1>
        <p>Harian · Samosir · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="sejarah-item" data-aos="fade-right">
            <div class="sejarah-image">
                <img src="{{ asset('image/efrata/sejarah1.jpg') }}" alt="Sejarah Efrata 1">
            </div>
            <div class="sejarah-text">
                <p>Air Terjun Efrata merupakan salah satu destinasi wisata alam yang terkenal di Pulau Samosir. Air terjun ini memiliki aliran air yang deras dengan ketinggian sekitar 20 meter.</p>
            </div>
        </div>

        <div class="sejarah-item reverse" data-aos="fade-left">
            <div class="sejarah-image">
                <img src="{{ asset('image/efrata/sejarah2.jpg') }}" alt="Sejarah Efrata 2">
            </div>
            <div class="sejarah-text">
                <p>Nama "Efrata" berasal dari bahasa Batak yang berarti "tempat yang diberkati". Kawasan ini memiliki nilai budaya dan spiritual yang kuat bagi masyarakat setempat.</p>
            </div>
        </div>

        <div class="sejarah-item" data-aos="fade-right">
            <div class="sejarah-image">
                <img src="{{ asset('image/efrata/sejarah3.jpg') }}" alt="Sejarah Efrata 3">
            </div>
            <div class="sejarah-text">
                <p>Selain keindahan air terjun, lokasi ini juga dikelilingi oleh tebing batu dan pemandangan alam yang asri, menjadikannya tempat yang cocok untuk wisata, meditasi, dan fotografi.</p>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section">
    <div class="container">
        <div class="galeri-grid">
            @php
                $galeriImages = ['galeri1.jpg', 'galeri2.jpg', 'galeri3.jpg', 'galeri4.jpg'];
            @endphp
            @foreach($galeriImages as $img)
            <div class="galeri-item">
                <img src="{{ asset('image/efrata/'.$img) }}" alt="Galeri Efrata" loading="lazy">
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Air Terjun Efrata</h3>
        <p>Nikmati keindahan air terjun alami di Pulau Samosir</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg" alt="Lightbox">
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // AOS init
    AOS.init({ duration: 800, once: true, offset: 50 });

    // Mobile menu toggle
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    function openMobile() { mobileOverlay.classList.add('active'); }
    function closeMobile() { mobileOverlay.classList.remove('active'); }

    hamburger.addEventListener('click', openMobile);
    mobileClose.addEventListener('click', closeMobile);
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeMobile);
    });

    // Lightbox
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const galeriItems = document.querySelectorAll('.galeri-item img');

    galeriItems.forEach(img => {
        img.addEventListener('click', () => {
            lightbox.classList.add('active');
            lightboxImg.src = img.src;
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
    }

    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox || e.target === lightboxImg) closeLightbox();
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>

</body>
</html>