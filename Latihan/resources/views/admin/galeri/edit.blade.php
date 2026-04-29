@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

<style>
    .preview-container{
        margin-top:10px;
    }

    .preview-image{
        max-width:220px;
        width:100%;
        border-radius:8px;
        box-shadow:0 2px 8px rgba(0,0,0,.1);
    }

    .current-image{
        border:2px solid #c6a43b;
        border-radius:8px;
        padding:8px;
        display:inline-block;
        background:#fff;
    }

    .required::after{
        content:" *";
        color:red;
    }
</style>

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Galeri
        </h5>
    </div>

    <div class="card-body">

        {{-- Debug penanda file ini benar-benar terbuka --}}
        {{-- Hapus nanti kalau sudah normal --}}
        <div class="alert alert-success">
            File edit.blade.php terbaru aktif
        </div>

        <form action="{{ route('admin.galeri.update', $galeri->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- Judul --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>

                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul', $galeri->judul) }}"
                           required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>

                    <select name="kategori"
                            class="form-select @error('kategori') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Kategori --</option>

                        <option value="Tele"
                            {{ old('kategori', $galeri->kategori) == 'Tele' ? 'selected' : '' }}>
                            🏞️ Tele
                        </option>

                        <option value="Efrata"
                            {{ old('kategori', $galeri->kategori) == 'Efrata' ? 'selected' : '' }}>
                            💦 Efrata
                        </option>

                        <option value="Sihotang"
                            {{ old('kategori', $galeri->kategori) == 'Sihotang' ? 'selected' : '' }}>
                            🌿 Sihotang
                        </option>

                    </select>

                    <small class="text-muted">
                        Mengubah kategori akan memindahkan gambar ke folder baru
                    </small>

                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">Gambar Saat Ini</label>

                    <div class="current-image mb-2">
                        <img src="{{ asset($galeri->gambar) }}"
                             class="preview-image"
                             alt="Gambar Saat Ini">
                    </div>

                    <label class="form-label">Ganti Gambar (Opsional)</label>

                    <input type="file"
                           name="gambar"
                           id="inputGambar"
                           accept="image/jpeg,image/png,image/jpg"
                           class="form-control @error('gambar') is-invalid @enderror">

                    <small class="text-muted">
                        Format JPG / PNG, maksimal 2MB
                    </small>

                    <div id="previewContainer"
                         class="preview-container"
                         style="display:none;">

                        <label class="mt-2">Preview Gambar Baru</label><br>

                        <img id="previewImage"
                             class="preview-image"
                             alt="Preview">
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>

                    <input type="text"
                           name="lokasi"
                           class="form-control @error('lokasi') is-invalid @enderror"
                           value="{{ old('lokasi', $galeri->lokasi) }}"
                           placeholder="Contoh: Desa Tele">

                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>

                    <input type="date"
                           name="tanggal_foto"
                           class="form-control @error('tanggal_foto') is-invalid @enderror"
                           value="{{ old('tanggal_foto', $galeri->tanggal_foto) }}">

                    @error('tanggal_foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-md-4">

                        <input class="form-check-input"
                               type="checkbox"
                               name="status"
                               value="1"
                               id="statusCheck"
                               {{ old('status', $galeri->status) ? 'checked' : '' }}>

                        <label class="form-check-label" for="statusCheck">
                            Aktifkan
                        </label>

                        <br>

                        <small class="text-muted">
                            Jika aktif, galeri tampil di website
                        </small>

                    </div>
                </div>

            </div>

            <hr>

            <div class="d-flex gap-2">
                <button type="submit"
                        class="btn text-white"
                        style="background:#c6a43b;">
                    <i class="fas fa-save me-1"></i> Update
                </button>

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('inputGambar');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    if (input) {
        input.addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (!file) {
                previewContainer.style.display = 'none';
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                previewImage.src = event.target.result;
                previewContainer.style.display = 'block';
            };

            reader.readAsDataURL(file);
        });
    }

});
</script>

@endsection