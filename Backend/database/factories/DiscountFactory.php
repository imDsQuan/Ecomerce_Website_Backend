<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => rand(4,7),
            'desc' => $this->faker->realText,
            'discount_percent' => rand(20, 30),
            'active' => rand(0, 1),
            'price' => rand(40, 30),
        ];
    }
}
