<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Post::front_get_list([
            'page' => 1,
            'limit' => 1
        ]);
        print_r($data); die();
        return view('front.post.index', compact('data'));
    }
}
