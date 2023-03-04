<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mp3User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'mp3_user_name',
        'mp3_cookie'
    ];

    public static $MP3_VERSION = '1.8.30';
    public static $MP3_SECRET_KEY = 'acOrvUS15XRW2o9JksiK1KgQ6Vbds8ZW';
    public static $MP3_API_KEY = 'X5BM3w8N7MKozC0B85o4KMlzLZKhV00y';
    public static $MP3_API_URL = 'https://zingmp3.vn';
    public static $MP3_PLAYLIST_API = '/api/v2/user/playlist/get/detail';
    public static $MP3_SONG_DETAIL_API = '/api/v2/song/get/streaming';

    public static function getSongInfo() {
        $today = date('Y-m-d H:i:s', time() - 40*60*60); // -40h
        $limit = 200;
        $songs = Music::with('mp3User')
            ->whereNotNull('mp3_id')
            ->where('mp3_id', '!=', '')
            ->where(function ($q) use ($today){
                $q->whereNull('mp3_crawl_at')->orWhere('mp3_crawl_at', '<', $today);
            })
            ->whereHas('mp3User')
            ->limit($limit)
            ->get();
        foreach ($songs as $s) {
            $ctime = time();
            $mp3Id = $s->mp3_id;
            $apiPath = self::$MP3_SONG_DETAIL_API;
            $sig = self::getMp3Sig($apiPath, $mp3Id, $ctime);
            $url = self::$MP3_API_URL;
            $url .= $apiPath;
            $url .= '?id='.$mp3Id;
            $url .= '&ctime='.$ctime;
            $url .= '&version='.self::$MP3_VERSION;
            $url .= '&sig='.$sig;
            $url .= '&apiKey='.self::$MP3_API_KEY;
            $cookie = $s->mp3User->mp3_cookie;

            $res = callApi($url, $cookie);
            if (empty($res['err']) && !empty($res['data'][128])) {
                $s->mp3_source = $res['data'][128];
                $s->mp3_crawl_at = date('Y-m-d H:i:s');
                $s->save();
            }
        }
    }

    public static function getPlaylistInfo() {
        $today = date('Y-m-d 00:00:00');
        $playLists = Album::with('mp3User')
            ->whereNotNull('mp3_id')
            ->where('mp3_id', '!=', '')
            ->where(function ($q) use ($today){
                $q->whereNull('mp3_crawl_at')->orWhere('mp3_crawl_at', '<', $today);
            })
            ->whereHas('mp3User')
            ->get();
        foreach ($playLists as $p) {
            $ctime = time();
            $mp3Id = $p->mp3_id;
            $apiPath = self::$MP3_PLAYLIST_API;
            $sig = self::getMp3Sig($apiPath, $mp3Id, $ctime);
            $url = self::$MP3_API_URL;
            $url .= $apiPath;
            $url .= '?id='.$mp3Id;
            $url .= '&ctime='.$ctime;
            $url .= '&version='.self::$MP3_VERSION;
            $url .= '&sig='.$sig;
            $url .= '&apiKey='.self::$MP3_API_KEY;
            $cookie = $p->mp3User->mp3_cookie;

            $res = callApi($url, $cookie);
            $data = !empty($res['data']['song']['items']) ? $res['data']['song']['items'] : [];
            if ($data) {
                foreach ($data as $v) {
                    Music::updateOrCreate([
                        'mp3_id' => $v['encodeId']
                    ], [
                        'mp3_id' => $v['encodeId'],
                        'name' => $v['title'],
                        'album_id' => $p->id,
                        'mp3_user_id' => $p->mp3User->id,
                        'duration' => $v['duration']
                    ]);
                }
            }
            $p->mp3_crawl_at = date('Y-m-d H:i:s');
            $p->save();
        }
    }

    public static function getMp3Sig($path, $id, $ctime = '') {
        if (empty($ctime)) {
            $ctime = time();
        }
        $version = self::$MP3_VERSION;
        $secretKey = self::$MP3_SECRET_KEY;
        return getHmac512(
          $path.getHash256("ctime=$ctime"."id=$id"."version=$version"),
          $secretKey
        );
    }
}
