<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gambar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('tipe_file', 100);
            $table->integer('ukuran');
            $table->binary('data'); // sementara buat sebagai BLOB
            $table->string('kategori')->nullable();
            $table->foreignId('informasi_id')->nullable()
                  ->constrained('informasi')
                  ->onDelete('set null');
            $table->timestamps();
        });

        // Ubah kolom 'data' dari BLOB menjadi LONGBLOB (kapasitas 4GB)
        DB::statement('ALTER TABLE gambar MODIFY data LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar');
    }
};