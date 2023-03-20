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
}
