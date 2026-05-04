@extends('layouts.app')

@section('title', 'Destinasi - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== HERO SECTION ==================== */
    .destinasi-hero {
        height: 50vh;
        min-height: 400px;
        background: linear-gradient(135deg, rgba(0,51,102,0.75), rgba(0,51,102,0.55)), url('/image/destinasi-hero.jpg');
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
        overflow: hidden;
    }
    
    .destinasi-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 50%, rgba(198, 164, 59, 0.1), transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(198, 164, 59, 0.1), transparent 50%);
        pointer-events: none;
        animation: floatingBg 6s ease-in-out infinite;
    }
    
    .destinasi-hero > * {
        position: relative;
        z-index: 1;
    }
    
    .destinasi-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
        animation: fadeInUp 0.8s ease, textGlow 3s ease-in-out infinite;
    }
    
    .destinasi-hero p {
        font-size: 1rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.1s both;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes textGlow {
        0%, 100% {
            text-shadow: 0 0 20px rgba(198, 164, 59, 0.5);
        }
        50% {
            text-shadow: 0 0 40px rgba(198, 164, 59, 0.8);
        }
    }
    
    @keyframes floatingBg {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(20px);
        }
    }
    
    /* ==================== CATEGORY SECTION ==================== */
    .category-section {
        padding: 80px 0;
        background: #f0f4f0;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-header .subtitle {
        display: inline-block;
        font-size: 0.7rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #c6a43b;
        margin-bottom: 15px;
        font-weight: 600;
        animation: slideInDown 0.6s ease;
    }
    
    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
        animation: slideInUp 0.8s ease 0.1s both;
    }
    
    .section-header .divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 20px;
        animation: expandWidth 0.8s ease 0.2s both;
    }
    
    .section-header p {
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        font-size: 0.9rem;
        animation: fadeInUp 0.8s ease 0.3s both;
    }
    
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes expandWidth {
        from {
            width: 0;
        }
        to {
            width: 60px;
        }
    }
    
    /* Category Cards */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .category-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        cursor: pointer;
        text-decoration: none;
        display: block;
        position: relative;
    }
    
    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s ease;
        z-index: 1;
    }
    
    .category-card:hover::before {
        left: 100%;
    }
    
    .category-card:hover {
        transform: translateY(-12px) rotateX(5deg);
        box-shadow: 0 30px 60px rgba(0,51,102,0.2);
    }
    
    .category-card:hover .card-icon {
        background: linear-gradient(135deg, rgba(0,51,102,0.2), rgba(198, 164, 59, 0.2));
        transform: rotate(360deg) scale(1.1);
    }
    
    .card-image {
        position: relative;
        height: 240px;
        overflow: hidden;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .category-card:hover .card-image img {
        transform: scale(1.12) rotate(2deg);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,51,102,0.3) 100%);
        transition: background 0.4s ease;
    }
    
    .category-card:hover .card-overlay {
        background: linear-gradient(to bottom, transparent 0%, rgba(0,51,102,0.5) 100%);
    }
    
    .card-content {
        padding: 25px;
        text-align: center;
    }
    
    .card-icon {
        width: 60px;
        height: 60px;
        background: rgba(0,51,102,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -40px auto 15px;
        position: relative;
        z-index: 2;
        transition: all 0.5s ease;
    }
    
    .card-icon i {
        font-size: 24px;
        color: #003366;
        transition: color 0.3s ease;
    }
    
    .category-card:hover .card-icon i {
        color: #c6a43b;
    }
    
    .card-content h3 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #003366;
        transition: color 0.3s ease;
    }
    
    .category-card:hover .card-content h3 {
        color: #c6a43b;
    }
    
    .card-content p {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 0;
        transition: color 0.3s ease;
    }
    
    .category-card:hover .card-content p {
        color: #333;
    }
    
    /* ==================== STATS SECTION ==================== */
    .stats-section {
        background: linear-gradient(135deg, #003366, #1a4a7a);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 164, 59, 0.1), transparent);
        border-radius: 50%;
        animation: floating 8s ease-in-out infinite;
    }
    
    .stats-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(198, 164, 59, 0.08), transparent);
        border-radius: 50%;
        animation: floating 10s ease-in-out infinite reverse;
    }
    
    @keyframes floating {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(30px);
        }
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        position: relative;
        z-index: 1;
    }
    
    .stat-item {
        text-align: center;
        padding: 30px;
        background: rgba(255,255,255,0.08);
        border-radius: 16px;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 1px solid rgba(255,255,255,0.1);
        position: relative;
        overflow: hidden;
    }
    
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        transition: left 0.6s ease;
    }
    
    .stat-item:hover::before {
        left: 100%;
    }
    
    .stat-item:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-10px) scale(1.05);
        border: 1px solid rgba(198, 164, 59, 0.3);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #c6a43b;
        margin-bottom: 8px;
        font-variant-numeric: tabular-nums;
        position: relative;
        z-index: 1;
    }
    
    .stat-number.count-up {
        animation: slideInDown 0.8s ease forwards;
    }
    
    .stat-label {
        font-size: 0.7rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.8);
        position: relative;
        z-index: 1;
        transition: color 0.3s ease;
    }
    
    .stat-item:hover .stat-label {
        color: rgba(255,255,255,1);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .destinasi-hero {
            min-height: 300px;
        }
        .destinasi-hero h1 {
            font-size: 2rem;
        }
        .category-section {
            padding: 50px 0;
        }
        .section-header h2 {
            font-size: 1.6rem;
        }
        .category-grid {
            grid-template-columns: 1fr;
        }
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .stat-item {
            padding: 20px;
        }
        .stat-number {
            font-size: 2rem;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="destinasi-hero">
    <div data-aos="fade-up">
        <h1>Destinasi Geosite</h1>
        <p>Jelajahi Pesona Caldera Danau Toba</p>
    </div>
</section>

<!-- CATEGORY SECTION -->
<section class="category-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="subtitle">PILIH KATEGORI</span>
            <h2>Temukan Destinasi Favoritmu</h2>
            <div class="divider"></div>
            <p>Nikmati pengalaman wisata yang berbeda di setiap kategorinya</p>
        </div>
        
        <div class="category-grid">
            <!-- Destinasi Alam -->
            <a href="{{ url('/destinasi/alam') }}" class="category-card" data-aos="fade-up" data-aos-delay="0">
                <div class="card-image">
                    <img src="/image/destinasi/alam.jpg" alt="Destinasi Alam">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3>Destinasi Alam</h3>
                    <p>Goa alami, formasi batuan unik, air terjun, dan keindahan alam Danau Toba</p>
                </div>
            </a>
            
            <!-- Destinasi Buatan -->
            <a href="{{ url('/destinasi/buatan') }}" class="category-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-image">
                    <img src="/image/destinasi/buatan.jpg" alt="Destinasi Buatan">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Destinasi Buatan</h3>
                    <p>Patung ikonik, taman kota, jembatan dengan pemandangan spektakuler</p>
                </div>
            </a>
            
            <!-- Destinasi Budaya -->
            <a href="{{ url('/destinasi/budaya') }}" class="category-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-image">
                    <img src="/image/destinasi/budaya.jpg" alt="Destinasi Budaya">
                    <div class="card-overlay"></div>
                </div>
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>Destinasi Budaya</h3>
                    <p>Desa adat, museum sejarah, kerajinan ulos, dan kearifan lokal Batak</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- STATS SECTION -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-number" data-text="74.000+">74.000+</div>
                <div class="stat-label">TAHUN SEJARAH</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number" data-text="3">3</div>
                <div class="stat-label">GEOSITE UNGGULAN</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number" data-text="15+">15+</div>
                <div class="stat-label">WARISAN BUDAYA</div>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number" data-text="100+">100+</div>
                <div class="stat-label">UMKM LOKAL</div>
            </div>
        </div>
    </div>
</section>

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- Counter Animation Script -->
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });

    // Animated Counter Function
    function animateCounter(element, target, duration = 2000) {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Format the number based on the text content
            const text = element.getAttribute('data-text');
            if (text.includes('+')) {
                element.textContent = Math.floor(current) + '+';
            } else if (text === '3' || text === '15+' || text === '100+') {
                element.textContent = Math.floor(current) + (text.match(/\D+$/)?.[0] || '');
            } else {
                element.textContent = Math.floor(current) + (text.match(/\D+$/)?.[0] || '');
            }
        }, 16);
    }

    // Trigger counter animation when stats section is visible
    const observerOptions = {
        threshold: 0.5
    };

    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                
                const counters = entry.target.querySelectorAll('.stat-number');
                counters.forEach((counter, index) => {
                    const value = parseInt(counter.textContent);
                    setTimeout(() => {
                        animateCounter(counter, value, 1500);
                    }, index * 100);
                });
            }
        });
    }, observerOptions);

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    // Mouse tracking effect for cards
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
        });
    });

    // Parallax effect on scroll
    window.addEventListener('scroll', () => {
        const hero = document.querySelector('.destinasi-hero');
        const scrollPosition = window.pageYOffset;
        if (hero) {
            hero.style.backgroundPosition = `center ${scrollPosition * 0.5}px`;
        }
    });

    // Smooth scroll for links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add ripple effect on click
    document.querySelectorAll('.stat-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.left = e.clientX - this.getBoundingClientRect().left + 'px';
            ripple.style.top = e.clientY - this.getBoundingClientRect().top + 'px';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
</script>

<style>
    /* Ripple Effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
</style>

@endsection