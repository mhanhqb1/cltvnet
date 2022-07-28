<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->realTextBetween(30, 150);
        $slug = $this->createSlug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->realTextBetween(150, 350),
            'detail' => $this->faker->realTextBetween(1000, 2500)
        ];
    }

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
