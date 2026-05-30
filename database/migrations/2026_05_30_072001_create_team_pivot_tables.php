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
        // 1. Pivot Tabel untuk Penelitian
        Schema::create('research_team', function (Blueprint $table) {
            $table->id();
            // Menyebutkan nama tabel 'researches' dan 'teams' secara eksplisit
            $table->foreignId('research_id')->constrained('researches')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->timestamps();
        });

        // 2. Pivot Tabel untuk Pengabdian Masyarakat (Services)
        Schema::create('service_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('community_services')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->timestamps();
        });

        // 3. Pivot Tabel untuk Luaran (Outputs)
        Schema::create('output_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('output_id')->constrained('outputs')->cascadeOnDelete();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('output_team');
        Schema::dropIfExists('service_team');
        Schema::dropIfExists('research_team');
    }
};
