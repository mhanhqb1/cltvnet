<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTopBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'btn_1_text',
        'btn_1_url',
        'btn_2_text',
        'btn_2_url',
        'image'
    ];
}
