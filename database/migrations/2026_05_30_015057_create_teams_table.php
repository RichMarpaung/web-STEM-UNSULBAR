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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lengkap berserta gelar
            $table->string('role'); // Jabatan (Misal: Ketua Pusat Studi, Peneliti Utama)
            $table->string('image')->nullable(); // Foto profil anggota tim
            $table->string('email')->nullable(); // Opsional: Kontak email

            // Kolom Indeksasi Akademik (Menggantikan LinkedIn)
            $table->string('scopus_url')->nullable();  // Opsional: Profil Scopus
            $table->string('sinta_url')->nullable();   // Opsional: Profil SINTA
            $table->string('scholar_url')->nullable(); // Opsional: Profil Google Scholar

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
