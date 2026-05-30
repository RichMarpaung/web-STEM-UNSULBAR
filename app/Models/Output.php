<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'issuer',
        'date',
        'url_link',
        'image',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // --- LOCAL SCOPES --- //
    // Ini memudahkan pemanggilan di Controller nanti, contoh: Output::jurnal()->get();

    public function scopeJurnal($query)
    {
        return $query->where('type', 'jurnal');
    }

    public function scopeHki($query)
    {
        return $query->where('type', 'hki');
    }

    public function scopePenghargaan($query)
    {
        return $query->where('type', 'penghargaan');
    }
}
