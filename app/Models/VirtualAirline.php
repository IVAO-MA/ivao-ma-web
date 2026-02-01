<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualAirline extends Model
{
    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'hubs',
        'aircraft',
        'is_active',
    ];

    protected $casts = [
        'hubs' => 'array',
        'aircraft' => 'array',
        'is_active' => 'boolean',
    ];
}
