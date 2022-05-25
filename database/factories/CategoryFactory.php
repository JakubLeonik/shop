<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

//category factory
class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name'=> $this->faker->text(5),
            'slug' => $this->faker->slug()
        ];
    }
}
