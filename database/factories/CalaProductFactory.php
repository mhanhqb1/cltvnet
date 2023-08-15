<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalaProduct>
 */
class CalaProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => createSlug($name),
            'image' => $this->faker->imageUrl(),
            'cost' => $this->faker->numberBetween(70000, 100000),
            'price' => $this->faker->numberBetween(170000, 250000),
            'description' => $this->faker->sentence,
            'detail' => $this->faker->paragraph,
        ];
    }
}
