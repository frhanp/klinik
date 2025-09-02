<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tindakan', function (Blueprint $table) {
            // Ganti nama kolom
            $table->renameColumn('nama_tindakan', 'keterangan');

            // Tambahkan foreign key ke tabel kategori
            $table->foreignId('daftar_tindakan_id')->after('id')->constrained('daftar_tindakan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tindakan', function (Blueprint $table) {
            $table->renameColumn('keterangan', 'nama_tindakan');
            $table->dropForeign(['daftar_tindakan_id']);
            $table->dropColumn('daftar_tindakan_id');
        });
    }
};
