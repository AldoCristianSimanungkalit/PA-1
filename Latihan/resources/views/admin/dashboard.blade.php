@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Statistik -->
<div class="row g-3">

    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
            <div class="stat-label">Total Galeri</div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
            <div class="stat-label">Total Berita</div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
            <div class="stat-label">Total Informasi</div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($totalViews ?? 0) }}</div>
            <div class="stat-label">Total Views</div>
        </div>
    </div>

</div>

<!-- Berita Terbaru -->
<div class="card-table mt-4">

    <h5 class="mb-3">Berita Terbaru</h5>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">

            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse(\App\Models\Berita::latest()->limit(5)->get() as $item)

                <tr>

                    <td>
                        {{ \Illuminate\Support\Str::limit($item->judul, 30) }}
                    </td>

                    <td>
                        {{ $item->tanggal_berita 
                            ? \Carbon\Carbon::parse($item->tanggal_berita)->format('d/m/Y') 
                            : '-' }}
                    </td>

                    <td>
                        @if($item->status)
                            <span class="badge bg-success">Publish</span>
                        @else
                            <span class="badge bg-danger">Draft</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}"
                           class="btn btn-sm btn-primary">
                           Edit
                        </a>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data berita
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

<!-- Quick Actions -->
<div class="action-buttons mt-4 d-flex flex-wrap gap-2">

    <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
        + Galeri
    </a>

    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        + Berita
    </a>

    <a href="{{ route('admin.informasi.create') }}" class="btn btn-warning">
        + Informasi
    </a>

    <a href="{{ url('/') }}" target="_blank" class="btn btn-dark">
        Website
    </a>

</div>

@endsection