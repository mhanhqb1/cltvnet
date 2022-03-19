<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller {

    /**
     * Homepage
     */
    public static function index() {
        $topVideos = Post::inRandomOrder()->limit(5)->get();
        $trendVideos = Post::inRandomOrder()->limit(10)->get();
        $newVideos = Post::orderBy('published_at', 'desc')->limit(8)->get();
        return view('home.index', compact(
            'newVideos',
            'topVideos',
            'trendVideos'
        ));
    }

}
