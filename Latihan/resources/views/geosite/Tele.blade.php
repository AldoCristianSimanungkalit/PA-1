<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Tele - Danau Toba</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        /* ==================== RESET & GLOBAL ==================== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; overflow-x: hidden; background: #f8fafc; color: #334155; }

        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --white: #ffffff;
            --shadow-md: 0 10px 30px rgba(0,0,0,0.1);
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* ==================== NAVBAR ==================== */
        .navbar { position: fixed; top: 0; width: 100%; padding: 20px 0; z-index: 1000; transition: var(--transition); }
        .navbar.scrolled { background: rgba(0, 51, 102, 0.95); backdrop-filter: blur(10px); padding: 12px 0; border-bottom: 1px solid rgba(198, 164, 59, 0.3); }
        .nav-container { max-width: 1280px; margin: 0 auto; padding: 0 24px; display: flex; justify-content: space-between; align-items: center; }
        .logo-wrapper { display: flex; align-items: center; gap: 12px; }
        .logo-img { height: 35px; border-radius: 4px; background: white; padding: 2px; }
        .navbar-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: white; text-decoration: none; }
        .navbar-brand span { color: var(--gold); }
        .nav-menu { display: flex; gap: 25px; }
        .nav-link { font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; text-decoration: none; color: rgba(255,255,255,0.8); font-weight: 600; position: relative; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--gold); }

        /* ==================== HERO ==================== */
        .hero { height: 100vh; background: linear-gradient(rgba(0,40,80,0.7), rgba(0,20,40,0.5)), url('image/tele/hero-bg.jpg') center/cover no-repeat; display: flex; align-items: center; justify-content: center; text-align: center; color: white; }
        .hero-title { font-size: clamp(2.5rem, 8vw, 4.5rem); font-family: 'Cormorant Garamond', serif; margin-bottom: 20px; }

        /* ==================== SECTION STYLE ==================== */
        .section { padding: 100px 0; }
        .container { max-width: 1100px; margin: 0 auto; padding: 0 25px; }
        .section-title { text-align: center; margin-bottom: 60px; }
        .section-title h2 { font-size: 2.8rem; font-family: 'Cormorant Garamond', serif; color: var(--blue-dark); }
        .divider { width: 60px; height: 3px; background: var(--gold); margin: 15px auto; }

        /* ==================== UMKM SECTION ==================== */
        .umkm-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .umkm-card { background: white; border-radius: 20px; overflow: hidden; shadow: var(--shadow-md); transition: var(--transition); border: 1px solid #e2e8f0; }
        .umkm-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .umkm-img-wrapper { height: 250px; overflow: hidden; position: relative; }
        .umkm-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition); }
        .umkm-card:hover img { transform: scale(1.1); }
        .umkm-tag { position: absolute; top: 15px; left: 15px; background: var(--gold); color: white; padding: 5px 15px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }
        .umkm-info { padding: 25px; }
        .umkm-info h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--blue-dark); margin-bottom: 10px; }
        .umkm-info p { font-size: 0.95rem; line-height: 1.6; color: #64748b; margin-bottom: 20px; }
        .umkm-btn { display: inline-flex; align-items: center; gap: 8px; color: var(--gold); text-decoration: none; font-weight: 700; font-size: 0.85rem; border-bottom: 2px solid transparent; transition: 0.3s; }
        .umkm-btn:hover { border-bottom: 2px solid var(--gold); }

        /* ==================== FOOTER ==================== */
        footer { background: var(--blue-dark); color: white; padding: 50px 0; text-align: center; }

        /* Copied Sejarah & Galeri styles from your previous code for consistency... */
        .sejarah-item { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; margin-bottom: 80px; }
        .sejarah-image img { width: 100%; height: 400px; object-fit: cover; border-radius: 24px; }
        .galeri-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px; }
        .galeri-item { height: 250px; border-radius: 12px; overflow: hidden; cursor: pointer; }
        .galeri-item img { width: 100%; height: 100%; object-fit: cover; }

        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .sejarah-item { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="logo-wrapper">
                <img src="image/Logo/bi.jpeg" class="logo-img" alt="BI">
                <img src="image/Logo/del.jpeg" class="logo-img" alt="Del">
                <a class="navbar-brand" href="#">Geo<span>Toba</span></a>
            </div>
            <div class="nav-menu">
                <a href="#home" class="nav-link active">Home</a>
                <a href="#sejarah" class="nav-link">Sejarah</a>
                <a href="#umkm" class="nav-link">UMKM</a>
                <a href="#galeri" class="nav-link">Galeri</a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero" id="home">
        <div data-aos="fade-up">
            <p style="letter-spacing: 5px; text-transform: uppercase; font-weight: 300;">Exploration</p>
            <h1 class="hero-title">MENARA PANDANG TELE</h1>
            <div class="divider"></div>
        </div>
    </section>

    <!-- SEJARAH SECTION (Disingkat untuk fokus ke UMKM) -->
    <section id="sejarah" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Jejak Sejarah</h2>
                <div class="divider"></div>
            </div>
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image"><img src="image/tele/sejarah1.jpg" alt="Sejarah"></div>
                <div class="sejarah-text">
                    <p>Dibangun pada tahun 1988, Menara Pandang Tele merupakan titik pandang tertinggi untuk menikmati panorama Danau Toba yang megah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- UMKM SECTION -->
    <section id="umkm" class="section" style="background: #f1f5f9;">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>UMKM & Produk Lokal</h2>
                <p>Mendukung ekonomi kreatif masyarakat di sekitar Geosite Tele</p>
                <div class="divider"></div>
            </div>

            <div class="umkm-grid">
                <!-- UMKM 1 -->
                <div class="umkm-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="umkm-img-wrapper">
                        <span class="umkm-tag">Kuliner</span>
                        <img src="image/umkm/kopi-samosir.jpg" alt="Kopi Samosir">
                    </div>
                    <div class="umkm-info">
                        <h3>Kopi Arabika Tele</h3>
                        <p>Kopi pilihan yang ditanam di ketinggian Tele dengan aroma khas pegunungan dan rasa yang autentik.</p>
                        <a href="#" class="umkm-btn">Lihat Produk <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- UMKM 2 -->
                <div class="umkm-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="umkm-img-wrapper">
                        <span class="umkm-tag">Kriya</span>
                        <img src="image/umkm/ulos.jpg" alt="Tenun Ulos">
                    </div>
                    <div class="umkm-info">
                        <h3>Tenun Ulos Huta</h3>
                        <p>Warisan leluhur yang ditenun secara tradisional dengan motif khas yang memiliki makna mendalam bagi budaya Batak.</p>
                        <a href="#" class="umkm-btn">Hubungi Pengrajin <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- UMKM 3 -->
                <div class="umkm-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="umkm-img-wrapper">
                        <span class="umkm-tag">Oleh-oleh</span>
                        <img src="image/umkm/kerajinan-tangan.jpg" alt="Kerajinan Tangan">
                    </div>
                    <div class="umkm-info">
                        <h3>Souvenir Kayu Tele</h3>
                        <p>Berbagai kerajinan tangan dari kayu lokal yang dibentuk menjadi replika rumah adat dan alat musik tradisional.</p>
                        <a href="#" class="umkm-btn">Lihat Galeri <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI SECTION -->
    <section id="galeri" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Galeri Visual</h2>
                <div class="divider"></div>
            </div>
            <div class="galeri-grid">
                <div class="galeri-item" data-aos="zoom-in"><img src="image/tele/galeri1.jpg" alt="1"></div>
                <div class="galeri-item" data-aos="zoom-in"><img src="image/tele/galeri2.jpg" alt="2"></div>
                <div class="galeri-item" data-aos="zoom-in"><img src="image/tele/galeri3.jpg" alt="3"></div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Geosite Menara Pandang Tele. Supported by Bank Indonesia & IT Del.</p>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        const navbar = document.getElementById('navbar');
        window.onscroll = () => {
            if (window.scrollY > 50) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');

            // ScrollSpy
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');
                if(top >= offset && top < offset + height) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        document.querySelector('.nav-menu a[href*=' + id + ']').classList.add('active');
                    });
                }
            });
        };
    </script>
</body>
</html>