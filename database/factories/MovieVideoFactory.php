<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = rand(1,50);
        return [
            'name' => $name,
            'slug' => $name,
            'movie_id' => rand(1, 12507),
            'description' => $this->faker->realTextBetween(150, 350),
            'detail' => $this->faker->realTextBetween(1000, 2500),
            'position' => $name
        ];
    }
}
