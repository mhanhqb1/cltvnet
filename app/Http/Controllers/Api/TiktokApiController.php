<?php

namespace App\Http\Controllers\Api;

use App\Common\Definition\PaginationDefs;
use App\Http\Controllers\Controller;
use App\Models\Tiktok;
use App\Models\TiktokVideo;
use Illuminate\Http\Request;

class TiktokApiController extends Controller
{
    public function index(Request $request) {
        $limit = $request->get('limit', PaginationDefs::API_LIMIT);
        $today = date('Y-m-d');
        $data = Tiktok::select([
                'id',
                'unique_id',
                'crawl_at',
            ])
            // ->whereNull('crawl_at')
            // ->orWhere('crawl_at', '<', $today)
            ->limit($limit)
            ->get();
        return response($data);
    }

    public function update(Request $request) {
        $data = json_decode($request->get('data', '[]'), true);
        foreach ($data as $v) {
            $v['crawl_at'] = date('Y-m-d');
            $videos = $v['videos'];
            unset($v['videos']);
            $tiktok = Tiktok::updateOrCreate([
                'unique_id' => $v['unique_id']
            ], $v);
            foreach ($videos as $video) {
                $video['type'] = $tiktok->type;
                TiktokVideo::updateOrCreate([
                    'tiktok_id' => $video['tiktok_id']
                ], $video);
            }
        }
        return response($videos);
    }
}
