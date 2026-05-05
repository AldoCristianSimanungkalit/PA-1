<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil galeri dengan status true, terbaru, batasi 6
        $galeri = Galeri::where('status', true)->latest()->take(6)->get();
        
        // Ambil berita dengan kategori, status true, terbaru, batasi 3
        $berita = Berita::with('kategori')->where('status', true)->latest()->take(3)->get();
        
        // Data destinasi statis (bisa juga dari database nanti)
        $destinasi = [
            (object)[
                'slug' => 'tele',
                'nama' => 'Tele',
                'gambar' => asset('images/tele.jpeg'),
                'deskripsi' => 'Desa adat dengan makam Raja Hunsa dan budaya Batak'
            ],
            (object)[
                'slug' => 'efrata',
                'nama' => 'Efrata',
                'gambar' => asset('images/efrata.jpeg'),
                'deskripsi' => 'Formasi batuan unik dengan spot foto Instagramable'
            ],
            (object)[
                'slug' => 'sihotang',
                'nama' => 'Sihotang',
                'gambar' => asset('images/Sihotang/thumbnail.jpg'),
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit'
            ]
        ];
        
        return view('pages.home', compact('galeri', 'berita', 'destinasi'));
    }
    
    // Method lain jika diperlukan (umkm, budaya, dll)
}