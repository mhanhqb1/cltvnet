<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content'
    ];

    public static $pages = [
        'about_us' => 'About us',
        'term_and_services' => 'Term And Services'
    ];
}
