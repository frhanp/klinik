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
        // 1. Tabel Master untuk menyimpan semua jenis tindakan/layanan
        Schema::create('tindakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tindakan');
            $table->unsignedInteger('harga');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Pivot untuk menghubungkan Rekam Medis dengan Tindakan (Many-to-Many)
        Schema::create('rekam_medis_tindakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekam_medis_id')->constrained('rekam_medis')->onDelete('cascade');
            $table->foreignId('tindakan_id')->constrained('tindakan')->onDelete('cascade');
            $table->unsignedInteger('harga_saat_itu'); // Simpan harga saat tindakan dilakukan
            $table->timestamps();
        });

        // 3. Tabel untuk menyimpan data pembayaran
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanan')->onDelete('cascade');
            $table->unsignedBigInteger('total_biaya');
            $table->string('metode_pembayaran')->nullable(); // e.g., 'Tunai', 'Transfer'
            $table->enum('status', ['Belum Lunas', 'Lunas'])->default('Belum Lunas');
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamps();
        });

        // Tambahkan kolom status baru di tabel pemesanan untuk alur pembayaran
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('status')->default('Dipesan')->change(); // Mengubah default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom status tambahan sebelum drop tabel lain
        Schema::table('pemesanan', function (Blueprint $table) {
            // Kembalikan seperti semula jika diperlukan
        });
        
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('rekam_medis_tindakan');
        Schema::dropIfExists('tindakan');
    }
};
