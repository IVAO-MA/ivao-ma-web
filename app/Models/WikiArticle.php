<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticle extends Model
{
    protected $fillable = ['manual_id', 'user_id', 'title', 'slug', 'content', 'is_published', 'sort_order'];

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function changes()
    {
        return $this->hasMany(WikiArticleChange::class, 'wiki_article_id')->latest();
    }
}

