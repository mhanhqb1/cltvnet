<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'image',
        'thumb_image',
        'description',
        'detail',
        'cate_id',
        'published_at',
        'total_view',
        'total_like',
        'total_dislike',
        'video_lenght',
        'source_id',
        'source_type',
        'parent_id',
        'position',
        'tags',
        'stream_url',
        'stream_crawl_at',
        'author_id',
        'crawl_at',
        'status'
    ];

    public static $youtubeApi = 'https://www.googleapis.com/youtube/v3/';

    /*
     * Youtube channel crawler
     */
    public static function youtube_channel_crawler($limit = null){
        # Init
        $today = date('Y-m-d', time());

        # Get list ID
        $channelIds = Author::where(function($query) use ($today){
            $query->where('crawl_at', null);
            $query->orWhere('crawl_at', '<', $today);
        })->where('source_type', 'youtube');
        if (!empty($limit)) {
            $channelIds = $channelIds->limit($limit);
        }
        $channelIds = $channelIds->get();
        if (!$channelIds->isEmpty()) {
            foreach ($channelIds as $c) {
                $videos = self::get_youtube_channel_videos($c);
                foreach ($videos as $video) {
                    self::updateOrCreate([
                        'source_id' => $video['source_id'],
                        'source_type' => $video['source_type']
                    ], $video);
                }
                # Update flag
                $c->crawl_at = $today;
                $c->save();
            }
        }
    }

    /*
     * Get channel videos
     */
    public static function get_youtube_channel_videos($channel, $data = [], $nextToken = Null) {
        # Init
        $channelId = $channel->source_id;
        $apiKey = config('services.google')['youtube_api_key'];
        $apiUrl = self::$youtubeApi."search?part=snippet,id&channelId={$channelId}&key={$apiKey}&order=date&maxResults=50";
        if (!empty($nextToken)) {
            $apiUrl .= "&pageToken={$nextToken}";
        }

        $res = self::call_api($apiUrl);
        if (!empty($res['items'])) {
            foreach ($res['items'] as $v) {
                if ($v['id']['kind'] == 'youtube#video') {
                    $snippet = $v['snippet'];
                    $data[] = [
                        'author_id' => $channel->id,
                        'source_id' => $v['id']['videoId'],
                        'source_type' => 'youtube',
                        'name' => $snippet['title'],
                        'description' => $snippet['description'],
                        'published_at' => date('Y-m-d H:i:s', strtotime($snippet['publishedAt'])),
                        'image' => $snippet['thumbnails']['high']['url']
                    ];
                }

            }
            if (!empty($res['nextPageToken'])) {
                $data = self::get_youtube_channel_videos($channel, $data, $res['nextPageToken']);
            }
        }

        return $data;
    }

    /*
     * Call Api
     */
    protected static function call_api($url) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }
}
