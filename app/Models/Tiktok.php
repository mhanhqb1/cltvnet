<?php

namespace App\Models;

use App\Common\Definition\TiktokType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiktok extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'name',
        'tiktok_id',
        'image',
        'type',
        'crawl_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'type' => TiktokType::class,
        'crawl_at' => 'date:Y-m-d',
    ];
}
