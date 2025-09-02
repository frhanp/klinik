<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarTindakan extends Model
{
    use HasFactory;

    protected $table = 'daftar_tindakan';

    protected $fillable = ['nama_kategori'];

    /**
     * Mendapatkan semua detail tindakan (sub-tindakan) di bawah kategori ini.
     */
    public function tindakanItems()
    {
        return $this->hasMany(Tindakan::class, 'daftar_tindakan_id');
    }
}
