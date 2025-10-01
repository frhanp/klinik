<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['pemesanan_id', 'total_biaya', 'metode_pembayaran', 'status', 'tanggal_bayar','potongan'];

    /**
     * Relasi one-to-one ke Pemesanan.
     * Setiap pembayaran dimiliki oleh satu pemesanan.
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}
