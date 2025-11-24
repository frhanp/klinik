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
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->boolean('notif_reminder_sent')->default(false)->after('catatan_admin');
            $table->boolean('notif_warning_sent')->default(false)->after('notif_reminder_sent');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn(['notif_reminder_sent', 'notif_warning_sent']);
        });
    }
};
