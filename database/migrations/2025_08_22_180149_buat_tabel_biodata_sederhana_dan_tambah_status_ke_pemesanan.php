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
        // 1. Membuat kembali tabel biodata yang lebih sederhana
        Schema::create('biodata_pasien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nik')->unique()->nullable();
            // Anda bisa tambahkan kolom permanen lain di sini jika perlu, misal: tanggal_lahir
            $table->timestamps();
        });

        // 2. Menambahkan kolom status_pasien ke tabel pemesanan
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->enum('status_pasien', ['BPJS', 'Umum', 'Inhealth'])->after('catatan');
            // Tambahkan kolom untuk menyimpan nama pasien saat itu (untuk kasus mendaftarkan orang lain)
            $table->string('nama_pasien_booking')->after('id_pasien');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn('status_pasien');
            $table->dropColumn('nama_pasien_booking');
        });
        Schema::dropIfExists('biodata_pasien');
    }
};
