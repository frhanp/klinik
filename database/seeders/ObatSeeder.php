<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::query()->delete();

        Obat::create([
            'nama_obat' => 'Paracetamol 500mg',
            'kemasan' => 'Strip',
            'satuan' => 'Tablet', // <-- TAMBAHKAN INI
            'stok' => 100,
            'harga_jual_resep' => 5000,
            'harga_jual_non_resep' => 7000,
        ]);

        Obat::create([
            'nama_obat' => 'Amoxicillin 500mg',
            'kemasan' => 'Strip',
            'satuan' => 'Kapsul', // <-- TAMBAHKAN INI
            'stok' => 50,
            'harga_jual_resep' => 15000,
            'harga_jual_non_resep' => 0,
        ]);

        Obat::create([
            'nama_obat' => 'OBH Combi Batuk Flu',
            'kemasan' => 'Botol 100ml',
            'satuan' => 'Botol', // <-- TAMBAHKAN INI
            'stok' => 75,
            'harga_jual_resep' => 18000,
            'harga_jual_non_resep' => 20000,
        ]);
    }
}
