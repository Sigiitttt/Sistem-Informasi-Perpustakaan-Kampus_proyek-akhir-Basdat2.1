<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'deskripsi',
        'gambar_cover',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
