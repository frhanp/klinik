<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resep extends Model
{
    use HasFactory;
    protected $table = 'resep';
    protected $fillable = ['id_rekam_medis', 'obat', 'aturan_pakai', 'keterangan'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis');
    }
}
