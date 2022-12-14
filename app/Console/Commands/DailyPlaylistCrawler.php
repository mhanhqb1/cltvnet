<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class DailyPlaylistCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:DailyPlaylistCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily playlist, video crawler';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::dailyPlayListCrawler();
        Movie::dailyVideoCrawler();
    }
}