<?php
// app/Http/Controllers/GaleriController.php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Halaman galeri publik
    public function index()
    {
        // Ambil data galeri yang status aktif
        $galeri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Kelompokkan berdasarkan kategori
        $galeriByKategori = [
            'tele' => $galeri->where('kategori', 'Tele'),
            'efrata' => $galeri->where('kategori', 'Efrata'),
            'sihotang' => $galeri->where('kategori', 'Sihotang'),
        ];
        
        return view('pages.galeri', compact('galeriByKategori'));
    }
}