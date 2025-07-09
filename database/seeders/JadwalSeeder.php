<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari profil dokter
        $dokter = Dokter::first(); // Mengambil dokter pertama yang ada

        if ($dokter) {
            // Jadwal untuk hari Senin
            Jadwal::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Senin',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '15:00:00',
                'durasi_slot_menit' => 30,
            ]);

            // Jadwal untuk hari Rabu
            Jadwal::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Rabu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '16:00:00',
                'durasi_slot_menit' => 30,
            ]);

            // Jadwal untuk hari Jumat
            Jadwal::create([
                'id_dokter' => $dokter->id,
                'hari' => 'Jumat',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '12:00:00',
                'durasi_slot_menit' => 30,
            ]);
        }
    }
}
