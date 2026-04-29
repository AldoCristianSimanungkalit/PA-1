{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
<style>
    .preview-container {
        margin-top: 10px;
        display: none;
    }
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .required:after {
        content: " *";
        color: red;
    }
    /* Warna tema khusus untuk tombol simpan */
    .btn-save {
        background: #c6a43b;
        border: none;
        color: white;
    }
    .btn-save:hover {
        background: #af9134;
        color: white;
    }
</style>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">
            <i class="fas fa-plus-circle me-2" style="color: #c6a43b;"></i>
            Tambah Galeri Baru
        </h5>
    </div>
    <div class="card-body">
        {{-- Form Start --}}
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" id="formGaleri">
            @csrf
            
            <div class="row">
                {{-- Judul Galeri --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul') }}" required placeholder="Masukkan judul galeri">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Kategori (Hanya Tele, Efrata, Sihotang) --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Tele" {{ old('kategori') == 'Tele' ? 'selected' : '' }}>⛰️ Tele</option>
                        <option value="Efrata" {{ old('kategori') == 'Efrata' ? 'selected' : '' }}>🌊 Efrata</option>
                        <option value="Sihotang" {{ old('kategori') == 'Sihotang' ? 'selected' : '' }}>🏡 Sihotang</option>
                    </select>
                    <small class="text-muted">Folder: public/storage/galeri/[kategori]</small>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="4" required placeholder="Ceritakan detail tentang foto ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Upload Gambar --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" required id="inputGambar">
                    <small class="text-muted">Rekomendasi: Aspek rasio 4:3 (Maks. 2MB)</small>
                    
                    {{-- Preview Container --}}
                    <div class="preview-container" id="previewContainer">
                        <img id="previewImage" class="preview-image" alt="Preview Gambar">
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Lokasi Spesifik --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi Spesifik</label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" 
                           value="{{ old('lokasi') }}" placeholder="Contoh: Menara Pandang Tele">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>
                    <input type="date" name="tanggal