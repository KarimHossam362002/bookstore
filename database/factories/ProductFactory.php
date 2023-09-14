<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        // $discountValue = fake()->numberBetween(1, 100);
        return [
            'title' => fake()->title(),
            'description' => fake()->text(200),
            'author' => fake()->name(),
            'pages_num' => fake()->numberBetween(20,400),
            'price' => fake()->randomNumber(2),
            // 'discount' => $discountValue ."%",
            'discount' => fake()->numberBetween(10, 100),
            'quantity' => fake()->randomNumber(3),
            'product_code' => fake()->creditCardNumber(null,false,'-'),

        ];
    }
}
