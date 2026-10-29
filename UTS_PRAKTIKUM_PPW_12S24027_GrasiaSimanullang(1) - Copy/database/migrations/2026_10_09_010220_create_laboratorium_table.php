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
    Schema::create('bukus', function (Blueprint $table) {
        $table->id();
        $table->string('ruangan', 200)->index();
        $table->string('kode_aset', 150);
        $table->string('nama_perangkat', 100);
        $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
        $table->unsignedInteger('stok')->default(0);
        $table->text('sinopsis')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorium');
    }
};
