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
    Schema::create('outputs', function (Blueprint $table) {
        $table->id();
        $table->enum('type', ['jurnal', 'hki', 'penghargaan']); // Penanda tipe data
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description')->nullable(); // Bisa berisi abstrak jurnal atau deskripsi penghargaan
        $table->string('issuer')->nullable(); // Penerbit jurnal / Pemberi HKI / Penyelenggara lomba
        $table->date('date')->nullable(); // Tanggal publish / tanggal terbit HKI
        $table->string('url_link')->nullable(); // Link ke jurnal OJS/Scopus atau bukti
        $table->string('image')->nullable(); // Cover jurnal atau foto sertifikat
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
