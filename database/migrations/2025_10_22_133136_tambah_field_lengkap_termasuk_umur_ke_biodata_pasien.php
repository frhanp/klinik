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
        Schema::table('biodata_pasien', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable()->after('nik');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');
            $table->unsignedTinyInteger('umur')->nullable()->after('tanggal_lahir'); // Tambahkan kolom umur
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('umur');
            $table->text('alamat')->nullable()->after('jenis_kelamin');
            $table->string('pekerjaan')->nullable()->after('alamat');
            $table->string('nama_orang_tua')->nullable()->comment('Jika pasien anak')->after('pekerjaan');
            $table->string('status_pasien')->nullable()->comment('BPJS, Umum, Inhealth')->after('nama_orang_tua');
            $table->string('golongan_darah', 3)->nullable()->after('status_pasien');
            $table->text('riwayat_penyakit')->nullable()->after('golongan_darah');
            $table->text('riwayat_alergi_obat')->nullable()->after('riwayat_penyakit');
            $table->text('riwayat_alergi_makanan')->nullable()->after('riwayat_alergi_obat');
            $table->text('penyakit_penting')->nullable()->after('riwayat_alergi_makanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_pasien', function (Blueprint $table) {
            $table->dropColumn([
                'tempat_lahir',
                'tanggal_lahir',
                'umur', // Hapus kolom umur
                'jenis_kelamin',
                'alamat',
                'pekerjaan',
                'nama_orang_tua',
                'status_pasien',
                'golongan_darah',
                'riwayat_penyakit',
                'riwayat_alergi_obat',
                'riwayat_alergi_makanan',
                'penyakit_penting',
            ]);
        });
    }
};
