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
        }

        .nav-link { color: white; text-decoration: none; margin-left: 20px; }
        .home-btn { background: var(--bi-gold); padding: 6px 18px; border-radius: 40px; color: black; }

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
            border-radius: 30px;
            color: black;
        }
    </style>
</head>
<body>

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