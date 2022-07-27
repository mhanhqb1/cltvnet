<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'name',
        'slug',
        'image',
        'description',
        'detail',
        'duration',
        'position',
        'source_urls',
        'meta_description',
        'meta_keywords',
        'status'
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
