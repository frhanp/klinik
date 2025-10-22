<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiodataPasien extends Model
{
    use HasFactory;

    protected $table = 'biodata_pasien';

    protected $fillable = [
        'user_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'alamat',
        'pekerjaan',
        'nama_orang_tua',
        'status_pasien',
        'golongan_darah',
        'riwayat_penyakit',
        'riwayat_alergi_obat',
        'riwayat_alergi_makanan',
        'penyakit_penting',
    ];

    /**
     * Setiap biodata dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
