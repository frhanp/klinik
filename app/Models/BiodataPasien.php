<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiodataPasien extends Model
{
    use HasFactory;

    protected $table = 'biodata_pasien';

    protected $fillable = [
        'user_id',
        'nik',
    ];

    /**
     * Setiap biodata dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
