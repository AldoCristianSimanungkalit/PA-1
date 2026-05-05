@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== LOGO FIXED (sama seperti home) ==================== */
    .logo-container {
        position: fixed;
        top: 80px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(0, 51, 102, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }
    .logo-container:hover {
        background: #0a4a7a;
        transform: translateY(-2px);
    }
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
    }
    .logo-divider {
        width: 2px;
        height: 35px;
        background: rgba(255,255,255,0.3);
    }
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
    }
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
    }
    .geotoba-sub {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.8);
    }
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
        }
        .flag-img { width: 60px; }
        .del-img { width: 35px; }
        .geotoba-text { font-size: 1.2rem; }
    }

    /* ==================== HERO ==================== */
    .kontak-hero {
        height: 45vh;
        background: linear-gradient(135deg, rgba(0,51,102,0.7), rgba(0,102,153,0.4)),
                    url('/image/kontak-hero.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
        position: relative;
    }
    .kontak-hero::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, #f8fafc, transparent);
    }
    .kontak-hero h1 {
        font-size: 3.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }
    .kontak-hero p {
        font-size: 0.9rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
    }

    /* ==================== KONTAK SECTION ==================== */
    .kontak-section {
        padding: 70px 0;
        background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%);
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }
    .col-md-4, .col-lg-6 {
        flex: 1;
        min-width: 280px;
    }
    .kontak-card {
        background: white;
        border-radius: 24px;
        padding: 35px 20px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,51,102,0.08);
        height: 100%;
    }
    .kontak-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0, 51, 102, 0.12);
        border-color: #c6a43b;
    }
    .kontak-icon {
        width: 70px;
        height: 70px;
        background: rgba(198, 164, 59, 0.12);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.3s;
    }
    .kontak-card:hover .kontak-icon {
        background: #c6a43b;
    }
    .kontak-icon i {
        font-size: 30px;
        color: #c6a43b;
        transition: all 0.3s;
    }
    .kontak-card:hover .kontak-icon i {
        color: white;
    }
    .kontak-card h4 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #003366;
    }
    .kontak-card p {
        color: #4a627a;
        margin-bottom: 6px;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* ==================== FORM ==================== */
    .form-card {
        background: white;
        border-radius: 28px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,51,102,0.08);
        height: 100%;
    }
    .form-card h3 {
        font-size: 1.8rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 25px;
        color: #003366;
        border-left: 4px solid #c6a43b;
        padding-left: 15px;
    }
    .form-control, .form-select {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px 18px;
        font-size: 0.9rem;
        transition: all 0.3s;
        width: 100%;
        margin-bottom: 20px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #c6a43b;
        box-shadow: 0 0 0 3px rgba(198,164,59,0.15);
        outline: none;
    }
    .btn-send {
        background: #003366;
        color: white;
        border: none;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 0.8rem;
        text-transform: uppercase;
        cursor: pointer;
    }
    .btn-send:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* ==================== MAPS & SOSIAL ==================== */
    .map-card {
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,51,102,0.08);
        background: white;
        height: 100%;
    }
    .map-card iframe {
        width: 100%;
        height: 280px;
        border: 0;
    }
    .map-info {
        padding: 25px;
        text-align: center;
    }
    .map-info h4 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #003366;
    }
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 25px;
    }
    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        background: #f1f5f9;
        border-radius: 50%;
        color: #003366;
        transition: all 0.3s;
        text-decoration: none;
        font-size: 1.1rem;
    }
    .social-icons a:hover {
        background: #c6a43b;
        color: white;
        transform: translateY(-4px);
    }
    .jam-operasional h5 {
        font-size: 0.95rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #003366;
    }
    .jam-operasional p {
        font-size: 0.85rem;
        color: #5a6e7c;
        margin-bottom: 5px;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .kontak-hero h1 { font-size: 2.2rem; }
        .kontak-hero p { font-size: 0.7rem; }
        .kontak-section { padding: 50px 0; }
        .form-card { padding: 25px; }
        .row { gap: 20px; }
    }
    @media (max-width: 576px) {
        .kontak-hero h1 { font-size: 1.8rem; }
        .kontak-card { padding: 25px 15px; }
        .btn-send { padding: 12px 20px; font-size: 0.7rem; }
    }
</style>

<!-- LOGO FIXED -->
<div class="logo-container">
    <div class="flag-logo-wrapper">
        <img src="{{ asset('image/Logo/bendera.png') }}" class="flag-img" alt="Bendera">
    </div>
    <div class="logo-divider"></div>
    <div class="del-logo-wrapper">
        <img src="{{ asset('image/Logo/del.jpeg') }}" class="del-img" alt="Del">
    </div>
    <div class="logo-divider"></div>
    <div class="geotoba-wrapper">
        <div>
            <div class="geotoba-text">GEOTOBA</div>
            <div class="geotoba-sub">Geopark Danau Toba</div>
        </div>
    </div>
</div>

<!-- HERO -->
<section class="kontak-hero">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <p data-aos="fade-up" data-aos-delay="100">Senang mendengar dari Anda</p>
    </div>
</section>

<!-- KONTAK SECTION -->
<section class="kontak-section">
    <div class="container">
        <div class="row">
            <!-- Alamat -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Alamat</h4>
                    <p>Kawasan Geosite Tele, Efrata, Sihotang</p>
                    <p>Kabupaten Toba & Samosir</p>
                    <p>Sumatera Utara, Indonesia</p>
                </div>
            </div>
            <!-- Telepon -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Telepon</h4>
                    <p>+62 812 3456 7890</p>
                    <p>+62 813 9876 5432</p>
                    <p>(0622) 12345</p>
                </div>
            </div>
            <!-- Email -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>info@geotoba.com</p>
                    <p>reservasi@geotoba.com</p>
                    <p>support@geotoba.com</p>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <!-- Form Kontak -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="form-card">
                    <h3>Kirim Pesan</h3>
                    <form action="#" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                        <input type="email" class="form-control" placeholder="Email" required>
                        <input type="tel" class="form-control" placeholder="Nomor Telepon">
                        <select class="form-select">
                            <option selected disabled>-- Pilih Subjek --</option>
                            <option>Informasi Wisata Geosite</option>
                            <option>Reservasi Tiket / Tour</option>
                            <option>Kerjasama Promosi</option>
                            <option>Saran & Masukan</option>
                            <option>Lainnya</option>
                        </select>
                        <textarea class="form-control" rows="5" placeholder="Pesan Anda..."></textarea>
                        <button type="submit" class="btn-send">
                            Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Maps & Sosial Media -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="map-card">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.6!2d98.6330!3d2.5270!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031d060f8e3180b%3A0xb561ba45f008aa18!2sTele%20Tower!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <div class="map-info">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                        <div class="jam-operasional">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat : 08:00 - 17:00 WIB</p>
                            <p>Sabtu - Minggu : 08:00 - 18:00 WIB</p>
                            <p><i class="fas fa-clock"></i> Layanan 24 jam untuk info darurat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome & AOS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection