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
    Schema::create('researches', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Judul penelitian
        $table->string('slug')->unique(); // Slug untuk URL yang lebih SEO-friendly
        $table->text('abstract')->nullable(); // Abstrak atau deskripsi
        $table->string('leader_name'); // Nama ketua peneliti
        $table->date('start_date')->nullable(); // Tanggal mulai
        $table->date('end_date')->nullable(); // Tanggal selesai
        $table->string('image')->nullable(); // Path foto sampul/dokumentasi
        $table->enum('status', ['ongoing', 'completed'])->default('ongoing'); // Status berjalan/selesai
        $table->timestamps(); // otomatis membuat created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
