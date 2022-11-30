<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::front_get_list([
            'limit' => 3,
            'page' => 1,
            'type' => Post::$postTypes['post']
        ]);
        $products = Post::front_get_list([
            'limit' => 3,
            'page' => 1,
            'type' => Post::$postTypes['product']
        ]);
        $pageTitle = __('Home');
        return view('front.home.index', compact(
            'posts',
            'pageTitle',
            'products'
        ));
    }
}
