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
    Schema::table('buku', function (Blueprint $table) {
        $table->foreignId('kategori_id')->nullable()->constrained('kategori')->onDelete('set null')->after('penerbit');
        $table->foreignId('rak_id')->nullable()->constrained('rak')->onDelete('set null')->after('kategori_id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            //
        });
    }
};
