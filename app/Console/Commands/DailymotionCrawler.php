<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class DailymotionCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:DailymotionCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily playlist, video, user crawler';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::dailymotionCrawler(100, false);
    }
}
