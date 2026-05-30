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
    Schema::create('partners', function (Blueprint $table) {
        $table->id();
        $table->enum('type', ['mitra', 'kolaborasi']); // Jenis kerja sama
        $table->string('name'); // Nama instansi/perusahaan
        $table->string('slug')->unique();
        $table->text('description')->nullable(); // Penjelasan ruang lingkup kerja sama
        $table->string('logo')->nullable(); // Path logo instansi
        $table->string('website')->nullable(); // URL website mitra
        $table->date('start_date')->nullable(); // Tanggal mulai MoU
        $table->date('end_date')->nullable(); // Tanggal berakhir MoU (jika ada)
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
