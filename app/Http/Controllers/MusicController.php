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
}
