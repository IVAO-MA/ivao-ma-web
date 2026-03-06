<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiDomain extends Model
{
    protected $fillable = ['name', 'slug', 'image_url', 'description', 'sort_order'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'sort_order' => 'integer',
    ];

    public function manuals()
    {
        return $this->hasMany(WikiManual::class, 'domain_id');
    }
}

