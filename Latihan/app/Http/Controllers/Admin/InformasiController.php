<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'urutan' => 'required|integer|unique:informasi,urutan',
            'status' => 'nullable|boolean',
            'kategori' => 'nullable|string|max:100'   // <--- TAMBAH VALIDASI KATEGORI
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
            'kategori' => $request->kategori ?? 'sejarah'   // <--- NILAI DEFAULT
        ];

        // Konversi gambar ke base64
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64 = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $data['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        // Generate slug dari judul
        $slug = Str::slug($request->judul);
        $count = Informasi::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        $data['slug'] = $slug;

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil ditambahkan!');
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
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'urutan' => 'required|integer|unique:informasi,urutan,' . $id,
            'status' => 'nullable|boolean',
            'kategori' => 'nullable|string|max:100'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
            'kategori' => $request->kategori ?? $informasi->kategori   // <--- PERTAHANKAN NILAI LAMA
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64 = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $data['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        // Update slug hanya jika judul berubah
        if ($informasi->judul != $request->judul) {
            $slug = Str::slug($request->judul);
            $count = Informasi::where('slug', $slug)->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $data['slug'] = $slug;
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->status = !$informasi->status;
        $informasi->save();

        return response()->json(['success' => true, 'status' => $informasi->status]);
    }
}