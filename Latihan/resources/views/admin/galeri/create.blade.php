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
                
                {{-- Kategori (Singkron dengan Controller: Tele, Efrata, Sihotang) --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        {{-- Value harus SAMA PERSIS dengan Rule::in di Controller --}}
                        <option value="Tele" {{ old('kategori') == 'Tele' ? 'selected' : '' }}>⛰️ Tele</option>
                        <option value="Efrata" {{ old('kategori') == 'Efrata' ? 'selected' : '' }}>🌊 Efrata</option>
                        <option value="Sihotang" {{ old('kategori') == 'Sihotang' ? 'selected' : '' }}>🏡 Sihotang</option>
                    </select>
                    <small class="text-muted">Folder tujuan: public/storage/galeri/[nama_kategori]</small>
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
                    <small class="text-muted">Rekomendasi: Max 2MB (JPG, PNG)</small>
                    
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
                    <input type="date" name="tanggal_foto" class="form-control @error('tanggal_foto') is-invalid @enderror" 
                           value="{{ old('tanggal_foto') }}">
                    @error('tanggal_foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" 
                               id="statusCheck" {{ old('status', '1') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusCheck">
                            <i class="fas fa-check-circle text-success me-1"></i> Aktifkan Galeri
                        </label>
                    </div>
                </div>
            </div>
            
            <hr>
            
            {{-- Tombol Aksi --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save me-2