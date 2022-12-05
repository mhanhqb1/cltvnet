<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job',
        'image',
        'message'
    ];
}
