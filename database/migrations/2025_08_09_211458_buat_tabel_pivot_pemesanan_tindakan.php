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
        // Hapus kolom lama jika masih ada
        if (Schema::hasColumn('pemesanan', 'tindakan_awal_id')) {
            Schema::table('pemesanan', function (Blueprint $table) {
                $table->dropForeign(['tindakan_awal_id']);
                $table->dropColumn('tindakan_awal_id');
            });
        }

        // Buat tabel pivot baru
        Schema::create('pemesanan_tindakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanan')->onDelete('cascade');
            $table->foreignId('tindakan_id')->constrained('tindakan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_tindakan');
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreignId('tindakan_awal_id')->nullable()->constrained('tindakan')->onDelete('set null');
        });
    }
};
