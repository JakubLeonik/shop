<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Card;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'leonikjakub@gmail.com',
            'name' => 'Jakub',
            'password' => bcrypt('zaq1@WSX'),
            'email_verified_at' => now()
        ]);
        User::factory(10)->create();
        Category::factory(5)->create();
        Product::factory(50)->create();
        Card::factory(40)->create();
    }
}
