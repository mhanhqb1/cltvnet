<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class TusNovelasCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:TusNovelasCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TusNovelasCrawler';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::tusNovelas();
    }
}
