<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'card' => json_encode(Card::factory(1)->create()),
            'delivery_data' => json_encode([
                'name' => 'card_holder_name',
                'delivery_address' => 'delivery_address',
                'city_or_town_name' => 'city_or_town_name',
                'zip_code' => 'zip_code'
            ]),
            'status' => array_rand(['bought', 'paid', 'in_delivery', 'delivered']),
            'totalPrice' => (double)(random_int(100, 50000)/100)
        ];
    }
}
