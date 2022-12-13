<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 10), 
            'product_id' => $this->faker->numberBetween(1, 2), 
            'product_attribute_id' => $this->faker->numberBetween(1, 5), 
            'price' => $this->faker->numberBetween(50, 1000) + 0.00,
            'qty' => $this->faker->numberBetween(2, 10), 
            'total_price' => 9900,
        ];
    }
}
