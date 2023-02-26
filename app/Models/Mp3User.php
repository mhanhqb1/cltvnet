<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mp3User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'mp3_user_name',
        'mp3_cookie'
    ];
}
