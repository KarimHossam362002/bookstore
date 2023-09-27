<?php

namespace Database\Factories;

use App\Models\Category;
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
        $discountValue = fake()->numberBetween(1, 100);
        $priceValue =fake()->randomNumber(2);
        return [
            'title' => fake()->title(),
            'description' => fake()->text(200),
            'author' => fake()->name(),
            'pages_num' => fake()->numberBetween(20,400),
            'price' => $priceValue,
            // 'discount' => $discountValue ."%",
            'discount' => $discountValue,
            'price_after_discount' => ($priceValue * $discountValue) / 100,
            'quantity' => fake()->randomNumber(3),
            'product_code' => fake()->creditCardNumber(null,false,'-'),
            'available' => rand(0,1),
            'image' => fake()->imageUrl(),
            "category_id" => Category::inRandomOrder()->first()?->id,


        ];
    }
}
