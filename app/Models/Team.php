<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $guarded = ['id'];
    public function researches()
    {
        return $this->belongsToMany(Research::class, 'research_team', 'team_id', 'research_id');
    }

    // Relasi ke tabel services melalui tabel pivot service_team
    public function services() // atau public function communityServices() jika Anda menamainya demikian
    {
        return $this->belongsToMany(CommunityService::class, 'service_team', 'team_id', 'service_id');
    }

    // Relasi ke tabel outputs melalui tabel pivot output_team
    public function outputs()
    {
        return $this->belongsToMany(Output::class, 'output_team', 'team_id', 'output_id');
    }
    public function workPrograms()
    {
        return $this->belongsToMany(WorkProgram::class, 'team_work_program', 'team_id', 'work_program_id');
    }
}
