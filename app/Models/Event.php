<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'type',
        'image_path',
        'slug',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];
}
