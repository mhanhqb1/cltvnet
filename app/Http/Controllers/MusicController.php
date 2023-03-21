<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top20 = Music::with('album')
            ->orderBy('total_view', 'desc')
            ->limit(10)
            ->get();
        $topAlbum = Album::with('music')
            ->orderBy('total_view', 'desc')
            ->limit(12)
            ->get();
        return view('front.music.index', compact(
            'top20',
            'topAlbum'
        ));
    }

    public function album_detail($slug) {
        $album = Album::with('music')->where('slug', $slug)->first();
        return view('front.music.album.index', compact(
            'album'
        ));
    }

    public function api_album_detail(Request $request) {
        $id = !empty($request->id) ? $request->id : '';
        $result = [
            'status' => 'OK',
            'data' => ''
        ];
        $album = Album::with('music')->where('id', $id)->first();
        $songs = [];
        foreach ($album->music as $k => $v) {
            $songs[] = [
                'id' => $v->id,
                'index' => $k + 1,
                'name' => $v->name,
                'singer' => $album->name,
                'path' => $v->mp3_source,
                'image' => getImageUrl($v->image, 'music')
            ];
        }
        $result['songs'] = $songs;
        echo json_encode($result);
        exit();
    }

    public function api_music_crawler() {
        $today = date('Y-m-d H:i:s', time() - 30*60*60); // -40h
        $limit = 200;
        $data = [
            'users' => [],
            'songs' => []
        ];
        $songs = Music::with('mp3User')
            ->whereNotNull('mp3_id')
            ->where('mp3_id', '!=', '')
            ->where(function ($q) use ($today){
                $q->whereNull('mp3_crawl_at')->orWhere('mp3_crawl_at', '<', $today);
            })
            ->whereHas('mp3User')
            ->limit($limit)
            ->get();
        foreach ($songs as $v) {
            $data['users'][$v->mp3User->id] = $v->mp3User->mp3_cookie;
            $data['songs'][] = [
                'mp3_user_id' => $v->mp3_user_id,
                'mp3_id' => $v->mp3_id
            ];
        }
        echo json_encode($data);
        exit();
    }

    public function api_music_crawler_save(Request $request) {
        $data = !empty($request->data) ? json_decode($request->data) : [];
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                Music::updateOrCreate([
                    'mp3_id' => $k
                ], [
                    'mp3_id' => $k,
                    'mp3_source' => $v,
                    'mp3_crawl_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
