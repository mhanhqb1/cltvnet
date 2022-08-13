<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use App\Models\MovieVideo;
use Goutte\Client;

class OkRuCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:OkRuCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ok.ru video crawler';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
