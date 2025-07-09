<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = ['user_id', 'spesialisasi', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jadwal()
    {
        // Setiap dokter bisa punya banyak jadwal
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }

    // Relasi: Setiap dokter bisa memiliki banyak pemesanan dari pasien.
    public function pemesananDokter()
    {
        return $this->hasMany(Pemesanan::class, 'id_dokter');
    }
}
