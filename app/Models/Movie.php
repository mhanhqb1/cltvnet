<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'ok_ru_id',
        'ultra_keyword',
        'thumb_image',
        'tusnovelas',
    ];

    public function videos()
    {
        return $this->hasMany(MovieVideo::class)->orderBy('position', 'asc');
    }

    public function lastVideo()
    {
        return $this->hasMany(MovieVideo::class)->orderBy('position', 'desc');
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
            $data = $data->whereHas('cates', function($q) use($params) {
                $q->where('cates.id', $params['cate_id']);
            });
        }
        if (!empty($params['not_cate_id'])) {
            $data = $data->whereHas('cates', function($q) use($params) {
                $q->where('cates.id', '!=', $params['not_cate_id']);
            });
        }
        if (!empty($params['country_id'])) {
            $data = $data->where('country_id', $params['country_id']);
        }
        if (!empty($params['slug'])) {
            $data = $data->where('movies.slug', 'like', '%'.$params['slug'].'%');
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

    public static function dailyPlayListCrawler($limit = 20, $checkTime = true) {
        $time = date('Y-m-d H:i:s', time() - 1*60*60);
        $movies = Movie::whereNotNull('daily_playlist_id')
            ->where('daily_playlist_id', '!=', '');
        if ($checkTime) {
            $movies = $movies->where('daily_crawl_at', '<', $time);
        }
        $movies = $movies->limit($limit)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $m) {
                $playListIds = explode(',', $m->daily_playlist_id);
                foreach ($playListIds as $playListId) {
                    $apiUrl = 'https://api.dailymotion.com/playlist/'.trim($playListId).'/videos?fields=id%2Cduration%2Ctitle&page=1&limit=50';
                    $videos = callApi($apiUrl);
                    if (!empty($videos['list'])) {
                        foreach ($videos['list'] as $v) {
                            $_check = MovieVideo::where('source_urls', $v['id'])->first();
                            if (empty($_check)) {
                                $_name = getVideoNameFromDailyPlayList($v['title'], $m->is_series);
                                echo $m->name.' - '.$_name.PHP_EOL;
                                MovieVideo::create([
                                    'movie_id' => $m->id,
                                    'source_urls' => $v['id'],
                                    'name' => $_name,
                                    'slug' => createSlug($_name),
                                    'duration' => convertDuration($v['duration']),
                                    'position' => str_replace('Capítulo ', '', $_name)
                                ]);
                            } else {
                                // break;
                            }
                        }
                    }
                }
                $m->daily_crawl_at = date('Y-m-d H:i:s');
                $m->save();
            }
        }
    }

    public static function dailyVideoCrawler($limit = 20) {
        $movies = Movie::whereNotNull('daily_video_id')
            ->where('daily_video_id', '!=', '')
            ->whereNull('daily_crawl_at')
            ->limit($limit)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $m) {
                $dailyId = $m->daily_video_id;
                $apiUrl = 'https://api.dailymotion.com/video/'.$dailyId.'?fields=id%2Cduration%2Ctitle';
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
                        $_name = 'Capítulo '.$name[1];
                        $_name1 = explode(' | ', $name[0]);
                        if (count($_name1) == 2) {
                            $_name = $_name1[1];
                        }
                        $check = MovieVideo::where('movie_id', $movie->id)->where('name', $_name)->first();
                        if (empty($check)) {
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
                            $movie->daily_crawl_at = date('Y-m-d H:i:s');
                            $movie->save();
                        }
                    }
                });
            }
        }
    }

    public static function ultraNovelas($url = '', $movieId = '')
    {
        $client = new Client();
        if (empty($url)) {
            $url = 'https://ultranovelast.com/';
        }
        $crawler = $client->request('GET', $url);
        if (!empty($movieId)) {
            $crawler->filter('.ub-block-post-grid .ub-post-grid-items .ub-block-post-grid-text .ub-block-post-grid-title')->each(function ($node) use ($client, $movieId) {
                $href = $node->filter('a')->attr('href');
                if (str_contains($href, "-hd/")) {
                    $text = explode('/', $href);
                    $text = explode('-', $text[count($text) - 2]);
                    $chapter = $text[count($text) - 2];
                    self::ultraNovelasDetail($client, $href, $movieId, $chapter);
                }
            });
            die();
        } else {
            $movieIds = Movie::whereNotNull('ultra_keyword')->where('ultra_keyword', '!=', '')->pluck('id', 'ultra_keyword')->toArray();
            $crawler->filter('.featuredpost .gb-block-post-grid-text .gb-block-post-grid-title')->each(function ($node) use ($client, $movieIds) {
                $href = $node->filter('a')->attr('href');
                if (str_contains($href, "-hd/")) {
                    $text = explode('/', $href);
                    $text = explode('-', $text[count($text) - 2]);
                    $chapter = $text[count($text) - 2];
                    $name = implode('-', array_slice($text, 0, count($text) - 2));
                    if (in_array($name, array_keys($movieIds))) {
                        $movieId = $movieIds[$name];
                        self::ultraNovelasDetail($client, $href, $movieId, $chapter);
                    }
                }
            });
        }
    }

    public static function ultraNovelas2()
    {
        $maxPage = 50;
        $client = new Client();
        $movieIds = Movie::whereNotNull('ultra_keyword')->where('ultra_keyword', '!=', '')->pluck('id', 'ultra_keyword')->toArray();
        for ($page = 1; $page <= $maxPage; $page++) {
            $url = 'https://ultranovelast.com/page/'.$page.'/?s=';
            $crawler = $client->request('GET', $url);
            $crawler->filter('#genesis-content .post .entry-container .entry-title')->each(function ($node) use ($client, $movieIds) {
                $href = $node->filter('a')->attr('href');
                if (str_contains($href, "-hd/")) {
                    $text = explode('/', $href);
                    $text = explode('-', $text[count($text) - 2]);
                    $chapter = $text[count($text) - 2];
                    $name = implode('-', array_slice($text, 0, count($text) - 2));
                    if (in_array($name, array_keys($movieIds))) {
                        $movieId = $movieIds[$name];
                        echo $movieId.' - '.$name.PHP_EOL;
                        self::ultraNovelasDetail($client, $href, $movieId, $chapter);
                    }
                }
            });
        }
    }

    public static function ultraNovelasDetail($client, $url, $movieId, $chapter)
    {
        $crawler2 = $client->request('GET', $url);
        try {
            $crawler2->filter('.wp-block-ub-tabbed-content-tabs-content')->each(function ($node2) use ($movieId, $chapter) {
                if (!empty($node2)) {
                    $okRu = $node2->filter('iframe')->attr('src');
                    $okRu = explode('/', $okRu);
                    $okRu = $okRu[count($okRu) - 1];
                    $_name = 'Capítulo '.$chapter;
                    $check = MovieVideo::where('movie_id', $movieId)->where('name', $_name)->first();
                    if (!empty($check)) {
                        $check->source_urls = $okRu;
                        $check->slug = createSlug($_name);
                        $check->position = $chapter;
                        $check->source_type = MovieVideo::$sourceTypeValue['ok.ru'];
                        $check->save();
                        echo '1.-'.$movieId.'-'.$_name.PHP_EOL;
                    } else {
                        MovieVideo::create([
                            'movie_id' => $movieId,
                            'source_urls' => $okRu,
                            'name' => $_name,
                            'slug' => createSlug($_name),
                            'position' => $chapter,
                            'source_type' => MovieVideo::$sourceTypeValue['ok.ru']
                        ]);
                        echo '2.-'.$movieId.'-'.$_name.PHP_EOL;
                        Movie::where('id', $movieId)->update([
                            'daily_crawl_at' => date('Y-m-d H:i:s')
                        ]);
                    }
                    // MovieVideo::updateOrCreate([
                    //     'movie_id' => $movieId,
                    //     'name' => $_name,
                    // ],[
                    //     'movie_id' => $movieId,
                    //     'source_urls' => $okRu,
                    //     'name' => $_name,
                    //     'slug' => createSlug($_name),
                    //     'position' => $chapter,
                    //     'source_type' => MovieVideo::$sourceTypeValue['ok.ru']
                    // ]);
                }
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function tusNovelas()
    {
        $maxPage = 2;
        $client = new Client();
        $movieIds = Movie::whereNotNull('tusnovelas')->where('tusnovelas', '!=', '')->pluck('id', 'tusnovelas')->toArray();
        for ($page = 1; $page <= $maxPage; $page++) {
            if ($page == 1) {
                $url = 'http://www.tusnovelassd.com/';
            } else {
                $url = 'http://www.tusnovelassd.com/page/'.$page.'/';
            }
            $crawler = $client->request('GET', $url);
            $crawler->filter('#main .posts-wrap .post')->each(function ($node) use ($client, $movieIds) {
                $href = $node->filter('a')->attr('href');
                // echo $href.PHP_EOL;
                if (str_contains($href, "-capitulo")) {
                    $text = explode('/', $href);
                    $text = explode('-', $text[count($text) - 2]);
                    $chapter = $text[count($text) - 2];
                    $name = implode('-', array_slice($text, 0, count($text) - 2));
                    if (in_array($name, array_keys($movieIds))) {
                        $movieId = $movieIds[$name];
                        echo $movieId.' - '.$name.PHP_EOL;
                        self::tusNovelasDetail($client, $href, $movieId, $chapter);
                    }
                }
            });
        }
    }

    public static function tusNovelasDetail($client, $url, $movieId, $chapter)
    {
        $crawler2 = $client->request('GET', $url);
        $a = $crawler2->html();
        $isPre = 0;
        if (str_contains($a, 'Disponible después de su transmisión en vivo')) {
            $isPre = 1;
        }
        try {
            $crawler2->filter('#main .entry-content')->each(function ($node2) use ($movieId, $chapter, $isPre) {
                if (!empty($node2)) {
                    $okRu = $node2->filter('iframe')->attr('data-src');
                    $okRu = explode('/', $okRu);
                    $okRu = $okRu[count($okRu) - 1];
                    $_name = 'Capítulo '.$chapter;
                    $check = MovieVideo::where('movie_id', $movieId)->where('name', $_name)->first();

                    echo $okRu.$_name.PHP_EOL;
                    if (!empty($check)) {
                        $check->source_urls = $okRu;
                        $check->slug = createSlug($_name);
                        $check->position = $chapter;
                        $check->source_type = MovieVideo::$sourceTypeValue['ok.ru'];
                        $check->is_pre = $isPre;
                        $check->save();
                        echo '1.-'.$movieId.'-'.$_name.PHP_EOL;
                    } else {
                        MovieVideo::create([
                            'movie_id' => $movieId,
                            'source_urls' => $okRu,
                            'name' => $_name,
                            'slug' => createSlug($_name),
                            'position' => $chapter,
                            'source_type' => MovieVideo::$sourceTypeValue['ok.ru'],
                            'is_pre' => $isPre
                        ]);
                        echo '2.-'.$movieId.'-'.$_name.PHP_EOL;
                        Movie::where('id', $movieId)->update([
                            'daily_crawl_at' => date('Y-m-d H:i:s')
                        ]);
                    }
                    // MovieVideo::updateOrCreate([
                    //     'movie_id' => $movieId,
                    //     'name' => $_name,
                    // ],[
                    //     'movie_id' => $movieId,
                    //     'source_urls' => $okRu,
                    //     'name' => $_name,
                    //     'slug' => createSlug($_name),
                    //     'position' => $chapter,
                    //     'source_type' => MovieVideo::$sourceTypeValue['ok.ru']
                    // ]);
                }
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
