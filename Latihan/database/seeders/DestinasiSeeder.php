<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run()
    {
        Destinasi::insert([
            [
                'nama' => 'TELE-EFRATA-SIHOTANG',
                'slug' => 'TELE-EFRATA-SIHOTANG',
                'gambar' => 'balige.jpg',
                'deskripsi' => 'Pusat wisata Danau Toba dengan panorama yang indah'
            ],
            [
                'nama' => 'TELE',
                'slug' => 'TELE',
                'gambar' => 'meat.jpg',
                'deskripsi' => 'Desa wisata tradisional di pinggir danau'
            ],
            [
                'nama' => 'EFRATA',
                'slug' => 'EFRATA',
                'gambar' => 'liang.jpg',
                'deskripsi' => 'Goa eksotis dengan pemandangan alam'
            ],
            [
                'nama' => 'SIHOTANG',
                'slug' => 'SIHOTANG',
                'gambar' => 'batu.jpg',
                'deskripsi' => 'Wisata alam unik dan instagramable'
            ]
        ]);
    }
}