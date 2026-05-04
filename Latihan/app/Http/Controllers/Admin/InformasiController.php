<?php
// app/Http/Controllers/Admin/InformasiController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required',
            'konten'   => 'required',
            'kategori' => 'required',
            'gambar'   => 'nullable|image|max:2048', // validasi file
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'penulis'  => $request->penulis ?? 'Admin',
            'status'   => $request->has('status'),
            'gambar'   => null, // kolom path tidak digunakan lagi
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $data['gambar_tipe'] = $file->getMimeType();
            $data['gambar_data'] = file_get_contents($file->getRealPath());
        }

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')
                         ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul'    => 'required',
            'konten'   => 'required',
            'kategori' => 'required',
            'gambar'   => 'nullable|image|max:2048',
        ]);

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'penulis'  => $request->penulis ?? 'Admin',
            'status'   => $request->has('status'),
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $data['gambar_tipe'] = $file->getMimeType();
            $data['gambar_data'] = file_get_contents($file->getRealPath());
        } else {
            // Jika tidak upload gambar baru, pertahankan data lama
            unset($data['gambar_tipe']);
            unset($data['gambar_data']);
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')
                         ->with('success', 'Informasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
                         ->with('success', 'Informasi berhasil dihapus!');
    }
}