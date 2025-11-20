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
        Schema::table('rekam_medis', function (Blueprint $table) {
            // Menambahkan kolom SOAP
            $table->text('subject')->nullable()->after('id_pemesanan')->comment('S: Keluhan Pasien (Subjective)');
            $table->text('object')->nullable()->after('subject')->comment('O: Pemeriksaan Fisik (Objective)');
            $table->text('assessment')->nullable()->after('object')->comment('A: Diagnosa Kerja (Assessment)');
            $table->text('plan')->nullable()->after('assessment')->comment('P: Rencana Terapi (Plan)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->dropColumn(['subject', 'object', 'assessment', 'plan']);
        });
    }
};
