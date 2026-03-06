<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiManual extends Model
{
    protected $fillable = ['domain_id', 'name', 'slug', 'image_url', 'description', 'sort_order'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'sort_order' => 'integer',
    ];

    public function domain()
    {
        return $this->belongsTo(WikiDomain::class, 'domain_id');
    }

    public function articles()
    {
        return $this->hasMany(WikiArticle::class, 'manual_id');
    }
}

