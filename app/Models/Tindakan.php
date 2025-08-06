<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindakan extends Model
{
    use HasFactory;
    protected $table = 'tindakan';
    protected $fillable = ['nama_tindakan', 'harga', 'deskripsi'];

    /**
     * Relasi many-to-many ke RekamMedis.
     * Satu tindakan bisa ada di banyak rekam medis.
     */
    public function rekamMedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'rekam_medis_tindakan', 'tindakan_id', 'rekam_medis_id')
                    ->withPivot('harga_saat_itu') // Ambil juga harga saat tindakan dilakukan
                    ->withTimestamps();
    }
}
