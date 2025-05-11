<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Goutte\Client;
use Illuminate\Console\Command;

class GetDanfraNewChapter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:GetDanfraNewChapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GetDanfraNewChapter';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = 20;
        $time = date('Y-m-d H:i:s', time() - 1*60*60);
        $movies = Movie::where(function ($q) use($time) {
            $q->whereNull('danfra_crawl_at')
            ->orWhere('danfra_crawl_at', '<', $time);
        })
            ->whereNotNull('danfra_url')
            ->where('danfra_url', '!=', '')
            ->limit($limit)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $movie) {
                echo $movie->name.PHP_EOL;
                $movie->danfra_new_chapter = $this->danfraCrawler($movie->danfra_url);
                $movie->danfra_crawl_at = date('Y-m-d H:i:s');
                $movie->save();
            }
        }
    }

    public function danfraCrawler($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $maxEpisode = 0;
        $episodes = $crawler->filter('a')->each(function ($node) use (&$maxEpisode) {
            $text = $node->text();
            if (preg_match('/Capítulo\s+(\d+)/i', $text, $matches)) {
                if (!empty($matches[1])) {
                    $episodeNumber = (int) $matches[1];
                    if ($episodeNumber > $maxEpisode) {
                        $maxEpisode = $episodeNumber;
                    }
                }
            }
        });

        return $maxEpisode;
    }
}
