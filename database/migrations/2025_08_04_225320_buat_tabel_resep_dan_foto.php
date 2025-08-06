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
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rekam_medis')->constrained('rekam_medis')->onDelete('cascade');
            $table->string('nama_obat');
            $table->string('dosis');
            $table->text('instruksi');
            $table->timestamps();
        });

        Schema::create('foto_rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rekam_medis')->constrained('rekam_medis')->onDelete('cascade');
            $table->string('path_foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep');
        Schema::dropIfExists('foto_rekam_medis');
    }
};
