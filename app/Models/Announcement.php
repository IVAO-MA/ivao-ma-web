<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'content',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}
