<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // ... (use HasApiTokens, HasFactory, Notifiable)

    protected $fillable = [
        'name', 'email', 'password', 'nim', 'prodi', 'no_telp', 'alamat',
    ];
    // ... (protected $hidden, $casts)

    // Relasi: Satu user bisa memiliki banyak transaksi peminjaman
    public function peminjamanHeaders()
    {
        return $this->hasMany(PeminjamanHeader::class, 'user_id');
    }
}
