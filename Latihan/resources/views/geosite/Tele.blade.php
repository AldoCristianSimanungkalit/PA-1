<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Tele - Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Style dasar (karena file tele.css mungkin tidak ada) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .flag-img, .del-img {
            height: 40px;
            width: auto;
            border-radius: 6px;
        }
        .logo-divider {
            width: 1px;
            height: 30px;
            background: rgba(255,255,255,0.3);
        }
        .logo-text h4 {
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
        }
        .logo-text p {
            color: rgba(255,255,255,0.8);
            font-size: 0.7rem;
        }
        .nav-menu {
            display: flex;
            gap: 30px;
        }
        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #c6a43b;
        }
        @media (max-width: 768px) {
            .nav-container { flex-direction: column; gap: 15px; }
            .nav-menu { gap: 20px; }
        }

        /* Hero */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,102,153,0.4)), url('image/tele/hero-bg.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero-title {
            font-size: 3.5rem;
            font-family: 'Cormorant Garamond', serif;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }
        .hero-subtitle {
            font-size: 1.2rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .hero-subtitle { font-size: 0.9rem; }
        }

        /* Section umum */
        .section {
            padding: 80px 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-size: 2.2rem;
            font-family: 'Cormorant Garamond', serif;
            color: #003366;
            margin-bottom: 15px;
        }
        .divider {
            width: 60px;
            height: 2px;
            background: #c6a43b;
            margin: 0 auto;
        }
        .bg-light {
            background: #f5f9ff;
        }

        /* Sejarah grid */
        .sejarah-grid {
            display: flex;
            flex-direction: column;
            gap: 60px;
        }
        .sejarah-item {
            display: flex;
            gap: 40px;
            align-items: center;
            flex-wrap: wrap;
        }
        .sejarah-item.reverse {
            flex-direction: row-reverse;
        }
        .sejarah-image {
            flex: 1;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .sejarah-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s;
        }
        .sejarah-image:hover img {
            transform: scale(1.05);
        }
        .sejarah-text {
            flex: 1;
            font-size: 1rem;
            line-height: 1.6;
            color: #2c5f8a;
        }
        @media (max-width: 768px) {
            .sejarah-item, .sejarah-item.reverse { flex-direction: column; }
        }

        /* Galeri grid */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .galeri-item {
            overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .galeri-item:hover {
            transform: scale(1.03);
        }
        .galeri-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        /* CTA */
        .cta {
            background: linear-gradient(135deg, #003366, #0a4a7a);
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
        }
        .cta-btn {
            display: inline-block;
            background: #c6a43b;
            color: #003366;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 40px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .cta-btn:hover {
            background: white;
            transform: translateY(-3px);
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
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
        }
        .lightbox img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="image/Logo/bi.jpeg" class="flag-img" alt="Bank Indonesia">
            <div class="logo-divider"></div>
            <img src="image/Logo/del.jpeg" class="del-img" alt="Del Institute">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
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
                    <img src="image/tele/sejarah1.jpg" alt="Sejarah Tele 1">
                </div>
                <div class="sejarah-text">
                    <p>Menara Pandang Tele merupakan salah satu lokasi terbaik untuk menikmati panorama Danau Toba dari ketinggian. Tempat ini menjadi ikon wisata yang menawarkan pemandangan Pulau Samosir secara luas.</p>
                </div>
            </div>

            <!-- Sejarah 2 -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="image/tele/sejarah2.jpg" alt="Sejarah Tele 2">
                </div>
                <div class="sejarah-text">
                    <p>Kawasan Tele terbentuk dari aktivitas vulkanik purba yang menciptakan lanskap perbukitan indah di sekitar Danau Toba. Dari sini, pengunjung dapat melihat keindahan kaldera terbesar di dunia.</p>
                    <p>Selain itu, kawasan ini juga menjadi tempat berkembangnya budaya Batak Toba yang kental akan nilai-nilai leluhur.</p>
                </div>
            </div>

            <!-- Sejarah 3 -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="image/tele/sejarah3.jpg" alt="Sejarah Tele 3">
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
            <div class="galeri-item"><img src="image/tele/galeri1.jpg" alt="Galeri 1"></div>
            <div class="galeri-item"><img src="image/tele/galeri2.jpg" alt="Galeri 2"></div>
            <div class="galeri-item"><img src="image/tele/galeri3.jpg" alt="Galeri 3"></div>
            <div class="galeri-item"><img src="image/tele/galeri4.jpg" alt="Galeri 4"></div>
            <div class="galeri-item"><img src="image/tele/galeri5.jpg" alt="Galeri 5"></div>
            <div class="galeri-item"><img src="image/tele/galeri6.jpg" alt="Galeri 6"></div>
            <div class="galeri-item"><img src="image/tele/galeri7.jpg" alt="Galeri 7"></div>
            <div class="galeri-item"><img src="image/tele/galeri8.jpg" alt="Galeri 8"></div>
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
AOS.init({ duration: 700, once: true, offset: 50 });

const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');
document.querySelectorAll('.galeri-item img').forEach(img => {
    img.addEventListener('click', () => {
        lightbox.classList.add('active');
        lightboxImg.src = img.src;
    });
});
function closeLightbox() { 
    lightbox.classList.remove('active'); 
}
</script>

</body>
</html>