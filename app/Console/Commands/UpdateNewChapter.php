<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;

class UpdateNewChapter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:UpdateNewChapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'UpdateNewChapter';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $movies = Movie::with('lastVideo')
            ->whereHas('lastVideo')
            ->where('is_series', 1)
            ->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $movie) {
                echo $movie->name.PHP_EOL;
                $movie->new_chapter = $movie->lastVideo[0]->position;
                $movie->save();
            }
        }
    }
}
