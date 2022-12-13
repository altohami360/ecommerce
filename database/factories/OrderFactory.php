<?php

namespace Database\Factories;

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
            // 'order_number' => 'order123123',
            'user_id' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->numberBetween(50, 1000) + 0.00,
            'items_qty' => $this->faker->numberBetween(1, 10),
            'payment_method' => $this->faker->randomElement(['cash']),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Cancelled', 'Failed']),
        ];
    }
}
