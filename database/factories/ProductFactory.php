<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'price' => $this->faker->randomFloat(2,1,100),
            'description' => $this->faker->text(),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
