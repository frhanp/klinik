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
        Schema::table('resep', function (Blueprint $table) {
            // Hapus kolom nama_obat yang lama
            $table->dropColumn('nama_obat');

            // Tambahkan kolom baru untuk relasi dan jumlah
            $table->foreignId('obat_id')->after('id_rekam_medis')->constrained('obat')->onDelete('cascade');
            $table->integer('jumlah')->default(1)->after('obat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resep', function (Blueprint $table) {
            $table->string('nama_obat');
            $table->dropForeign(['obat_id']);
            $table->dropColumn(['obat_id', 'jumlah']);
        });
    }
};
