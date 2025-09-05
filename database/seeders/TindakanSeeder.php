<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TindakanImport;
use App\Models\DaftarTindakan;


class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan foreign key check untuk mengosongkan tabel
        Schema::disableForeignKeyConstraints();
        Tindakan::truncate();
        DaftarTindakan::truncate();
        Schema::enableForeignKeyConstraints();

        // Ganti 'data_tindakan.xlsx' dengan nama file Anda jika berbeda
        $filePath = storage_path('app/data_tindakan.xlsx');

        if (file_exists($filePath)) {
            Excel::import(new TindakanImport, $filePath);
            $this->command->info('Data tindakan berhasil diimpor dari Excel.');
        } else {
            $this->command->error('File Excel tidak ditemukan di storage/app/data_tindakan.xlsx');
        }
    }
}
