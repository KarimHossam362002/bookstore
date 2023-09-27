<?php

namespace Database\Factories;

use App\Models\Product;
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
    public function definition(): array
    {
        return [
            'total' => fake()->numberBetween(1,50),
            'status' => fake()->boolean(),
            'user_id' => User::inRandomOrder()->first()?->id,
            'product_id' => Product::inRandomOrder()->first()?->id,
        ];
    }
}
