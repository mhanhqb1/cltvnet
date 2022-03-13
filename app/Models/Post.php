<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'image',
        'thumb_image',
        'description',
        'detail',
        'cate_id',
        'total_view',
        'total_like',
        'total_dislike',
        'video_lenght',
        'source_id',
        'source_type',
        'parent_id',
        'position',
        'tags',
        'stream_url',
        'author_id',
        'crawl_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
