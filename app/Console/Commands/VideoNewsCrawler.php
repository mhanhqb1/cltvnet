<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Video;

class VideoNewsCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:VideoNewsCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $channelId = 'UCRwA1NUcUnwsly35ikGhp0A';
        Video::youtubeCrawler($channelId);
    }
}
