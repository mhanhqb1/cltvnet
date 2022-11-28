<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    public static $settings = [
        'web_name' => 'Web Name',
        'web_email' => 'Email',
        'web_phone' => 'Phone',
        'web_address' => 'Address',
        'google_map_url' => 'Google Map Url',
        'facebook_url' => 'Facebook URL',
        'twitter_url' => 'Twitter URL',
        'instagram_url' => 'Instagram URL',
        'ga_id' => 'Google Analytic ID'
    ];
}
