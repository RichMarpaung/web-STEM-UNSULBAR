<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'slug', 'description',
        'logo', 'website', 'start_date', 'end_date'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Local Scopes untuk kemudahan filter
    public function scopeMitra($query)
    {
        return $query->where('type', 'mitra');
    }

    public function scopeKolaborasi($query)
    {
        return $query->where('type', 'kolaborasi');
    }
}
