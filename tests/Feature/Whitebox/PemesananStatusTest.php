<?php

namespace Tests\Feature\Whitebox;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PemesananReminder;
use App\Notifications\PemesananAutoCancelWarning;
use App\Notifications\PemesananAutoCancelled;
use Carbon\Carbon;

class PemesananStatusTest extends TestCase
{
    use RefreshDatabase;

    protected $pasien;
    protected $dokter;
    protected $jadwal;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Setup Data Pendukung Dummy
        // Kita butuh Pasien, Dokter, dan Jadwal agar bisa membuat Pemesanan
        $this->pasien = User::factory()->create(['peran' => 'pasien']);
        $userDokter = User::factory()->create(['peran' => 'dokter']);
        $this->dokter = Dokter::create(['user_id' => $userDokter->id, 'spesialisasi' => 'Gigi', 'foto' => null]);
        $this->jadwal = Jadwal::create([
            'id_dokter' => $this->dokter->id,
            'hari' => Carbon::now()->translatedFormat('l'), // Hari ini
            'jam_mulai' => '00:00', // Full day agar tidak error validasi
            'jam_selesai' => '23:59',
            'durasi_slot_menit' => 30
        ]);
        
        Notification::fake(); // Palsukan notifikasi agar tidak terkirim beneran
    }

    /** JALUR 1: Data Kosong (Tidak ada aksi) */
    public function test_jalur_1_data_kosong()
    {
        $this->artisan('pemesanan:check')->assertExitCode(0);
        
        // Pastikan tidak ada notifikasi terkirim
        Notification::assertNothingSent();
    }

    /** JALUR 2: Belum Waktunya (Jadwal masih lama) */
    public function test_jalur_2_belum_waktunya()
    {
        Pemesanan::create([
            'id_pasien' => $this->pasien->id,
            'id_dokter' => $this->dokter->id,
            'id_jadwal' => $this->jadwal->id,
            'tanggal_pesan' => Carbon::now()->toDateString(),
            'waktu_pesan' => Carbon::now()->addHours(2)->format('H:i'), // Jadwal 2 jam lagi
            'status' => 'Dikonfirmasi',
            'status_pasien' => 'Umum',
            'nama_pasien_booking' => 'Test Belum Waktunya',
            'notif_reminder_sent' => false,
            'notif_warning_sent' => false
        ]);

        $this->artisan('pemesanan:check');
        
        Notification::assertNothingSent();
    }

    /** JALUR 3: Kirim Reminder (H-10 menit) */
    public function test_jalur_3_kirim_reminder()
    {
        $p = Pemesanan::create([
            'id_pasien' => $this->pasien->id,
            'id_dokter' => $this->dokter->id,
            'id_jadwal' => $this->jadwal->id,
            'tanggal_pesan' => Carbon::now()->toDateString(),
            'waktu_pesan' => Carbon::now()->addMinutes(8)->format('H:i'), // Jadwal 8 menit lagi
            'status' => 'Dikonfirmasi',
            'status_pasien' => 'Umum',
            'nama_pasien_booking' => 'Test Reminder',
            'notif_reminder_sent' => false,
            'notif_warning_sent' => false
        ]);

        $this->artisan('pemesanan:check');

        // Pastikan notifikasi Reminder terkirim ke pasien
        Notification::assertSentTo($this->pasien, PemesananReminder::class);
        
        // Pastikan database terupdate
        $this->assertDatabaseHas('pemesanan', [
            'id' => $p->id,
            'notif_reminder_sent' => 1
        ]);
    }

    /** JALUR 4: Kirim Warning (Terlambat 50 menit) */
    public function test_jalur_4_kirim_warning()
    {
        $p = Pemesanan::create([
            'id_pasien' => $this->pasien->id,
            'id_dokter' => $this->dokter->id,
            'id_jadwal' => $this->jadwal->id,
            'tanggal_pesan' => Carbon::now()->toDateString(),
            'waktu_pesan' => Carbon::now()->subMinutes(55)->format('H:i'), // Lewat 55 menit yang lalu
            'status' => 'Dikonfirmasi',
            'status_pasien' => 'Umum',
            'nama_pasien_booking' => 'Test Warning',
            'notif_reminder_sent' => true, // Anggap reminder sudah dikirim sebelumnya
            'notif_warning_sent' => false
        ]);

        $this->artisan('pemesanan:check');

        Notification::assertSentTo($this->pasien, PemesananAutoCancelWarning::class);
        
        $this->assertDatabaseHas('pemesanan', [
            'id' => $p->id,
            'notif_warning_sent' => 1
        ]);
    }

    /** JALUR 5: Auto Cancel (Terlambat > 60 menit) */
    public function test_jalur_5_auto_cancel()
    {
        // [FIX] Atur waktu pura-pura ke jam 12 siang agar aman dari pergantian hari
        $safeTime = Carbon::createFromTime(12, 0, 0);
        Carbon::setTestNow($safeTime); 

        $p = Pemesanan::create([
            'id_pasien' => $this->pasien->id, 
            'id_dokter' => $this->dokter->id, 
            'id_jadwal' => $this->jadwal->id,
            'tanggal_pesan' => $safeTime->toDateString(), // Gunakan tanggal safeTime
            // 70 menit yang lalu dari jam 12 siang = 10:50
            'waktu_pesan' => $safeTime->copy()->subMinutes(70)->format('H:i'), 
            'status' => 'Dikonfirmasi', 
            'status_pasien' => 'Umum', 
            'nama_pasien_booking' => 'Test',
        ]);

        $this->artisan('pemesanan:check');

        Notification::assertSentTo($this->pasien, PemesananAutoCancelled::class);
        $this->assertDatabaseHas('pemesanan', ['id' => $p->id, 'status' => 'Dibatalkan']);
        
        // Kembalikan waktu ke normal (optional, tapi good practice)
        Carbon::setTestNow(); 
    }
}