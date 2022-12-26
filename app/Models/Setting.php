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
        'cf_web_name' => [
            'title' => 'Web name',
            'type' => 'text'
        ],
        'cf_web_description' => [
            'title' => 'Web description',
            'type' => 'textarea'
        ],
        'cf_web_logo' => [
            'title' => 'Web logo',
            'type' => 'file'
        ],
        'cf_web_banner' => [
            'title' => 'Web banner',
            'type' => 'file'
        ],
        'cf_web_phone' => [
            'title' => 'Web phone',
            'type' => 'text'
        ],
        'cf_web_address' => [
            'title' => 'Web address',
            'type' => 'text'
        ],
        'cf_web_email' => [
            'title' => 'Web email',
            'type' => 'text'
        ],
        'cf_header_script' => [
            'title' => 'Header Script',
            'type' => 'textarea'
        ],
        'cf_footer_script' => [
            'title' => 'Footer Script',
            'type' => 'textarea'
        ],
    ];
}
