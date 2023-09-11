<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformationContact>
 */
class InformationContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' =>fake()->safeEmail(),
            'phone' =>fake()->phoneNumber(),
            'technical_support_address'=>fake()->address(),
            'ongoing_support_address'=>fake()->address(),
        ];
    }
}
