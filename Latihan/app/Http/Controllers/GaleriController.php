<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriByKategori = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return strtolower($item->kategori);
            })
            ->map(function ($items) {
                return $items->map(function ($item) {
                    return [
                        'title' => $item->judul,
                        'image' => asset($item->gambar),
                        'description' => $item->deskripsi,
                        'kategori' => $item->kategori,
                    ];
                })->values();
            })->toArray();

        return view('pages.galeri', compact('galeriByKategori'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'lokasi'       => 'nullable|string|max:255',
            'tanggal_foto' => 'nullable|date',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori'     => [
                'required',
                // Pastikan nilai ini SAMA PERSIS dengan value di Blade
                Rule::in(['Tele', 'Efrata', 'Sihotang']),
            ],
        ], [
            'kategori.in' => 'Pilih salah satu kategori yang tersedia.',
        ]);

        try {
            $data = $request->except('gambar');

            // 2. Proses Upload Gambar
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                // Mengubah kategori menjadi huruf kecil untuk nama folder (tele/efrata/sihotang)
                $folderName = strtolower($request->kategori);
                
                $path = $file->store("galeri/{$folderName}", 'public');
                $data['gambar'] = $path;
            }

            // 3. Status dan Simpan ke Database
            $data['status'] = $request->has('status') ? 1 : 0;
            Galeri::create($data);

            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil disimpan!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
}