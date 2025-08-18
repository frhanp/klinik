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
        'nomor_rekam_medis',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'agama',
        'pendidikan_terakhir',
        'pekerjaan',
        'alamat',
    ];

    /**
     * Mendefinisikan relasi one-to-one ke User.
     * Setiap biodata dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
