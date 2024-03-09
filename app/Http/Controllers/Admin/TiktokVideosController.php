<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TiktokVideoServices;
use Illuminate\Http\Request;

class TiktokVideosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $videos = TiktokVideoServices::get_list($request->all());
        return view('admin.tiktok_videos.index', compact(
            'videos'
        ));
    }
}
