<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Tindakan;
use App\Models\DaftarTindakan;

class TindakanImport implements ToCollection, WithHeadingRow
{private $currentKategori = null;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // Jika kolom kategori di baris ini tidak kosong, simpan sebagai kategori saat ini.
            if (!empty($row['kategori'])) {
                $this->currentKategori = DaftarTindakan::firstOrCreate(
                    ['nama_kategori' => trim($row['kategori'])]
                );
            }

            // Lanjutkan proses hanya jika kita punya kategori saat ini dan data keterangan tidak kosong.
            if ($this->currentKategori && !empty($row['keterangan'])) {
                // Bersihkan harga dari "Rp." dan titik
                $harga = (int) preg_replace('/[Rp. ]/', '', $row['harga']);

                Tindakan::create([
                    'daftar_tindakan_id' => $this->currentKategori->id,
                    'keterangan' => trim($row['keterangan']),
                    'harga' => $harga,
                ]);
            }
        }
    }
}
