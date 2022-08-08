<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Country;
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
            'limit' => $limit,
            'not_page' => 1
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

    public function countryIndex($slug, Request $request)
    {
        $limit = 12;
        $country = Country::where('slug', $slug)->first();
        if (empty($country)) {
            return redirect()->route('home');
        }
        $pageTitle = 'Phim '.$country->name;
        $movies = Movie::getList([
            'limit' => $limit,
            'country_id' => $country->id
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
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
        $pageTitle = 'Phim bộ';
        $movies = Movie::getList([
            'limit' => $limit,
            'is_series' => 1
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function getNewMovies(Request $request)
    {
        $limit = 12;
        $pageTitle = 'Phim mới';
        $movies = Movie::getList([
            'limit' => $limit
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function getMovieDetail($movieSlug, Request $request)
    {
        $movie = Movie::with('country', 'videos', 'cates')->where('slug', $movieSlug)->first();
        if (empty($movie)) {
            return redirect()->route('home');
        }
        $pageTitle = $movie->name;
        return view('home.movie_detail', compact('movie', 'pageTitle'));
    }

    public function getVideoDetail($movieSlug, $videoSlug, Request $request)
    {
        $movie = Movie::with('country', 'videos', 'cates')->where('slug', $movieSlug)->first();
        if (empty($movie)) {
            return redirect()->route('home');
        }
        $video = MovieVideo::where('movie_id', $movie->id)->where('slug', $videoSlug)->first();
        if (empty($video)) {
            return redirect()->route('home.movie_detail', $movie->slug);
        }
        $pageTitle = $movie->name . ' - ' . $video->name;
        return view('home.video_detail', compact('movie', 'video', 'pageTitle'));
    }
}
