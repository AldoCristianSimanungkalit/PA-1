<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasis'; // pastikan sesuai nama tabel di DB

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'status',
        'urutan'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}