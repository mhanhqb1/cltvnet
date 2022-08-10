<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use App\Models\Movie;
use App\Models\Cate;
use App\Models\MovieVideo;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // creates sitemap with all urls in your website
        $sitemap = Sitemap::create();
        $sitemap = $sitemap->add(route('home'));
        $sitemap = $sitemap->add(route('home.new_movie'));
        $sitemap = $sitemap->add(route('home.anime'));
        $sitemap = $sitemap->add(route('home.not_series'));
        $sitemap = $sitemap->add(route('home.series'));
        echo public_path('sitemap.xml'); die();
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
