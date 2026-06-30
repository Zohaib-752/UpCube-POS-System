<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Supplier>
 */
class SupplierFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'mobile_no' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['1', '0']),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
