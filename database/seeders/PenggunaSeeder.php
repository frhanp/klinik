<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun untuk Admin
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinikgigi.com',
            'password' => Hash::make('password123'),
            'nomor_telepon' => '081234567890',
            'peran' => 'admin',
        ]);

        // 2. Akun untuk Dokter
        User::create([
            'name' => 'Drg. Anisa Rahmawati',
            'email' => 'anisa.r@klinikgigi.com',
            'password' => Hash::make('password123'),
            'nomor_telepon' => '081298765432',
            'peran' => 'dokter',
        ]);

        // 3. Akun untuk Pasien
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.s@example.com',
            'password' => Hash::make('password123'),
            'nomor_telepon' => '085611223344',
            'peran' => 'pasien',
        ]);
    }
}
