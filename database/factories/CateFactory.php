<?php

namespace Database\Factories;

use App\Common\Definition\CateType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cate>
 */
class CateFactory extends Factory
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
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement(CateType::values()),
        ];
    }
}
