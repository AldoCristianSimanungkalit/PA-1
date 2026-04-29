<script>
const galeriData = {
    tele: @json(($galeriByKategori['tele'] ?? collect())->map(function($item) {
        return [
            'src' => $item->gambar,
            'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    })),

    efrata: @json(($galeriByKategori['efrata'] ?? collect())->map(function($item) {
        return [
            'src' => $item->gambar,
            'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    })),

    sihotang: @json(($galeriByKategori['sihotang'] ?? collect())->map(function($item) {
        return [
            'src' => $item->gambar,
            'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    }))
};

function renderGallery(tab) {
    const grid = document.getElementById('galeriGrid');
    const photos = galeriData[tab] || [];

    if (photos.length === 0) {
        grid.innerHTML =
        '<div style="grid-column:1/-1;text-align:center;padding:60px;color:#003366;">Belum ada foto di kategori ini.</div>';
        document.getElementById('galleryCounter').innerHTML = '';
        return;
    }

    grid.innerHTML = photos.map(function(photo) {
        return `
            <div class="galeri-item" data-src="${photo.src}">
                <img src="${photo.src}" alt="${photo.caption}">
            </div>
        `;
    }).join('');

    document.getElementById('galleryCounter').innerHTML =
        '📸 Menampilkan ' + photos.length + ' foto';

    document.querySelectorAll('.galeri-item').forEach(function(item) {
        item.addEventListener('click', function() {
            openLightbox(this.dataset.src);
        });
    });
}

function openLightbox(src) {
    document.getElementById('lightbox').classList.add('active');
    document.getElementById('lightboxImg').src = src;
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}

document.querySelectorAll('.tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.tab-btn').forEach(function(b) {
            b.classList.remove('active');
        });

        this.classList.add('active');
        renderGallery(this.dataset.tab);
    });
});

document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this || e.target.classList.contains('lightbox-close')) {
        closeLightbox();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});

renderGallery('tele');
</script>