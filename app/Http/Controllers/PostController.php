<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            'limit' => 1,
            'cates' => 1
        ]);
        return view('front.post.index', compact('data'));
    }

    public function detail($slug, Request $request)
    {
        $item = Post::with('cates')
            ->where('slug', $slug)
            ->first();
        $pageTitle = $item->name;
        return view('front.post.detail', compact(
            'item',
            'pageTitle'
        ));
    }

    public function cateDetail($slug, Request $request)
    {
        $page = !empty($request->page) ? $request->page : 1;
        $limit = !empty($request->limit) ? $request->limit : 1;
        $item = Category::where('slug', $slug)
            ->first();
        $data = Post::front_get_list([
            'page' => $page,
            'limit' => $limit,
            'cate_ids' => $item->id,
            'paginate' => 1
        ]);
        $pageTitle = $item->name;
        return view('front.post.cate_detail', compact(
            'item',
            'data',
            'pageTitle'
        ));
    }
}
