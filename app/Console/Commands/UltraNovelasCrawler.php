<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class UltraNovelasCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:UltraNovelasCrawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'UltraNovelasCrawler';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::ultraNovelas2();
    }
}
