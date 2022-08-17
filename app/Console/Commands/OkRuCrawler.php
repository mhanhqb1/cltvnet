<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

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
        Movie::okru();
    }
}
