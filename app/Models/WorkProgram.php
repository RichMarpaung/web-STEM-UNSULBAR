<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProgram extends Model
{
    use HasFactory;

    // Melindungi database dari input yang tidak diinginkan
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'location',
        'date',
    ];

    /**
     * Relasi Many-to-Many ke model Team.
     * Secara eksplisit menyebutkan nama tabel pivot dan foreign key-nya
     * untuk mencegah kesalahan penamaan bawaan Laravel.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_work_program', 'work_program_id', 'team_id');
    }
}
