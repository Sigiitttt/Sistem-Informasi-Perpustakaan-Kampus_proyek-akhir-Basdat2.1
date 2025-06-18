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
        Schema::table('peminjaman_header', function (Blueprint $table) {
            // Menambahkan index pada kolom-kolom ini
            $table->index('status_peminjaman');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_header', function (Blueprint $table) {
            // Perintah untuk menghapus index jika migrasi di-rollback
            $table->dropIndex(['status_peminjaman']);
            $table->dropIndex(['user_id']);
        });
    }
};