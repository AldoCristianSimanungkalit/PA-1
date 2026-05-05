@extends('layouts.app')

@section('title', 'Galeri Geosite - Tele, Efrata, Sihotang')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* PREMIUM STACKING STYLE */
    .gallery-wrapper {
        padding: 80px 20px;
        text-align: center;
        max-width: 1400px;
        margin: 0 auto;
        background: linear-gradient(135deg, #f5f7fa 0%, #eef2f7 100%);
    }

    .gallery-wrapper h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3.5rem;
        color: var(--blue-dark, #003366);
        margin-bottom: 10px;
    }

    .gallery-wrapper .subtitle {
        color: #c6a43b;
        letter-spacing: 2px;
        margin-bottom: 40px;
        font-size: 0.9rem;
    }

    /* STACK AREA */
    .stack-area {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 60px 0;
        padding: 40px 20px;
    }

    .card-item {
        position: relative;
        width: 220px;
        height: 320px;
        margin-left: -80px;
        border-radius: 20px;
        overflow: hidden;
        background: #1a1a2e;
        box-shadow: -10px 0 30px rgba(0, 0, 0, 0.2);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        z-index: 1;
        border: 2px solid rgba(255, 255, 255, 0.15);
    }

    /* First card in each row has no negative margin */
    .card-item:nth-child(8n+1) {
        margin-left: 0;
    }

    .card-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .card-item:hover {
        z-index: 100 !important;
        transform: translateY(-25px) scale(1.15) rotate(2deg);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        margin-right: 40px;
    }

    .card-item:hover img {
        transform: scale(1.02);
    }

    /* Badge kategori (optional) */
    .card-badge {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: rgba(0, 51, 102, 0.8);
        backdrop-filter: blur(5px);
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 600;
        color: #c6a43b;
        letter-spacing: 1px;
        z-index: 2;
        pointer-events: none;
    }

    /* MODAL PREMIUM */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.95);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(15px);
    }

    .modal-box {
        background: #0f172a;
        width: 90%;
        max-width: 1100px;
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(198, 164, 59, 0.3);
    }

    .modal-img-part {
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 400px;
    }

    .modal-img-part img {
        width: 100%;
        max-height: 70vh;
        object-fit: contain;
    }

    .modal-text-part {
        padding: 40px 30px;
        color: white;
        text-align: left;
        background: linear-gradient(135deg, #0f172a, #1e293b);
    }

    .modal-text-part small {
        color: #c6a43b;
        letter-spacing: 2px;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .modal-text-part h2 {
        font-size: 2rem;
        margin: 15px 0;
        font-family: 'Cormorant Garamond', serif;
    }

    .modal-text-part p {
        color: #cbd5e1;
        line-height: 1.7;
    }

    .close-btn {
        position: absolute;
        top: 25px;
        right: 30px;
        color: white;
        font-size: 2.2rem;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }

    .close-btn:hover {
        background: #c6a43b;
        transform: rotate(90deg);
    }

    /* Empty state */
    .empty-stack {
        grid-column: 1/-1;
        text-align: center;
        padding: 80px;
        background: white;
        border-radius: 32px;
        margin: 40px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .card-item {
            width: 180px;
            height: 260px;
            margin-left: -50px;
        }
        .modal-box {
            grid-template-columns: 1fr;
            max-width: 95%;
        }
        .modal-text-part {
            padding: 25px;
        }
        .gallery-wrapper h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 640px) {
        .stack-area {
            gap: 30px 0;
        }
        .card-item {
            width: 140px;
            height: 200px;
            margin-left: -30px;
        }
        .card-item:hover {
            transform: translateY(-15px) scale(1.1);
        }
    }
</style>

<div class="gallery-wrapper">
    <h1>Galeri Geosite</h1>
    <div class="subtitle">✦ Tele • Efrata • Sihotang ✦</div>

    <div class="stack-area" id="stackArea">
        <!-- Data akan diisi oleh JavaScript dari server -->
    </div>
</div>

<!-- MODAL -->
<div id="modalOverlay" class="modal-overlay" onclick="closeModal()">
    <div class="close-btn" onclick="closeModal()">&times;</div>
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-img-part">
            <img id="modalImage" src="" alt="">
        </div>
        <div class="modal-text-part">
            <small id="modalGeosite"></small>
            <h2 id="modalTitle"></h2>
            <p id="modalDesc"></p>
        </div>
    </div>
</div>

<script>
    // Data dari controller (sama seperti sebelumnya: $galeriByKategori)
    // Asumsikan controller mengirim variabel dengan key 'tele', 'efrata', 'sihotang'
    const galeriData = {
        tele: @json($galeriByKategori['tele'] ?? []),
        efrata: @json($galeriByKategori['efrata'] ?? []),
        sihotang: @json($galeriByKategori['sihotang'] ?? [])
    };

    // Konversi object menjadi array flat dengan informasi geosite
    let allPhotos = [];

    function buildPhotoArray() {
        allPhotos = [];
        for (const [geosite, items] of Object.entries(galeriData)) {
            if (Array.isArray(items)) {
                items.forEach(item => {
                    let imgSrc = '';
                    // Deteksi gambar: apakah blob atau path storage
                    if (item.gambar && typeof item.gambar === 'string') {
                        if (item.gambar.length > 500) {
                            imgSrc = 'data:image/jpeg;base64,' + item.gambar;
                        } else {
                            imgSrc = '/storage/' + item.gambar;
                        }
                    } else if (item.gambar) {
                        // fallback
                        imgSrc = '/storage/' + item.gambar;
                    } else {
                        imgSrc = 'https://via.placeholder.com/400x500?text=No+Image';
                    }

                    allPhotos.push({
                        id: item.id,
                        src: imgSrc,
                        title: item.judul || 'Foto ' + geosite,
                        description: item.deskripsi || 'Nikmati keindahan ' + geosite.toUpperCase(),
                        geosite: geosite.toUpperCase()
                    });
                });
            }
        }
    }

    function renderStack() {
        buildPhotoArray();
        const container = document.getElementById('stackArea');
        
        if (allPhotos.length === 0) {
            container.innerHTML = `<div class="empty-stack">
                <i class="bi bi-images" style="font-size: 3rem; color: #c6a43b;"></i>
                <h3 style="margin-top: 20px;">Belum Ada Foto</h3>
                <p>Silakan unggah foto untuk Geosite Tele, Efrata, dan Sihotang.</p>
            </div>`;
            return;
        }

        let html = '';
        allPhotos.forEach((photo, idx) => {
            html += `
                <div class="card-item" data-index="${idx}">
                    <img src="${photo.src}" alt="${photo.title}" loading="lazy">
                    <div class="card-badge">${photo.geosite}</div>
                </div>
            `;
        });
        container.innerHTML = html;

        // Attach event listeners
        document.querySelectorAll('.card-item').forEach(card => {
            card.addEventListener('click', (e) => {
                e.stopPropagation();
                const index = parseInt(card.dataset.index);
                openModal(index);
            });
        });
    }

    function openModal(index) {
        const photo = allPhotos[index];
        if (!photo) return;

        document.getElementById('modalImage').src = photo.src;
        document.getElementById('modalGeosite').innerText = photo.geosite;
        document.getElementById('modalTitle').innerText = photo.title;
        document.getElementById('modalDesc').innerText = photo.description;
        document.getElementById('modalOverlay').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('modalOverlay').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Keyboard: ESC to close
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    // Initial render
    renderStack();
</script>
@endsection