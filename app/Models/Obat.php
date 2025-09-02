<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['nama_obat', 'stok', 'harga_jual_resep', 'harga_jual_non_resep', 'kemasan'];

    public function resep()
    {
        return $this->hasMany(Resep::class, 'obat_id');
    }
}
