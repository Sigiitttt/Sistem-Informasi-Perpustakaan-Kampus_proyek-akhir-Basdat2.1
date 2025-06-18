<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            // Menambahkan index pada kolom foreign key
            $table->index('id_pinjam');
            $table->index('id_buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            $table->dropIndex(['id_pinjam']);
            $table->dropIndex(['id_buku']);
        });
    }
};