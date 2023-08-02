<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nutrition>
 */
class NutritionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        $user = User::first();
        return [
            'name' => $name,
            'slug' => $this->createSlug($name),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence,
            'detail' => $this->faker->paragraph,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ];
    }

    public function createSlug($str, $delimiter = '-')
    {
        return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    }
}
