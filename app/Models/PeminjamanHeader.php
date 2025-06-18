<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanHeader extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_header';
    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'user_id',
        'tgl_pinjam',
        'tgl_wajib_kembali',
        'status_peminjaman',
    ];

    /**
     * Mendefinisikan relasi bahwa setiap PeminjamanHeader "milik" satu User.
     * 'user_id' adalah foreign key di tabel peminjaman_header.
     * Ini adalah method yang dicari oleh ->relationship('user', ...) di Filament.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi: Satu transaksi memiliki banyak detail buku
     */
    public function details()
    {
        return $this->hasMany(PeminjamanDetail::class, 'id_pinjam');
    }

    /**
     * Relasi: Satu transaksi memiliki satu data pengembalian
     */
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_pinjam');
    }
}