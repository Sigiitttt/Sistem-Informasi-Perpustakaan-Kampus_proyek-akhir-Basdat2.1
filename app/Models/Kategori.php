<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    /**
     * Mendefinisikan kolom mana saja yang boleh diisi secara massal.
     */
    protected $fillable = ['nama'];
}