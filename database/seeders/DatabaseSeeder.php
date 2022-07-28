<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Post::factory(100)->create();
        // \App\Models\Movie::factory(5000)->create();
        \App\Models\MovieVideo::factory(1000)->create();
    }
}
