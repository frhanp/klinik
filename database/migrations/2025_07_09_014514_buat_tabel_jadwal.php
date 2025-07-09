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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dokter')->constrained('dokter')->onDelete('cascade');
            $table->string('hari'); // Contoh: 'Senin', 'Selasa'
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('durasi_slot_menit')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
