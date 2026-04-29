@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

:root{
    --blue-dark:#003366;
    --blue-medium:#1a4a7a;
    --blue-light:#e8f0f7;
    --gold:#c6a43b;
}

/* HERO */
.galeri-hero{
    min-height:400px;
    background:url('{{ asset("image/galeri.jpg") }}') center/cover no-repeat;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:#fff;
    margin-top:76px;
    padding:80px 20px;
    position:relative;
}

.galeri-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(0,51,102,.6);
}

.galeri-hero div{
    position:relative;
    z-index:2;
}

.galeri-hero h1{
    font-size:3rem;
    margin-bottom:10px;
}

.galeri-hero p{
    font-size:.9rem;
    letter-spacing:.2em;
    text-transform:uppercase;
}

.section{
    padding:60px 0;
    background:var(--blue-light);
}

.container{
    max-width:1100px;
    margin:auto;
    padding:0 20px;
}

/* TABS */
.galeri-tabs{
    display:flex;
    justify-content:center;
    gap:15px;
    flex-wrap:wrap;
    margin:40px 0;
}

.tab-btn{
    border:1px solid rgba(0,51,102,.2);
    background:#fff;
    color:var(--blue-dark);
    padding:10px 24px;
    border-radius:40px;
    cursor:pointer;
    transition:.3s;
}

.tab-btn.active,
.tab-btn:hover{
    background:var(--gold);
    color:#fff;
}

/* GRID */
.galeri-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.galeri-item{
    background:#fff;
    border-radius:14px;
    overflow:hidden;
    cursor:pointer;
    box-shadow:0 6px 18px rgba(0,0,0,.08);
    transition:.3s;
}

.galeri-item:hover{
    transform:translateY(-4px);
}

.galeri-item img{
    width:100%;
    height:260px;
    object-fit:cover;
    display:block;
}

/* LIGHTBOX */
.lightbox{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.92);
    z-index:9999;
    justify-content:center;
    align-items:center;
}

.lightbox.active{
    display:flex;
}

.lightbox img{
    max-width:90%;
    max-height:85vh;
    border-radius:10px;
}

.lightbox-close{
    position:absolute;
    top:20px;
    right:30px;
    font-size:40px;
    color:#fff;
    cursor:pointer;
}

.gallery-counter{
    text-align:center;
    margin-top:25px;
    color:var(--blue-dark);
}

/* RESPONSIVE */
@media(max-width:768px){
    .galeri-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .galeri-hero h1{
        font-size:2rem;
    }
}

@media(max-width:576px){
    .galeri-grid{
        grid-template-columns:1fr;
    }

    .galeri-hero{
        min-height:260px;
    }

    .galeri-hero h1{
        font-size:1.6rem;
    }
}
</style>

<!-- HERO -->
<section class="galeri-hero">
    <div>
        <h1>Galeri Geosite</h1>
        <p>Dokumentasi Keindahan Geopark Danau Toba</p>
    </div>
</section>

<!-- TABS -->
<div class="container">
    <div class="galeri-tabs">
        <button class="tab-btn active" data-tab="tele">Tele</button>
        <button class="tab-btn" data-tab="efrata">Efrata</button>
        <button class="tab-btn" data-tab="sihotang">Sihotang</button>
    </div>
</div>

<!-- GRID -->
<div class="section">
    <div class="container">
        <div class="galeri-grid" id="galeriGrid"></div>
        <div class="gallery-counter" id="galleryCounter"></div>
    </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg">
</div>

<script>
/* ===============================
   DATA DARI CONTROLLER
=================================*/
const galeriData = {
    tele: @json(($galeriByKategori['tele'] ?? collect())->map(function($item){
        return [
            'src' : asset('storage/' . $item->gambar),
            'caption' : $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    })->values()),

    efrata: @json(($galeriByKategori['efrata'] ?? collect())->map(function($item){
        return [
            'src' : asset('storage/' . $item->gambar),
            'caption' : $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    })->values()),

    sihotang: @json(($galeriByKategori['sihotang'] ?? collect())->map(function($item){
        return [
            'src' : asset('storage/' . $item->gambar),
            'caption' : $item->judul . ' - ' . ($item->deskripsi ?? '')
        ];
    })->values())
};

/* ===============================
   RENDER GALLERY
=================================*/
function renderGallery(tab){
    const grid = document.getElementById('galeriGrid');
    const counter = document.getElementById('galleryCounter');

    const photos = galeriData[tab] || [];

    if(photos.length === 0){
        grid.innerHTML = `
            <div style="grid-column:1/-1;text-align:center;padding:60px;color:#003366;">
                Belum ada foto di kategori ini
            </div>
        `;
        counter.innerHTML = '';
        return;
    }

    grid.innerHTML = photos.map(photo => `
        <div class="galeri-item" data-src="${photo.src}">
            <img src="${photo.src}" alt="${photo.caption}">
        </div>
    `).join('');

    counter.innerHTML = `📸 Menampilkan ${photos.length} foto`;

    document.querySelectorAll('.galeri-item').forEach(item=>{
        item.onclick = function(){
            openLightbox(this.dataset.src);
        }
    });
}

/* ===============================
   LIGHTBOX
=================================*/
function openLightbox(src){
    document.getElementById('lightbox').classList.add('active');
    document.getElementById('lightboxImg').src = src;
    document.body.style.overflow='hidden';
}

function closeLightbox(){
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow='';
}

document.getElementById('lightbox').onclick = function(e){
    if(e.target === this || e.target.classList.contains('lightbox-close')){
        closeLightbox();
    }
};

document.addEventListener('keydown',function(e){
    if(e.key === 'Escape'){
        closeLightbox();
    }
});

/* ===============================
   TAB BUTTON
=================================*/
document.querySelectorAll('.tab-btn').forEach(btn=>{
    btn.onclick = function(){
        document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
        this.classList.add('active');
        renderGallery(this.dataset.tab);
    }
});

/* ===============================
   INITIAL LOAD
=================================*/
renderGallery('tele');
</script>

@endsection