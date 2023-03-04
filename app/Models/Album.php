<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'total_view',
        'user_id',
        'is_hot',
        'mp3_id',
        'mp3_crawl_at',
        'mp3_user_id'
    ];
}
