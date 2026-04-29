<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    /**
     * Menampilkan halaman daftar galeri
     */
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    /**
     * Menampilkan halaman form tambah galeri
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Menyimpan data galeri baru
     */
    public function store(Request $request)
    {
        // 1. VALIDASI DATA
        // Pastikan daftar di Rule::in SAMA PERSIS dengan value di <option> file Blade
        $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'lokasi'       => 'nullable|string|max:255',
            'tanggal_foto' => 'nullable|date',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori'     => [
                'required',
                Rule::in(['Balige', 'Meat', 'Batu Bahisan', 'Liang Sipege', 'Tele', 'Efrata', 'Sihotang']),
            ],
        ], [
            // Custom pesan error bahasa Indonesia
            'kategori.in' => 'Kategori yang dipilih tidak valid.',
            'gambar.required' => 'Wajib mengunggah gambar.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        try {
            // Ambil semua input kecuali gambar
            $data = $request->except('gambar');

            // 2. LOGIKA UPLOAD GAMBAR
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                
                // Membuat nama folder kecil semua dan tanpa spasi (ex: batu_bahisan, liang_sipege)
                $folderName = strtolower(str_replace(' ', '_', $request->kategori));
                
                // Simpan ke storage/app/public/galeri/nama_kategori
                $path = $file->store("galeri/{$folderName}", 'public');
                
                // Simpan path hasil upload ke array data
                $data['gambar'] = $path;
            }

            // 3. LOGIKA CHECKBOX STATUS
            $data['status'] = $request->has('status') ? 1 : 0;

            // 4. SIMPAN KE DATABASE
            Galeri::create($data);

            return redirect()->route('admin.galeri.index')
                             ->with('success', 'Galeri ' . $request->judul . ' berhasil disimpan!');

        } catch (\Exception $e) {
            // Jika ada error, balik ke form dengan input sebelumnya
            return back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data galeri
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file gambar dari storage sebelum hapus data di DB
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Data galeri berhasil dihapus!');
    }
}