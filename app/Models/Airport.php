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
        'scenery_sim',
        'scenery_type',
        'charts_link',
        'type',
        'latitude',
        'longitude',
        'iata',
        'country',
        'scheduled_service',
    ];

    protected $casts = [
        'name' => 'array',
        'city' => 'array',
        'runways' => 'array',
        'frequencies' => 'array',
    ];


    public function charts()
    {
        return $this->hasMany(Chart::class);
    }
}
