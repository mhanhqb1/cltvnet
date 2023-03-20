<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AddThumbImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:AddThumbImages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'AddThumbImages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = 20;
        $movies = Movie::whereNull('thumb_image')->limit($limit)->get();
        if (!$movies->isEmpty()) {
            foreach ($movies as $m) {
                try {
                    $path = 'thumbs/' . $m->slug . '-' . time() . '.jpg';
                    $img = Image::make('storage/app/public/' . $m->image);
                    $img->resize(160, 233)->encode('jpg', 80);
                    Storage::disk('public')->put($path, $img);
                    $m->thumb_image = $path;
                    $m->save();
                    echo $path.PHP_EOL;
                } catch (\Exception $e) {
                    print_r($e);
                }
            }
        }
    }
}
