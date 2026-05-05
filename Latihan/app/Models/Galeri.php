<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_foto',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'tanggal_foto' => 'date',
    ];

    // Auto-generate slug dari judul
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
            // Pastikan slug unik
            $count = static::where('slug', $galeri->slug)->count();
            if ($count > 0) {
                $galeri->slug = $galeri->slug . '-' . ($count + 1);
            }
        });

        static::updating(function ($galeri) {
            if ($galeri->isDirty('judul')) {
                $galeri->slug = Str::slug($galeri->judul);
                $count = static::where('slug', $galeri->slug)->where('id', '!=', $galeri->id)->count();
                if ($count > 0) {
                    $galeri->slug = $galeri->slug . '-' . ($count + 1);
                }
            }
        });
    }
}