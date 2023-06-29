<?php

namespace App\Console\Commands;

use App\Models\Post;
use Exception;
use Illuminate\Console\Command;

class EvaNewsCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:EvaNewsCrawler';

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
        $page = 1;
        $limit = 8;
        $maxPage = 1;
        for($page = $maxPage; $page >= 1; $page--) {
            echo $page.PHP_EOL;
            try {
                Post::evaCrawler($page, $limit);
            } catch (Exception $e) {
                echo $e->getMessage().PHP_EOL;
            }
        }
        Post::evaDetailCrawler();
    }
}
