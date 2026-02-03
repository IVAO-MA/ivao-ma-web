<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'identifier',
        'code',
        'name',
        'type',
        'category',
        'url',
    ];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }
}
