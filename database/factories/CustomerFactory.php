<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'customer_img' => null,
            'email' => fake()->unique()->safeEmail(),
            'mobile_no' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['1', '0']),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
