<?php
// app/Models/Galeri.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';
    
    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_foto',
        'status',
        'views'
    ];

    protected $casts = [
        'status' => 'boolean',
        'tanggal_foto' => 'date'
    ];

    // Helper untuk mendapatkan path folder berdasarkan kategori
    public static function getPathByKategori($kategori)
    {
        return match($kategori) {
            'Tele' => 'image/Tele/galeri',
            'Efrata' => 'image/Efrata/galeri',
            'Sihotang' => 'image/Sihotang/galeri',
            default => 'image/galeri',
        };
    }
    
    // Helper untuk mendapatkan path publik
    public static function getPublicPathByKategori($kategori)
    {
        return match($kategori) {
            'Tele' => '/image/Tele/galeri',
            'Efrata' => '/image/Efrata/galeri',
            'Sihotang' => '/image/Sihotang/galeri',
            default => '/image/galeri',
        };
    }
}