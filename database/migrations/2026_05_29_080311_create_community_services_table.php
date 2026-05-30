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
    Schema::create('community_services', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique(); // Tetap gunakan slug!
        $table->text('description')->nullable();
        $table->string('location'); // Lokasi pengabdian (misal: Desa Sukamaju)
        $table->date('date')->nullable(); // Tanggal pelaksanaan
        $table->string('image')->nullable(); // Dokumentasi
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_services');
    }
};
