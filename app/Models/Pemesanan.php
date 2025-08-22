<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['id_pasien', 'id_dokter', 'id_jadwal', 'tanggal_pesan', 'waktu_pesan', 'catatan', 'status', 'status_pasien', 'nama_pasien_booking'];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function tindakanAwal()
    {
        return $this->belongsToMany(Tindakan::class, 'pemesanan_tindakan', 'pemesanan_id', 'tindakan_id');
    }

    // Relasi: Setiap pemesanan ditujukan untuk satu dokter.
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    // Relasi: Setiap pemesanan terikat pada satu jadwal.
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    // Relasi: Setiap pemesanan akan memiliki satu rekam medis.
    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'id_pemesanan');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id');
    }
}
