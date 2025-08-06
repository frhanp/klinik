<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['id_pemesanan', 'diagnosis', 'perawatan', 'catatan'];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Relasi: Setiap rekam medis bisa memiliki banyak resep.
    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_rekam_medis');
    }

    // Relasi: Setiap rekam medis bisa memiliki banyak foto.
    public function foto()
    {
        return $this->hasMany(FotoRekamMedis::class, 'id_rekam_medis');
    }

    public function tindakan()
    {
        return $this->belongsToMany(Tindakan::class, 'rekam_medis_tindakan', 'rekam_medis_id', 'tindakan_id')
                    ->withPivot('harga_saat_itu') // Ambil juga harga saat tindakan dilakukan
                    ->withTimestamps();
    }
}
