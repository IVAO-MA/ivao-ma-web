<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'icao',
        'name',
        'city',
        'frequencies',
        'runways',
        'picture_path',
        'scenery_link',
        'charts_link',
        'type',
    ];

    protected $casts = [
        'name' => 'array',
        'city' => 'array',
        'frequencies' => 'array',
        'runways' => 'array',
    ];
}
