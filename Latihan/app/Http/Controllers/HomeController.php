<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;

class HomeController extends Controller
{
   public function index()
{
    $galeri = Galeri::where('status', true)->latest()->take(6)->get();
    $berita = Berita::with('kategori')->where('status', true)->latest()->take(3)->get();
    
    $destinasi = [
        (object)[
            'slug' => ' Tele',
            'nama' => 'Tele',
            'gambar' => '/images/tele.jpeg',
            'deskripsi' => 'Desa adat dengan makam Raja Hunsa dan budaya Batak'
        ],
        (object)[
            'slug' => 'Efrata',
            'nama' => 'Efrata',
            'gambar' => '/images/efrata.jpeg',
            'deskripsi' => 'Formasi batuan unik dengan spot foto Instagramable'
        ],
        (object)[
            'slug' => 'Sihotang',
            'nama' => 'Sihotang',
            'gambar' => '/images/Sihotang/thumbnail.jpg',
            'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit'
        ]
    ];
    
    return view('pages.home', compact('galeri', 'berita', 'destinasi'));
    }
}