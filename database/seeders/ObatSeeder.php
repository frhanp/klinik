<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ObatImport;
use Illuminate\Support\Facades\Artisan;


class ObatSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel dulu agar tidak ada data duplikat
        Obat::query()->delete();

        // Ganti 'data_obat.xlsx' dengan nama file Excel Anda jika berbeda
        $filePath = storage_path('app/data_obat.xlsx');

        if (file_exists($filePath)) {
            Excel::import(new ObatImport, $filePath);
        } else {
            $this->command->error('File Excel tidak ditemukan di storage/app/data_obat.xlsx');
        }
    }
}
