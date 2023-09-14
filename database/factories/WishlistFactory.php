<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
     /**
     * Define a state to attach products to a wishlist.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withProducts()
    {
        return $this->hasAttached(Product::factory()->count(5), ['quantity' => 1]);
    }
    public function withUsers()
    {
        return $this->hasAttached(User::factory()->count(5), ['quantity' => 1]);
    }
}
