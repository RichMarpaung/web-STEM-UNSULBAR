<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    // 1. Beri tahu Laravel nama tabel yang benar secara spesifik
    protected $table = 'researches';

    // 2. Kolom yang diizinkan untuk Mass Assignment
    protected $fillable = [
        'title',
        'abstract',
        'slug',
        'leader_name',
        'start_date',
        'end_date',
        'image',
        'status',

    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
