<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailymotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'source_id',
        'type',
        'crawl_at'
    ];

    public static $dailyTypeUser = 0;
    public static $dailyTypePlaylist = 1;

    public static $dailymotionTypes = [
        0 => 'User',
        1 => 'Playlist'
    ];
}
