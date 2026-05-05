<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $fillable = [
    'judul',
    'slug',
    'konten',
    'gambar',
    'status',
    'urutan',
    'kategori'   // <--- TAMBAHKAN INI
];

    protected $casts = [
        'status' => 'boolean',
    ];
}