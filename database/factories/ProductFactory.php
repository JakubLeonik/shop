<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

// product factory
class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'price' => $this->faker->randomFloat(2,1,100),
            'quantity' => $this->faker->randomNumber(2),
            'description' => $this->faker->text(),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
