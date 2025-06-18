<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';

    /**
     * Mendefinisikan kolom yang boleh diisi dari form.
     */
    protected $fillable = [
        'nama_rak',
        'lokasi',
    ];
}