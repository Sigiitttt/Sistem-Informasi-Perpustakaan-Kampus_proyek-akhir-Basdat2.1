<?php

// app/Models/PeminjamanDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_detail';
    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_pinjam',
        'id_buku',
    ];

    // Relasi: Detail ini merujuk ke satu Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
