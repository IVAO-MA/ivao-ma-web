<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticle extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'is_published' => 'boolean',
    ];
}
