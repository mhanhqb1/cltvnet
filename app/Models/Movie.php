<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'daily_crawl_at'
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
                                    'duration' => convertDuration($v['duration'])
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
}
