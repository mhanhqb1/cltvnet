<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Movie;
use App\Models\Cate;
use App\Models\MovieVideo;
use Carbon\Carbon;

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

        // Categories
        $sitemap = $sitemap->add(route('home'));
        $sitemap = $sitemap->add(route('home.new_movie'));
        $sitemap = $sitemap->add(route('home.anime'));
        $sitemap = $sitemap->add(route('home.not_series'));
        $sitemap = $sitemap->add(route('home.series'));
        $cates = Cate::get();
        foreach ($cates as $cate) {
            $sitemap = $sitemap->add(route('home.cate.index', $cate->slug));
        }

        // Movies
        $movies = Movie::orderBy('year', 'desc')->orderBy('id', 'desc')->get();
        foreach ($movies as $v) {
            $sitemap = $sitemap->add(URL::create(route('home.movie_detail', $v->slug))->setLastModificationDate(Carbon::parse($v->updated_at)));
        }

        // Video
        $videos = MovieVideo::with('movie')->whereHas('movie', function($q) {
            $q->where('movies.is_series', 1);
        })->orderBy('id', 'desc')->get();
        foreach ($videos as $v) {
            $sitemap = $sitemap->add(URL::create(route('home.video_detail', ['movieSlug' => $v->movie->slug, 'videoSlug' => $v->slug]))->setLastModificationDate(Carbon::parse($v->updated_at)));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
