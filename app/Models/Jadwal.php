<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ['id_dokter', 'hari', 'jam_mulai', 'jam_selesai', 'durasi_slot_menit'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    // Relasi: Setiap jadwal bisa memiliki banyak pemesanan.
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_jadwal');
    }
}
