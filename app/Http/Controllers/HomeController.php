<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use Illuminate\Http\Request;
use App\Models\MovieVideo;
use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $limit = 18;
        $videos = MovieVideo::with('movie')->orderBy('id', 'asc')->limit($limit)->get();
        $movies = Movie::getList([
            'limit' => $limit
        ]);;
        return view('home', compact('videos', 'movies'));
    }

    public function cateIndex($slug, Request $request)
    {
        $limit = 12;
        $cate = Cate::where('slug', $slug)->first();
        if (empty($cate)) {
            return redirect()->route('home');
        }
        $pageTitle = 'Phim '.$cate->name;
        $movies = Movie::getList([
            'limit' => $limit,
            'cate_id' => $cate->id
        ]);
        return view('home.cate_index', compact('movies', 'cate', 'pageTitle'));
    }

    public function search(Request $request) {
        $limit = 12;
        $keyword = !empty($request->q) ? $request->q : '';
        $pageTitle = 'Tìm kiếm: '.$keyword;
        $movies = Movie::getList([
            'limit' => $limit,
            'slug' => createSlug($keyword)
        ]);
        return view('home.search', compact('movies', 'pageTitle'));
    }

    public function getAnime(Request $request)
    {
        $limit = 12;
        $slug = 'hoat-hinh';
        $cate = Cate::where('slug', $slug)->first();
        if (empty($cate)) {
            return redirect()->route('home');
        }
        $pageTitle = 'Phim '.$cate->name;
        $movies = Movie::getList([
            'limit' => $limit,
            'cate_id' => $cate->id
        ]);
        return view('home.cate_index', compact('movies', 'cate', 'pageTitle'));
    }

    public function getNotSeries(Request $request)
    {
        $limit = 12;
        $pageTitle = 'Phim lẻ';
        $movies = Movie::getList([
            'limit' => $limit,
            'is_series' => 0
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function getSeries(Request $request)
    {
        $limit = 12;
        $pageTitle = 'Phim lẻ';
        $movies = Movie::getList([
            'limit' => $limit,
            'is_series' => 1
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function getNewMovies(Request $request)
    {
        $limit = 12;
        $pageTitle = 'Phim lẻ';
        $movies = Movie::getList([
            'limit' => $limit
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }
}
