<?php

namespace App\Imports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ObatImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // [FIX] Menggunakan header yang benar dari file CSV Anda
        return new Obat([
            'nama_obat'             => $row['nama_obat'], // Laravel Excel cukup pintar menangani BOM di sini, pastikan key lain benar
            'kemasan'               => $row['kemasan'],
            'stok'                  => $row['stok'] ?? 0,
            'harga_jual_resep'      => $row['harga_jual_resep'] ?? 0,
            'harga_jual_non_resep'  => $row['harga_jual_non_resep'] ?? 0,
        ]);
    }
}
