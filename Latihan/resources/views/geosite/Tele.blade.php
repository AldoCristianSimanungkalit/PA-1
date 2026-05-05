<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Geosite Tele - Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tele.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="[GANTI_LINK_BENDERA]" class="flag-img">
            <div class="logo-divider"></div>
            <img src="[GANTI_LINK_DEL]" class="del-img">
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
                    <img src="/image/tele/sejarah1.jpg">
                </div>
                <div class="sejarah-text">
                    <p>Menara Pandang Tele merupakan salah satu lokasi terbaik untuk menikmati panorama Danau Toba dari ketinggian. Tempat ini menjadi ikon wisata yang menawarkan pemandangan Pulau Samosir secara luas.</p>
                </div>
            </div>

            <!-- Sejarah 2 -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/tele/sejarah2.jpg">
                </div>
                <div class="sejarah-text">
                    <p>Kawasan Tele terbentuk dari aktivitas vulkanik purba yang menciptakan lanskap perbukitan indah di sekitar Danau Toba. Dari sini, pengunjung dapat melihat keindahan kaldera terbesar di dunia.</p>
                </div>
            </div>

            <!-- Sejarah 3 -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/tele/sejarah3.jpg">
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
            <div class="galeri-item"><img src="/image/tele/galeri1.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri2.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri3.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri4.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri5.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri6.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri7.jpg"></div>
            <div class="galeri-item"><img src="/image/tele/galeri8.jpg"></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Kunjungi Menara Pandang Tele</h3>
        <div class="divider"></div>
        <p>Nikmati panorama terbaik Danau Toba dari ketinggian</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg">
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 700, once: true, offset: 50 });

const lightbox = document.getElementById('lightbox');
document.querySelectorAll('.galeri-item img').forEach(img => {
    img.addEventListener('click', () => {
        lightbox.classList.add('active');
        document.getElementById('lightboxImg').src = img.src;
    });
});
function closeLightbox() { lightbox.classList.remove('active'); }
</script>

</body>
</html>