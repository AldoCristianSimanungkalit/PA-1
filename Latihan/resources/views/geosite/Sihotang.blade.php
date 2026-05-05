<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sihotang - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/meat.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="/image/logo/bendera.png" class="flag-img">
            <div class="logo-divider"></div>
            <img src="/image/logo/del.png" class="del-img">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
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
    </div>
</div>

<!-- HERO -->
<section class="hero">
    <div>
        <h1 class="hero-title">Sihotang</h1>
        <p class="hero-subtitle">Pulau Samosir · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>

        <div class="sejarah-item">
            <div class="sejarah-image"><img src="/image/sihotang/sejarah1.jpg"></div>
            <div class="sejarah-text">
                <p>Sihotang merupakan salah satu kawasan tua di Pulau Samosir yang memiliki nilai sejarah dan budaya Batak yang kuat. Wilayah ini dikenal sebagai bagian dari peradaban awal masyarakat Batak Toba.</p>
            </div>
        </div>

        <div class="sejarah-item reverse">
            <div class="sejarah-image"><img src="/image/sihotang/sejarah2.jpg"></div>
            <div class="sejarah-text">
                <p>Masyarakat Sihotang masih mempertahankan tradisi leluhur seperti adat Batak, upacara adat, serta kehidupan sosial berbasis kekerabatan marga.</p>
            </div>
        </div>

        <div class="sejarah-item">
            <div class="sejarah-image"><img src="/image/sihotang/sejarah3.jpg"></div>
            <div class="sejarah-text">
                <p>Selain budaya, kawasan ini juga memiliki potensi geologi yang menarik sebagai bagian dari Geopark Danau Toba yang terbentuk dari letusan supervolcano ribuan tahun lalu.</p>
            </div>
        </div>
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-3">
            <div class="card">
                <img src="/image/sihotang/ulos.jpg" class="card-img">
                <div class="card-content">
                    <h3>Tenun Ulos</h3>
                    <p>Kain khas Batak hasil tenunan tradisional.</p>
                    <div class="card-location">📍 Sihotang</div>
                    <div class="card-contact">📞 08xxxxxxxxxx</div>
                </div>
            </div>

            <div class="card">
                <img src="/image/sihotang/kopi.jpg" class="card-img">
                <div class="card-content">
                    <h3>Kopi Lokal</h3>
                    <p>Kopi khas Samosir dengan cita rasa unik.</p>
                    <div class="card-location">📍 Sihotang</div>
                    <div class="card-contact">📞 08xxxxxxxxxx</div>
                </div>
            </div>

            <div class="card">
                <img src="/image/sihotang/kerajinan.jpg" class="card-img">
                <div class="card-content">
                    <h3>Kerajinan Tangan</h3>
                    <p>Souvenir khas berbahan alami.</p>
                    <div class="card-location">📍 Sihotang</div>
                    <div class="card-contact">📞 08xxxxxxxxxx</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Penginapan</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-3">
            <div class="card">
                <img src="/image/sihotang/homestay.jpg" class="card-img">
                <div class="card-content">
                    <h3>Homestay Sihotang</h3>
                    <p>Penginapan sederhana dengan suasana desa.</p>
                    <div class="card-price">💰 150k / malam</div>
                </div>
            </div>

            <div class="card">
                <img src="/image/sihotang/lakeview.jpg" class="card-img">
                <div class="card-content">
                    <h3>Lake View</h3>
                    <p>Pemandangan langsung Danau Toba.</p>
                    <div class="card-price">💰 250k / malam</div>
                </div>
            </div>

            <div class="card">
                <img src="/image/sihotang/lodge.jpg" class="card-img">
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
        <div class="section-title">
            <h2>Fasilitas</h2>
            <div class="divider"></div>
        </div>

        <div class="grid-2">
            <div class="fasilitas-item">
                <h4>Area Parkir</h4>
                <p>Luas dan aman</p>
            </div>
            <div class="fasilitas-item">
                <h4>Toilet</h4>
                <p>Bersih</p>
            </div>
            <div class="fasilitas-item">
                <h4>Warung</h4>
                <p>Kuliner lokal</p>
            </div>
            <div class="fasilitas-item">
                <h4>Spot Foto</h4>
                <p>Instagramable</p>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
            <div class="divider"></div>
        </div>

        <div class="galeri-grid">
            <img src="/image/sihotang/1.jpg">
            <img src="/image/sihotang/2.jpg">
            <img src="/image/sihotang/3.jpg">
            <img src="/image/sihotang/4.jpg">
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Lokasi</h2>
            <div class="divider"></div>
        </div>

        <iframe src="https://www.google.com/maps?q=sihotang+samosir&output=embed" width="100%" height="350"></iframe>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Sihotang Sekarang</h3>
        <div class="divider"></div>
        <a href="{{ url('/') }}" class="cta-btn">Kembali</a>
    </div>
</section>

</body>
</html>