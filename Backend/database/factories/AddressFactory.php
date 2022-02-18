<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => rand(1, 20),
            'homeNo' => $this->faker->numberBetween(100, 999),
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'district' => $this->faker->country,
        ];
    }
}
