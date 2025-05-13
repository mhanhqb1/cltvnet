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
        'source_type',
        'meta_description',
        'meta_keywords',
        'status',
        'is_pre',
        'twitch_id'
    ];

    public static $sourceTypeValue = [
        'youtube' => 0,
        'hls' => 1,
    ];
    public static $sourceTypes = [
        1 => 'HLS',
        0 => 'Youtube',
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
