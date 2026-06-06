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
        Schema::create('work_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kegiatan
            $table->string('slug')->unique(); // URL friendly
            $table->text('description')->nullable(); // Deskripsi
            $table->string('image')->nullable(); // Dokumentasi
            $table->string('location'); // Lokasi
            $table->date('date'); // Waktu kegiatan
            $table->timestamps();
        });

        // Tabel Pivot untuk Relasi Many-to-Many dengan Team
        Schema::create('team_work_program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_program_id')->constrained('work_programs')->onDelete('cascade');
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_work_program');
        Schema::dropIfExists('work_programs');
    }
};
