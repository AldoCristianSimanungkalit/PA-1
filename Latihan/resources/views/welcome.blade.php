<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeoToba - Geopark Danau Toba</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Minimal reset & custom hero */
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body {
                font-family: 'Instrument Sans', sans-serif;
                background: #000; /* fallback */
            }
            .hero {
                height: 100vh;
                width: 100%;
                background-image: url('{{ asset("images/toba-bg.jpg") }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                position: relative;
            }
            .hero::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1;
            }
            .hero-content {
                position: relative;
                z-index: 2;
                color: white;
                padding: 20px;
                max-width: 800px;
            }
            .hero-content h1 {
                font-size: 4.5rem;
                font-weight: 800;
                letter-spacing: 4px;
                margin-bottom: 0.5rem;
            }
            .hero-content h1 span {
                color: #c6a43b;
            }
            .hero-content .sub {
                font-size: 1.3rem;
                font-weight: 500;
                margin-bottom: 1rem;
            }
            .geo-badge {
                background: rgba(0,0,0,0.6);
                backdrop-filter: blur(8px);
                display: inline-block;
                padding: 12px 28px;
                border-radius: 50px;
                margin: 25px 0;
                border: 1px solid rgba(255,215,0,0.3);
            }
            .geo-badge p {
                margin: 0;
                letter-spacing: 2px;
                font-size: 0.9rem;
            }
            .geo-badge p:first-child {
                font-weight: 700;
                font-size: 1rem;
            }
            .btn-jelajahi {
                display: inline-block;
                background: #c6a43b;
                color: #003366;
                padding: 14px 40px;
                border-radius: 50px;
                font-weight: 700;
                text-decoration: none;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                border: none;
                cursor: pointer;
            }
            .btn-jelajahi:hover {
                background: white;
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            }
            @media (max-width: 768px) {
                .hero-content h1 { font-size: 2.8rem; }
                .hero-content .sub { font-size: 1rem; }
                .geo-badge p { font-size: 0.7rem; }
                .btn-jelajahi { padding: 10px 30px; font-size: 1rem; }
            }
        </style>
    @endif
</head>
<body>
    <div class="hero">
        <div class="hero-content">
            <h1>GEO<span>TOBA</span></h1>
            <div class="sub">Geopark Danau Toba</div>
            <div class="geo-badge">
                <p>GLOBAL GEO PARK</p>
                <p style="margin-top: 5px;">TELE · EFRATA · SIHOTANG</p>
            </div>
            <a href="{{ url('/destinasi') }}" class="btn-jelajahi">JELAJAHI SEKARANG</a>
        </div>
    </div>
</body>
</html>