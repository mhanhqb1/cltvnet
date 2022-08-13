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
        'status'
    ];

    public static $sourceTypeValue = [
        'daily' => 0,
        'ok.ru' => 1
    ];
    public static $sourceTypes = [
        0 => 'Dailymotion',
        1 => 'Ok.ru'
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
