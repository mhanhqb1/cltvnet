<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    public static $headers = [
        'header_1' => 'Header 1 (Top services)',
        'header_2' => 'Header 2 (Top products)',
        'header_3' => 'Header 3 (Top logo)',
    ];
}
