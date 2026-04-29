<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'lokasi'       => 'nullable|string|max:255',
            'tanggal_foto' => 'nullable|date',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori'     => [
                'required',
                // HANYA TIGA KATEGORI INI YANG DIIZINKAN
                Rule::in(['Tele', 'Efrata', 'Sihotang']),
            ],
        ], [
            'kategori.in' => 'Pilih salah satu kategori: Tele, Efrata, atau Sihotang.',
        ]);

        try {
            $data = $request->except('gambar');

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $folderName = strtolower($request->kategori);
                // File masuk ke folder: public/galeri/tele atau efrata atau sihotang
                $path = $file->store("galeri/{$folderName}", 'public');
                $data['gambar'] = $path;
            }

            $data['status'] = $request->has('status') ? 1 : 0;
            Galeri::create($data);

            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil disimpan!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}