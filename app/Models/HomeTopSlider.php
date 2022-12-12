<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTopSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'number',
        'image'
    ];
}
