<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambahkan kolom slug (nullable dulu)
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul');
        });

        // 2. Isi slug untuk data yang sudah ada
        $galeris = \App\Models\Galeri::all();
        foreach ($galeris as $galeri) {
            $baseSlug = Str::slug($galeri->judul);
            $slug = $baseSlug;
            $counter = 1;
            while (\App\Models\Galeri::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $galeri->slug = $slug;
            $galeri->saveQuietly(); // agar tidak memicu event boot() lagi
        }

        // 3. Ubah kolom slug menjadi NOT NULL dan unique
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};