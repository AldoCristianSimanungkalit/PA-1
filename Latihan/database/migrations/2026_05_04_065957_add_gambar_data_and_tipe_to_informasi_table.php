<?php
// database/migrations/YYYY_MM_DD_HHMMSS_add_gambar_data_and_tipe_to_informasi_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->binary('gambar_data')->nullable()->after('gambar');
            $table->string('gambar_tipe', 100)->nullable()->after('gambar_data');
        });

        // Ubah dari BLOB ke LONGBLOB (kapasitas 4GB)
        DB::statement('ALTER TABLE informasi MODIFY gambar_data LONGBLOB');
    }

    public function down()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->dropColumn(['gambar_data', 'gambar_tipe']);
        });
    }
};