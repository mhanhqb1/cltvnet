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
            $data = $data->whereHas('cates', function($q) use($params) {
                $q->where('cates.id', $params['cate_id']);
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
