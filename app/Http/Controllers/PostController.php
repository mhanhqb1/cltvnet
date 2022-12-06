<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public $limit = 6;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $page = !empty($request->page) ? $request->page : 1;
        $limit = !empty($request->limit) ? $request->limit : $this->limit;
        $postType = Post::$postTypes['post'];
        $data = Post::front_get_list([
            'page' => $page,
            'limit' => $limit,
            'cates' => 1,
            'type' => $postType,
            'paginate' => 1
        ]);
        $pageTitle = __('Post');
        return view('front.post.index', compact(
            'data',
            'postType',
            'pageTitle'
        ));
    }

    public function productIndex(Request $request)
    {
        $page = !empty($request->page) ? $request->page : 1;
        $limit = !empty($request->limit) ? $request->limit : $this->limit;
        $postType = Post::$postTypes['product'];
        $data = Post::front_get_list([
            'page' => $page,
            'limit' => $limit,
            'cates' => 1,
            'type' => $postType,
            'paginate' => 1
        ]);
        $pageTitle = __('Product');
        return view('front.post.index', compact(
            'data',
            'postType',
            'pageTitle'
        ));
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

    public function productDetail($slug, Request $request)
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
        $limit = !empty($request->limit) ? $request->limit : $this->limit;
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
