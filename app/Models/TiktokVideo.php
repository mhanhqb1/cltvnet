<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiktokVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unique_id',
        'tiktok_id',
        'image',
        'play_address',
        'publish_at',
        'description',
        'tags',
        'type',
        'crawl_at',
    ];
}
