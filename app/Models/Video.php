<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected const API_YOUTUBE_URL = 'https://www.googleapis.com/youtube/v3/';
    protected const PART_CHANNEL_YOUTUBE = 'snippet,statistics,brandingSettings,contentDetails';
    protected const PART_PLAYLIST_YOUTUBE = 'snippet,contentDetails';
    protected const PART_LIST_CHANNEL_YOUTUBE = 'snippet,contentDetails';
    protected const PART_LIST_CHANNEL_SUBSCRIPTION_YOUTUBE = 'snippet,contentDetails,subscriberSnippet';
    protected const PART_VIDEO_YOUTUBE = 'snippet,id';
    protected const PART_VIDEO_INFO_YOUTUBE = 'snippet,statistics,liveStreamingDetails';
    protected const PART_VIDEO_TAGS = 'snippet,contentDetails,statistics';
    protected const PART_VIDEO_COMMENT_INFO_YOUTUBE = 'snippet';
    protected const MAX_RESULT_VIDEO = 50;
    protected const MAX_RESULT_COMMENT = 100;
    protected const ORDER_VIDEO = 'date';
    protected const CATEGORY_GAME = 20;
    protected const REGION_CODE = 'jp';
    protected const CHART = 'mostPopular';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'thumb_image',
        'description',
        'detail',
        'tags',
        'source_id',
        'source_type',
        'published_at',
        'crawl_at'
    ];

    public static function youtubeCrawler($channelId) {
        $data = self::getListVideoOfChannel($channelId, [], null, 0, 1);
        if (!empty($data)) {
            foreach ($data as $v) {
                try {
                    echo $v['name'].PHP_EOL;
                    Video::updateOrCreate([
                        'source_id' => $v['source_id'],
                        'source_type' => 0
                    ], $v);
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                }
            }
        }
    }


    public static function getListVideoOfChannel($channelId, $data = [], $nextToken = null, $count = 0, $pageLimit = 0)
    {
        try {
            # Init
            $today = date('Y-m-d', time());
            $apiKey = env('YOUTUBE_KEY');
            $status_stop  = false;
            $apiUrl = self::API_YOUTUBE_URL . 'search?key='.$apiKey.'&part=' . self::PART_VIDEO_YOUTUBE . '&channelId=' . $channelId . '&order=' . self::ORDER_VIDEO . '&maxResults=' . self::MAX_RESULT_VIDEO;
            if (!empty($nextToken)) {
                $apiUrl .= "&pageToken={$nextToken}";
            }

            $res = callApi($apiUrl);
            if (!empty($res['items'])) {
                // increment $count
                $count++;
                echo $count;
                foreach ($res['items'] as $v) {
                    if ($v['id']['kind'] == 'youtube#video') {
                        $snippet = $v['snippet'];
                        $publishedAtCralw = date('Y-m-d H:i:s', strtotime($snippet['publishedAt']));
                        $title = str_replace(" | Noticias Telemundo", '', $snippet['title']);
                        $data[] = [
                            'source_id' => $v['id']['videoId'],
                            'source_type' => 0,
                            'name' => $title,
                            'slug' => createSlug($title),
                            'description' => $snippet['description'],
                            'published_at' => $publishedAtCralw,
                            'image' => $snippet['thumbnails']['high']['url'],
                            'thumb_image' => $snippet['thumbnails']['default']['url']
                        ];
                    }
                }
                if (!empty($pageLimit) && $pageLimit <= $count) {
                    return $data;
                }
                if (!empty($res['nextPageToken']) &&  !$status_stop) {
                    // recursive to get list Video
                    return self::getListVideoOfChannel($channelId, $data, $res['nextPageToken'], $count, $pageLimit);
                }
            } else {
                print_r($res);
            }
        } catch (\Exception $e) {
            print_r($e);
            // return array empty
            return $data;
        }

        return $data;
    }
}
