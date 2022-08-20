<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'url',
        'image',
        'image_mobile',
        'html',
        'html_mobile',
        'type',
        'status'
    ];

    public static $bannerStatus = [
        0 => 'No',
        1 => 'Yes'
    ];

    public static $bannerTypes = [
        0 => 'Banner',
        1 => 'Popup'
    ];

    public static $bannerTypeValue = [
        'banner' => 0,
        'popup' => 1
    ];

    public static $bannerCountries = [
        'MX' => 'Mexico'
    ];
}
