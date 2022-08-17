<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dailymotion;
use Exception;
use Illuminate\Support\Facades\Storage;
use Goutte\Client;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'detail',
        'is_series',
        'country_id',
        'year',
        'tags',
        'daily_playlist_id',
        'daily_video_id',
        'daily_crawl_at',
        'ok_ru_id'
    ];

    public function videos()
    {
        return $this->hasMany(MovieVideo::class)->orderBy('position', 'asc');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cates()
    {
        return $this->hasManyThrough(Cate::class, MovieCate::class, 'movie_id', 'id', 'id', 'cate_id');
    }

    public static function getList($params)
    {
        // Init
        $data = self::whereHas('videos');

        // Filter
        if (isset($params['is_series'])) {
            $data = $data->where('is_series', $params['is_series']);
        }
        if (!empty($params['cate_id'])) {
            $data = $data->whereHas('cates', function ($q) use ($params) {
                $q->where('cates.id', $params['cate_id']);
            });
        }
        if (!empty($params['country_id'])) {
            $data = $data->where('country_id', $params['country_id']);
        }
        if (!empty($params['slug'])) {
            $data = $data->where('movies.slug', 'like', '%' . $params['slug'] . '%');
        }

        // Paginate
        if (!empty($params['limit']) && !empty($params['not_page'])) {
            $data = $data->limit($params['limit']);
        }
        $data = $data->orderBy('year', 'desc')->orderBy('id', 'desc');

        if (!empty($params['not_page'])) {
            $data = $data->get();
        } else {
            $data = $data->paginate($params['limit']);
        }

        return $data;
    }

    public static function dailyPlayListCrawler($limit = 20, $checkTime = true)
    {
        $time = date('Y-m-d H:i:s', time() - 12 * 3600);
        $movies = Movie::whereNotNull('daily_playlist_id')
            ->where('daily_playlist_id', '!=', '');
        if ($checkTime) {
            $movies = $movies->where('daily_crawl_at', '<', $time);
        }
        $movies = $movies->limit($limit)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $m) {
                $playListId = $m->daily_playlist_id;
                $apiUrl = 'https://api.dailymotion.com/playlist/' . $playListId . '/videos?fields=id%2Cduration%2Ctitle&page=1&limit=100';
                $videos = callApi($apiUrl);
                if (!empty($videos['list'])) {
                    foreach ($videos['list'] as $v) {
                        $_check = MovieVideo::where('source_urls', $v['id'])->first();
                        if (empty($_check)) {
                            $position = 0;
                            if (!empty($m->is_series)) {
                                $_names = explode(' - ', $v['title']);
                                if (count($_names) != 2) {
                                    continue;
                                }
                                $position = $_names[1];
                            }
                            $_name = getVideoNameFromDailyPlayList($v['title'], $m->is_series);
                            MovieVideo::create([
                                'movie_id' => $m->id,
                                'source_urls' => $v['id'],
                                'name' => $_name,
                                'slug' => createSlug($_name),
                                'duration' => convertDuration($v['duration']),
                                'position' => $position
                            ]);
                        } else {
                            break;
                        }
                    }
                }
                $m->daily_crawl_at = date('Y-m-d H:i:s');
                $m->save();
            }
        }
    }

    public static function dailyVideoCrawler($limit = 20)
    {
        $movies = Movie::whereNotNull('daily_video_id')
            ->where('daily_video_id', '!=', '')
            ->whereNull('daily_crawl_at')
            ->limit($limit)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $m) {
                $dailyId = $m->daily_video_id;
                $apiUrl = 'https://api.dailymotion.com/video/' . $dailyId . '?fields=id%2Cduration%2Ctitle';
                $data = callApi($apiUrl);
                if (!empty($data['id'])) {
                    $_name = getVideoNameFromDailyPlayList($data['title'], $m->is_series);
                    MovieVideo::updateOrCreate([
                        'movie_id' => $m->id,
                        'source_urls' => $data['id']
                    ], [
                        'movie_id' => $m->id,
                        'source_urls' => $data['id'],
                        'name' => $_name,
                        'slug' => createSlug($_name),
                        'duration' => convertDuration($data['duration'])
                    ]);
                }
                $m->daily_crawl_at = date('Y-m-d H:i:s');
                $m->save();
            }
        }
    }

    public static function dailyMotionCrawler($limit = 100, $checkTime = true)
    {
        $today = date('Y-m-d');
        if ($checkTime) {
            $daily = Dailymotion::whereNull('crawl_at')->orWhere('crawl_at', '<', $today)->get();
        } else {
            $daily = Dailymotion::get();
        }
        if (!$daily->isEmpty()) {
            $countries = Country::pluck('id', 'name')->toArray();
            $cates = Cate::pluck('id', 'name')->toArray();
            foreach ($daily as $v) {
                $dailyId = $v->source_id;
                $apiUrl = '';
                if ($v->type == Dailymotion::$dailyTypeUser) {
                    $apiUrl = 'https://api.dailymotion.com/user/' . $dailyId . '/videos?fields=id%2Cduration%2Ctitle%2Cdescription%2Ctags&page=1&limit=100';
                } elseif ($v->type == Dailymotion::$dailyTypePlaylist) {
                    $apiUrl = 'https://api.dailymotion.com/playlist/' . $dailyId . '/videos?fields=id%2Cduration%2Ctitle%2Cdescription%2Ctags&page=1&limit=100';
                }
                if (!empty($apiUrl)) {
                    $videos = callApi($apiUrl);
                    if (!empty($videos['list'])) {
                        foreach ($videos['list'] as $video) {
                            $_check = MovieVideo::where('source_urls', $video['id'])->first();
                            if (empty($_check)) {
                                $movieInfo = explode(' | ', $video['title']);
                                if (count($movieInfo) != 4) {
                                    continue;
                                }
                                // Add movie
                                $_des = $video['description'];
                                $desInfo = explode(' | ', $_des);
                                $_image = '';
                                if (count($desInfo) == 2) {
                                    $_des = str_replace('<br />', '', $desInfo[1]);
                                    $_image = 'phim/'.createSlug($movieInfo[0]).'.jpg';
                                    try {
                                        Storage::put(
                                            'public/'.$_image,
                                            file_get_contents($desInfo[0])
                                        );
                                    } catch(Exception $e) {
                                        print_r($e->getMessage());
                                    }
                                }
                                $movie = Movie::create([
                                    'name' => $movieInfo[0],
                                    'slug' => createSlug($movieInfo[0]),
                                    'country_id' => !empty($countries[$movieInfo[1]]) ? $countries[$movieInfo[1]] : 0,
                                    'year' => $movieInfo[2],
                                    'image' => $_image,
                                    'description' => $_des,
                                    'tags' => !empty($video['tags']) ? implode(', ', $video['tags']) : ''
                                ]);
                                // Add video
                                $_name = getVideoNameFromDailyPlayList($video['title'], 0);
                                MovieVideo::create([
                                    'movie_id' => $movie->id,
                                    'source_urls' => $video['id'],
                                    'name' => $_name,
                                    'slug' => createSlug($_name),
                                    'duration' => convertDuration($v['duration'])
                                ]);
                                // Add cate movie
                                $_cates = explode(' - ', $movieInfo[3]);
                                foreach ($_cates as $c) {
                                    if (!empty($cates[$c])) {
                                        MovieCate::create([
                                            'movie_id' => $movie->id,
                                            'cate_id' => $cates[$c]
                                        ]);
                                    }
                                }
                            } else {
                                // break;
                            }
                        }
                    }
                }
                $v->crawl_at = $today;
                $v->save();
            }
        }
    }

    public static function okru()
    {
        $client = new Client();
        $movies = Movie::whereNotNull('ok_ru_id')->where('ok_ru_id', '!=', '')->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $movie) {
                $url = 'https://ok.ru/video/'.$movie->ok_ru_id;
                $crawler = $client->request('GET', $url);
                $crawler->filter('.video-content_cnt .video-card')->each(function ($node) use ($movie) {
                    $href = $node->filter('.video-card_img-w a')->attr('href');
                    $name = $node->filter('.video-card_n-w a')->text();
                    $sourceId = '';
                    if (preg_match('/video\/(.*?)\?/', $href, $match) == 1) {
                        $sourceId = $match[1];
                    }
                    $name = explode(' - ', $name);
                    if (!empty($sourceId) && count($name) == 2) {
                        $_name = 'Tập '.$name[1];
                        MovieVideo::updateOrCreate([
                            'movie_id' => $movie->id,
                            'name' => $_name,
                        ],[
                            'movie_id' => $movie->id,
                            'source_urls' => $sourceId,
                            'name' => $_name,
                            'slug' => createSlug($_name),
                            'position' => trim($name[1]),
                            'source_type' => MovieVideo::$sourceTypeValue['ok.ru']
                        ]);
                    }
                });
            }
        }
    }
}
