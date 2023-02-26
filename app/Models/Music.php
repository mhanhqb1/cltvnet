<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'album_id',
        'image',
        'duration',
        'total_view',
        'mp3_user_id',
        'mp3_id',
        'mp3_source',
        'mp3_crawl_at'
    ];

    public function cates()
    {
        return $this->hasManyThrough(Category::class, MusicCate::class, 'music_id', 'id', 'id', 'cate_id');
    }
}
