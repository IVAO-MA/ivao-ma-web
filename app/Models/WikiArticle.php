<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticle extends Model
{
    protected $fillable = ['manual_id', 'title', 'slug', 'content', 'is_published', 'sort_order'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function manual()
    {
        return $this->belongsTo(WikiManual::class, 'manual_id');
    }
}

