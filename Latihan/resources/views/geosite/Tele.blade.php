<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Tele - Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* ==================== RESET & GLOBAL ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: #f0f4f3;
        }

        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --gold-light: #e8c45a;
            --white: #ffffff;
            --shadow-sm: 0 5px 20px rgba(0,0,0,0.05);
            --shadow-md: 0 10px 30px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.2,0.9,0.4,1.1);
        }

        /* ==================== NAVBAR ==================== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 12px 0;
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-img {
            height: 45px;
            width: auto;
            border-radius: 6px;
            object-fit: cover;
        }

        .logo-divider {
            width: 1px;
            height: 30px;
            background: rgba(255,255,255,0.3);
        }

        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .navbar-brand span {
            color: var(--gold);
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            transition: var(--transition);
            padding: 6px 0;
        }

        .nav-link:hover {
            color: var(--gold);
        }

        .home-btn {
            background: var(--gold);
            color: var(--blue-dark) !important;
            padding: 6px 18px;
            border-radius: 40px;
        }

        /* ==================== HERO ==================== */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,102,153,0.4)), url('image/tele/hero-bg.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 0;
        }

        .hero-title {
            font-size: 3.8rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: 1rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 300;
        }

        @media (max-width: 768px) {
            .hero-title { font-size: 2.2rem; }
            .hero-subtitle { font-size: 0.8rem; letter-spacing: 2px; }
        }

        /* ==================== SECTION UMUM ==================== */
        .section {
            padding: 80px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            color: var(--blue-dark);
            margin-bottom: 15px;
        }

        .divider {
            width: 60px;
            height: 2px;
            background: var(--gold);
            margin: 0 auto;
        }

        .section-title p {
            margin-top: 20px;
            color: #2c5f8a;
            font-size: 0.9rem;
        }

        .bg-light {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        /* ==================== SEJARAH GRID ==================== */
        .sejarah-grid {
            display: flex;
            flex-direction: column;
            gap: 60px;
        }

        .sejarah-item {
            display: flex;
            gap: 50px;
            align-items: center;
            flex-wrap: wrap;
        }

        .sejarah-item.reverse {
            flex-direction: row-reverse;
        }

        .sejarah-image {
            flex: 1;
            min-width: 280px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .sejarah-image:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .sejarah-image img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .sejarah-image:hover img {
            transform: scale(1.05);
        }

        .sejarah-text {
            flex: 1;
            font-size: 1rem;
            line-height: 1.7;
            color: #2c5f8a;
        }

        @media (max-width: 768px) {
            .sejarah-item, .sejarah-item.reverse {
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }
            .sejarah-image img {
                height: 220px;
            }
        }

        /* ==================== GALERI GRID ==================== */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 25px;
        }

        .galeri-item {
            overflow: hidden;
            border-radius: 16px;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .galeri-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
        }

        .galeri-item img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s;
        }

        .galeri-item:hover img {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .galeri-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
            }
            .galeri-item img {
                height: 200px;
            }
        }

        /* ==================== CTA ==================== */
        .cta {
            background: linear-gradient(135deg, var(--blue-dark), var(--blue-medium));
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .cta h3 {
            font-size: 2rem;
            font-family: 'Cormorant Garamond', serif;
            margin-bottom: 20px;
        }

        .cta .divider {
            margin: 20px auto;
        }

        .cta p {
            margin-bottom: 30px;
            font-size: 1rem;
            opacity: 0.9;
        }

        .cta-btn {
            display: inline-block;
            background: var(--gold);
            color: var(--blue-dark);
            padding: 12px 32px;
            text-decoration: none;
            border-radius: 40px;
            font-weight: 600;
            transition: var(--transition);
        }

        .cta-btn:hover {
            background: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* ==================== LIGHTBOX ==================== */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 40px;
            color: white;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .lightbox-close:hover {
            transform: rotate(90deg);
        }

        .lightbox img {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }
            .nav-menu {
                gap: 20px;
            }
            .section {
                padding: 50px 0;
            }
            .section-title h2 {
                font-size: 1.8rem;
            }
            .cta h3 {
                font-size: 1.5rem;
            }
            .lightbox-close {
                top: 10px;
                right: 20px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="logo-wrapper">
            <img src="image/Logo/bi.jpeg" class="logo-img" alt="Bank Indonesia">
            <div class="logo-divider"></div>
            <img src="image/Logo/del.jpeg" class="logo-img" alt="Del Institute">
            <div class="logo-divider"></div>
            <a class="navbar-brand" href="#">Geo<span>Toba</span></a>
        </div>
        <div class="nav-menu">
            <a href="#" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#galeri" class="nav-link">Galeri</a>
        </div>
    </div>
</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">MENARA PANDANG TELE</h1>
        <p class="hero-subtitle">Tele · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-grid">
            <!-- Sejarah 1 -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="image/tele/sejarah1.jpg" alt="Menara Pandang Tele - Pemandangan luas">
                </div>
                <div class="sejarah-text">
                    <p>Menara Pandang Tele merupakan salah satu lokasi terbaik untuk menikmati panorama Danau Toba dari ketinggian. Tempat ini menjadi ikon wisata yang menawarkan pemandangan Pulau Samosir secara luas.</p>
                </div>
            </div>

            <!-- Sejarah 2 -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="image/tele/sejarah2.jpg" alt="Kawasan Tele perbukitan vulkanik">
                </div>
                <div class="sejarah-text">
                    <p>Kawasan Tele terbentuk dari aktivitas vulkanik purba yang menciptakan lanskap perbukitan indah di sekitar Danau Toba. Dari sini, pengunjung dapat melihat keindahan kaldera terbesar di dunia.</p>
                    <p>Selain itu, kawasan ini juga menjadi tempat berkembangnya budaya Batak Toba yang kental akan nilai-nilai leluhur.</p>
                </div>
            </div>

            <!-- Sejarah 3 -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="image/tele/sejarah3.jpg" alt="Tradisi Batak di kawasan Tele">
                </div>
                <div class="sejarah-text">
                    <p>Selain keindahan alam, kawasan Tele juga memiliki nilai budaya yang kuat. Masyarakat sekitar masih menjaga tradisi Batak yang menjadi daya tarik tersendiri bagi wisatawan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <div class="divider"></div>
            <p>Keindahan Menara Pandang Tele</p>
        </div>

        <div class="galeri-grid">
            <div class="galeri-item"><img src="image/tele/galeri1.jpg" alt="Tele view 1"></div>
            <div class="galeri-item"><img src="image/tele/galeri2.jpg" alt="Tele view 2"></div>
            <div class="galeri-item"><img src="image/tele/galeri3.jpg" alt="Tele view 3"></div>
            <div class="galeri-item"><img src="image/tele/galeri4.jpg" alt="Tele view 4"></div>
            <div class="galeri-item"><img src="image/tele/galeri5.jpg" alt="Tele view 5"></div>
            <div class="galeri-item"><img src="image/tele/galeri6.jpg" alt="Tele view 6"></div>
            <div class="galeri-item"><img src="image/tele/galeri7.jpg" alt="Tele view 7"></div>
            <div class="galeri-item"><img src="image/tele/galeri8.jpg" alt="Tele view 8"></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Kunjungi Menara Pandang Tele</h3>
        <div class="divider"></div>
        <p>Nikmati panorama terbaik Danau Toba dari ketinggian</p>
        <a href="#" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg" alt="Lightbox Image">
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Inisialisasi AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-quad'
    });

    // Lightbox galeri
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    
    document.querySelectorAll('.galeri-item img').forEach(img => {
        img.addEventListener('click', () => {
            lightbox.classList.add('active');
            lightboxImg.src = img.src;
            document.body.style.overflow = 'hidden';
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Tutup lightbox jika klik di luar gambar
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox || e.target === lightboxImg) {
            closeLightbox();
        }
    });

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
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