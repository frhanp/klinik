<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tindakan::create([
            'nama_tindakan' => 'Konsultasi & Pemeriksaan',
            'harga' => 150000,
            'deskripsi' => 'Pemeriksaan awal kondisi gigi dan mulut oleh dokter.',
        ]);

        Tindakan::create([
            'nama_tindakan' => 'Pembersihan Karang Gigi (Scaling)',
            'harga' => 350000,
            'deskripsi' => 'Membersihkan karang gigi pada seluruh bagian rahang.',
        ]);

        Tindakan::create([
            'nama_tindakan' => 'Tambal Gigi Composite',
            'harga' => 400000,
            'deskripsi' => 'Penambalan gigi berlubang dengan bahan sewarna gigi.',
        ]);

        Tindakan::create([
            'nama_tindakan' => 'Cabut Gigi Anak (Tanpa Komplikasi)',
            'harga' => 250000,
            'deskripsi' => 'Pencabutan gigi susu pada anak.',
        ]);
        
        Tindakan::create([
            'nama_tindakan' => 'Cabut Gigi Dewasa (Tanpa Komplikasi)',
            'harga' => 300000,
            'deskripsi' => 'Pencabutan gigi permanen yang tidak memerlukan bedah.',
        ]);

        Tindakan::create([
            'nama_tindakan' => 'Pemutihan Gigi (Bleaching)',
            'harga' => 1500000,
            'deskripsi' => 'Prosedur untuk mencerahkan warna gigi.',
        ]);
    }
}
