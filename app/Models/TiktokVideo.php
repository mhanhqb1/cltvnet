<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiktokVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'tiktok_id',
        'image',
        'publish_at',
        'description',
        'tags',
        'type',
        'crawl_at',
    ];
}
