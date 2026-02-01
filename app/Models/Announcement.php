<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'link_url',
        'image_url',
        'published_at',
        'expires_at',
        'is_pinned',
        'created_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_pinned' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('published_at', '<=', now())
                ->orWhereNull('published_at');
        })->where(function ($q) {
            $q->where('expires_at', '>=', now())
                ->orWhereNull('expires_at');
        });
    }

    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }
}
