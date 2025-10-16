<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_telepon',
        'peran',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function dokter()
    {
        // Jika user adalah dokter, ia punya satu profil dokter
        return $this->hasOne(Dokter::class, 'user_id');
    }

    public function pemesananPasien()
    {
        // User sebagai pasien bisa punya banyak pemesanan
        return $this->hasMany(Pemesanan::class, 'id_pasien');
    }

    /**
     * Mendefinisikan relasi one-to-one ke BiodataPasien.
     */
    public function biodata()
    {
        return $this->hasOne(BiodataPasien::class, 'user_id');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pasien');
    }
}
