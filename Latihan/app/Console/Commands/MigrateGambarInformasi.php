<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Informasi;
use Illuminate\Support\Facades\File;

class MigrateGambarInformasi extends Command
{
    protected $signature = 'migrate:gambar-informasi';
    protected $description = 'Pindahkan gambar dari folder ke kolom gambar_data di tabel informasi';

    public function handle()
    {
        $informasiList = Informasi::whereNotNull('gambar')->where('gambar', '!=', '')->get();

        foreach ($informasiList as $informasi) {
            $path = public_path($informasi->gambar); // asumsi kolom 'gambar' berisi path relatif dari public
            if (File::exists($path)) {
                $data = File::get($path);
                $tipe = mime_content_type($path);
                $informasi->gambar_data = $data;
                $informasi->gambar_tipe = $tipe;
                $informasi->save();
                $this->info("✓ ID {$informasi->id}: {$informasi->gambar}");
            } else {
                $this->warn("⚠ File tidak ditemukan: {$path}");
            }
        }

        $this->info("Migrasi selesai.");
    }
}