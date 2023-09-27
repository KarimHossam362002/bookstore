<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "total" => fake()->numberBetween(40,800),
            "status" => fake()->boolean(),
            "user_id" => User::inRandomOrder()->first()?->id,
        ];
    }
    public function withProducts()
    {
        return $this->hasAttached(Product::factory()->count(1));
    }
    public function withUsers()
    {
        return $this->hasAttached(User::factory()->count(1));
    }
}
