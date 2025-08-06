<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoRekamMedis extends Model
{
    use HasFactory;
    protected $table = 'foto_rekam_medis';
    protected $fillable = ['id_rekam_medis', 'path_foto'];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis');
    }
}
