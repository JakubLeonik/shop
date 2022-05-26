<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    public function definition()
    {
        $products = array_map(function ($product) {
            return [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'quantity_in_card' => 1
            ];
        }, Product::all()->random(10)->all());
        return [
            'user_id' => User::all()->random(),
            'products' => json_encode($products),
        ];
    }
}
