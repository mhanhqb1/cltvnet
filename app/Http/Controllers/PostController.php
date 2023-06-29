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
        $item->total_view = $item->total_view + 1;
        $item->save();
        $related = Post::where('id', '!=', $item->id)
            ->orderBy('total_view', 'desc')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $pageDescription = $item->description;
        $pageTitle = $item->name;
        $pageKeywords = !empty($item->meta_keywords) ? $item->meta_keywords : 'tin tức, tin tuc, tin tuc 24h, tin tuc trong ngay, tin moi nhat, tin tuc moi';
        $pageImage = getImageUrl($item->image);
        return view('front.post.detail', compact(
            'item',
            'related',
            'pageTitle',
            'pageDescription',
            'pageKeywords',
            'pageImage'
        ));
    }
}
