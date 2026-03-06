<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticleChange extends Model
{
    protected $fillable = ['wiki_article_id', 'user_id', 'description'];

    public function article()
    {
        return $this->belongsTo(WikiArticle::class, 'wiki_article_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
