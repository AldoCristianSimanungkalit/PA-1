<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sihotang - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f0f4f3;
        }
        
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --gold-light: #e8c45a;
            --white: #ffffff;
            --gray-light: #f8fafc;
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
            z-index: 1000;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
            padding: 0.8rem 0;
        }
        
        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            gap: 28px;
            align-items: center;
        }
        
        .nav-link {
            font-size: 0.7rem;
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
        
        /* Mobile Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            padding: 8px 12px;
            background: rgba(255,255,255,0.1);
            border-radius: 50px;
        }
        
        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: white;
            margin: 5px 0;
            transition: 0.3s;
        }
        
        .mobile-overlay {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: var(--blue-dark);
            z-index: 1001;
            transition: right 0.3s ease;
            padding: 80px 30px;
        }
        
        .mobile-overlay.active {
            right: 0;
        }
        
        .mobile-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 32px;
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
        
        .mobile-link:hover {
            color: var(--gold);
        }
        
        .mobile-home {
            background: var(--gold);
            color: var(--blue-dark) !important;
            border-radius: 40px;
            margin-bottom: 10px;
        }
        
        /* ==================== HERO ==================== */
        .hero {
            height: 70vh;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,51,102,0.7)),
                        url('{{ asset("image/sihotang/hero.jpg") }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 65px;
        }
        
        .hero-title {
            font-size: 4rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .hero-subtitle {
            font-size: 0.9rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        
        /* ==================== SECTION ==================== */
        .section {
            padding: 80px 0;
        }
        
        .bg-light {
            background: var(--gray-light);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
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
        
        /* Sejarah */
        .sejarah-item {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .sejarah-item.reverse {
            flex-direction: row-reverse;
        }
        
        .sejarah-image {
            flex: 1;
            min-width: 280px;
        }
        
        .sejarah-image img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
        }
        
        .sejarah-text {
            flex: 1;
            font-size: 1rem;
            line-height: 1.7;
            color: #2c5f8a;
        }
        
        /* Grid & Card */
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
        
        .card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
        }
        
        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 20px;
        }
        
        .card-content h3 {
            font-size: 1.2rem;
            color: var(--blue-dark);
            margin-bottom: 10px;
        }
        
        .card-content p {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 12px;
            line-height: 1.5;
        }
        
        .card-location, .card-contact, .card-price {
            font-size: 0.75rem;
            color: var(--gold);
            margin-top: 8px;
        }
        
        /* Fasilitas */
        .fasilitas-item {
            background: white;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        .fasilitas-item:hover {
            transform: translateY(-5px);
            background: var(--gold);
            color: var(--blue-dark);
        }
        
        .fasilitas-item h4 {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }
        
        /* Galeri Grid */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
        
        .galeri-grid img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .galeri-grid img:hover {
            transform: scale(1.03);
            box-shadow: var(--shadow-md);
        }
        
        /* Maps */
        iframe {
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
        }
        
        /* CTA */
        .cta {
            background: var(--blue-dark);
            color: white;
            text-align: center;
            padding: 60px 0;
        }
        
        .cta h3 {
            font-size: 1.8rem;
            font-family: 'Cormorant Garamond', serif;
            margin-bottom: 20px;
        }
        
        .cta .divider {
            margin-bottom: 30px;
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
        }
        
        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.95);
            z-index: 10002;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        
        .lightbox.active {
            display: flex;
        }
        
        .lightbox img {
            max-width: 90%;
            max-height: 85vh;
            border-radius: 8px;
        }
        
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            cursor: pointer;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .grid-3, .grid-2 {
                grid-template-columns: repeat(2, 1fr);
            }
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .hero-title {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            .hamburger {
                display: block;
            }
            .hero-title {
                font-size: 2.2rem;
            }
            .section {
                padding: 50px 0;
            }
            .sejarah-item, .sejarah-item.reverse {
                flex-direction: column;
                text-align: center;
            }
            .grid-3, .grid-2 {
                grid-template-columns: 1fr;
            }
            .galeri-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="logo-wrapper">
            <img src="{{ asset('image/logo/bi.jpeg') }}" alt="Bank Indonesia" class="logo-img">
            <div class="logo-divider"></div>
            <img src="{{ asset('image/logo/del.jpeg') }}" alt="Logo Del" class="logo-img">
            <div class="logo-divider"></div>
            <a class="navbar-brand" href="{{ url('/') }}">Geo<span>Toba</span></a>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
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
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">Sihotang</h1>
        <p class="hero-subtitle">Pulau Samosir · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-item" data-aos="fade-right">
            <div class="sejarah-image">
                <img src="{{ asset('image/sihotang/sejarah1.jpg') }}" alt="Sejarah Sihotang 1">
            </div>
            <div class="sejarah-text">
                <p>Sihotang merupakan salah satu kawasan tua di Pulau Samosir yang memiliki nilai sejarah dan budaya Batak yang kuat. Wilayah ini dikenal sebagai bagian dari peradaban awal masyarakat Batak Toba.</p>
            </div>
        </div>

        <div class="sejarah-item reverse" data-aos="fade-left">
            <div class="sejarah-image">
                <img src="{{ asset('image/sihotang/sejarah2.jpg') }}" alt="Sejarah Sihotang 2">
            </div>
            <div class="sejarah-text">
                <p>Masyarakat Sihotang masih mempertahankan tradisi leluhur seperti adat Batak, upacara adat, serta kehidupan sosial berbasis kekerabatan marga.</p>
            </div>
        </div>

        <div class="sejarah-item" data-aos="fade-right">
            <div class="sejarah-image">
                <img src="{{ asset('image/sihotang/sejarah3.jpg') }}" alt="Sejarah Sihotang 3">
            </div>
            <div class="sejarah-text">
                <p>Selain budaya, kawasan ini juga memiliki potensi geologi yang menarik sebagai bagian dari Geopark Danau Toba yang terbentuk dari letusan supervolcano ribuan tahun lalu.</p>
            </div>
        </div>
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-3">
            <div class="card" data-aos="zoom-in">
                <img src="{{ asset('image/sihotang/ulos.jpg') }}" class="card-img" alt="Tenun Ulos">
                <div class="card-content">
                    <h3>Tenun Ulos</h3>
                    <p>Kain khas Batak hasil tenunan tradisional.</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> Sihotang</div>
                    <div class="card-contact"><i class="fab fa-whatsapp"></i> 08xxxxxxxxxx</div>
                </div>
            </div>

            <div class="card" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('image/sihotang/kopi.jpg') }}" class="card-img" alt="Kopi Lokal">
                <div class="card-content">
                    <h3>Kopi Lokal</h3>
                    <p>Kopi khas Samosir dengan cita rasa unik.</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> Sihotang</div>
                    <div class="card-contact"><i class="fab fa-whatsapp"></i> 08xxxxxxxxxx</div>
                </div>
            </div>

            <div class="card" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('image/sihotang/kerajinan.jpg') }}" class="card-img" alt="Kerajinan Tangan">
                <div class="card-content">
                    <h3>Kerajinan Tangan</h3>
                    <p>Souvenir khas berbahan alami.</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> Sihotang</div>
                    <div class="card-contact"><i class="fab fa-whatsapp"></i> 08xxxxxxxxxx</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Penginapan</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-3">
            <div class="card" data-aos="fade-up">
                <img src="{{ asset('image/sihotang/homestay.jpg') }}" class="card-img" alt="Homestay Sihotang">
                <div class="card-content">
                    <h3>Homestay Sihotang</h3>
                    <p>Penginapan sederhana dengan suasana desa.</p>
                    <div class="card-price">💰 150k / malam</div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('image/sihotang/lakeview.jpg') }}" class="card-img" alt="Lake View">
                <div class="card-content">
                    <h3>Lake View</h3>
                    <p>Pemandangan langsung Danau Toba.</p>
                    <div class="card-price">💰 250k / malam</div>
                </div>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('image/sihotang/lodge.jpg') }}" class="card-img" alt="Sihotang Lodge">
                <div class="card-content">
                    <h3>Sihotang Lodge</h3>
                    <p>Nyaman dengan fasilitas modern.</p>
                    <div class="card-price">💰 300k / malam</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fasilitas</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-2">
            <div class="fasilitas-item" data-aos="flip-left">
                <h4><i class="fas fa-parking"></i> Area Parkir</h4>
                <p>Luas dan aman</p>
            </div>
            <div class="fasilitas-item" data-aos="flip-left" data-aos-delay="100">
                <h4><i class="fas fa-restroom"></i> Toilet</h4>
                <p>Bersih</p>
            </div>
            <div class="fasilitas-item" data-aos="flip-left" data-aos-delay="200">
                <h4><i class="fas fa-store"></i> Warung</h4>
                <p>Kuliner lokal</p>
            </div>
            <div class="fasilitas-item" data-aos="flip-left" data-aos-delay="300">
                <h4><i class="fas fa-camera"></i> Spot Foto</h4>
                <p>Instagramable</p>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <div class="divider"></div>
        </div>

        <div class="galeri-grid">
            @php
                $galeriFiles = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
            @endphp
            @foreach($galeriFiles as $file)
                <img src="{{ asset('image/sihotang/'.$file) }}" alt="Galeri Sihotang" loading="lazy" class="galeri-img">
            @endforeach
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Lokasi</h2>
            <div class="divider"></div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.5!2d98.8!3d2.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031c5a5a5a5a5a5%3A0x5a5a5a5a5a5a5a5a!2sSihotang%2C%20Samosir%2C%20North%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="zoom-in">
        <h3>Kunjungi Sihotang Sekarang</h3>
        <div class="divider"></div>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg" alt="">
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // AOS init
    AOS.init({ duration: 800, once: true, offset: 50 });
    
    // Mobile menu
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');
    
    function openMobile() { mobileOverlay.classList.add('active'); }
    function closeMobile() { mobileOverlay.classList.remove('active'); }
    
    if (hamburger) hamburger.addEventListener('click', openMobile);
    if (mobileClose) mobileClose.addEventListener('click', closeMobile);
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeMobile);
    });
    
    // Lightbox gallery
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const galleryImages = document.querySelectorAll('.galeri-img');
    
    galleryImages.forEach(img => {
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
    
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>
</body>
</html>