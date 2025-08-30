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
        Schema::table('obat', function (Blueprint $table) {
            // Menambahkan kolom harga setelah kolom 'stok'
            $table->integer('harga_jual_resep')->default(0)->after('stok');
            $table->integer('harga_jual_non_resep')->default(0)->after('harga_jual_resep');

            // Menambahkan kolom kemasan setelah 'nama_obat'
            $table->string('kemasan')->nullable()->after('nama_obat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('obat', function (Blueprint $table) {
            $table->dropColumn(['harga_jual_resep', 'harga_jual_non_resep', 'kemasan']);
        });
    }
};
