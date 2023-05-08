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
        $videos = Movie::with('lastVideo')
            ->whereHas('lastVideo')
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();
        $movies = Movie::getList([
            'limit' => $limit,
            'not_page' => 1,
            'not_cate_id' => 15
        ]);
        $movies2 = Movie::getList([
            'limit' => $limit,
            'not_page' => 1,
            'cate_id' => 15
        ]);
        return view('home', compact('videos', 'movies', 'movies2'));
    }

    public function cateIndex($slug, Request $request)
    {
        $limit = 12;
        $cate = Cate::where('slug', $slug)->first();
        if (empty($cate)) {
            return redirect()->route('home');
        }
        $pageTitle = $cate->name;
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
        $pageTitle = 'Novelas '.$country->name;
        $movies = Movie::getList([
            'limit' => $limit,
            'country_id' => $country->id
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function search(Request $request) {
        $limit = 12;
        $keyword = !empty($request->q) ? $request->q : '';
        $pageTitle = 'Búsqueda: '.$keyword;
        $movies = Movie::getList([
            'limit' => $limit,
            'slug' => createSlug($keyword)
        ]);
        return view('home.search', compact('movies', 'pageTitle'));
    }

    public function tvShow(Request $request)
    {
        $limit = 12;
        $cate = Cate::find(15);
        if (empty($cate)) {
            return redirect()->route('home');
        }
        $pageTitle = $cate->name;
        $movies = Movie::getList([
            'limit' => $limit,
            'cate_id' => $cate->id
        ]);
        return view('home.cate_index', compact('movies', 'cate', 'pageTitle'));
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
        $pageTitle = 'Series';
        $movies = Movie::getList([
            'limit' => $limit,
            'is_series' => 1
        ]);
        return view('home.cate_index', compact('movies', 'pageTitle'));
    }

    public function getNewMovies(Request $request)
    {
        $limit = 12;
        $pageTitle = 'Nuevas películas';
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
        $metaDescription = $movie->description;
        $metaKeywords = $movie->tags;
        $pageImage = getImageUrl($movie->image);
        $cateIds = [];
        if (!empty($movie->cates)) {
            foreach ($movie->cates as $v) {
                $cateIds[] = $v->id;
            }
        }
        $relatedMovies = Movie::with('country', 'cates')
            ->where('id', '!=', $movie->id)
            // ->where('country_id', $movie->country_id)
            ->whereHas('cates', function ($q) use ($cateIds) {
                $q->whereIn('cates.id', $cateIds);
            })
            ->orderBy('year', 'desc')
            ->orderBy('id', 'desc')
            ->limit(30)
            ->get();
        return view('home.movie_detail', compact('relatedMovies', 'movie', 'pageTitle', 'metaDescription', 'metaKeywords', 'pageImage'));
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
        $preVideo = MovieVideo::where('movie_id', $movie->id)
            ->where('id', '!=', $video->id)
            ->where('position', '<', $video->position)
            ->orderBy('position', 'desc')
            ->first();
        $nextVideo = MovieVideo::where('movie_id', $movie->id)
            ->where('id', '!=', $video->id)
            ->where('position', '>', $video->position)
            ->orderBy('position', 'asc')
            ->first();
        $pageTitle = $movie->name . ' - ' . $video->name;
        $metaDescription = $movie->description;
        $metaKeywords = $movie->tags;
        $metaKeywords .= ', '.strtolower($movie->name.' '.$video->name);
        $pageImage = getImageUrl($movie->image);

        // Get related movies
        $cateIds = [];
        if (!empty($movie->cates)) {
            foreach ($movie->cates as $v) {
                $cateIds[] = $v->id;
            }
        }
        $relatedMovies = Movie::with('country', 'cates')
            ->where('id', '!=', $movie->id)
            // ->where('country_id', $movie->country_id)
            ->whereHas('cates', function ($q) use ($cateIds) {
                $q->whereIn('cates.id', $cateIds);
            })
            ->orderBy('year', 'desc')
            ->orderBy('id', 'desc')
            ->limit(30)
            ->get();
        return view('home.video_detail', compact(
            'movie',
            'video',
            'pageTitle',
            'metaDescription',
            'metaKeywords',
            'pageImage',
            'preVideo',
            'nextVideo',
            'relatedMovies'
        ));
    }

    public function dailymotion(Request $request)
    {
        $params = $request->all();
        $limit = !empty($params['limit']) ? $params['limit'] : 100;
        $page = !empty($params['page']) ? $params['page'] : 1;
        Movie::dailyPlayListCrawler($limit, false);
    }

    public function okru(Request $request)
    {
        $params = $request->all();
        $limit = !empty($params['limit']) ? $params['limit'] : 100;
        $page = !empty($params['page']) ? $params['page'] : 1;
        Movie::okru();
    }

    public function videoCrawler()
    {
        $movies = Movie::pluck('name', 'id')->toArray();
        return view('home.video_crawler', compact(
            'movies',
        ));
    }
    public function videoCrawlerSave(Request $request)
    {
        $link = !empty($request->link) ? $request->link : '';
        $movieId = !empty($request->movie_id) ? $request->movie_id : '';
        if (!empty($movieId) && !empty($link)) {
            Movie::ultraNovelas($link, $movieId);
        }
    }
}
