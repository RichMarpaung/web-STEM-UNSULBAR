<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'date',
        'image',
    ];

    /**
     * Override default route key name untuk SEO & Keamanan.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
