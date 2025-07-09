<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user dokter yang sudah dibuat sebelumnya
        $userDokter = User::where('email', 'anisa.r@klinikgigi.com')->first();

        // Buat data profil dokter jika user ditemukan
        if ($userDokter) {
            Dokter::create([
                'user_id' => $userDokter->id,
                'spesialisasi' => 'Dokter Gigi Umum',
                'foto' => null, // Bisa diisi path foto jika ada
            ]);
        }
    }
}
