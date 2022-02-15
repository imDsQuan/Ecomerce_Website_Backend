<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPayment>
 */
class UserPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,30),
            'acount_no' => $this->faker->creditCardNumber,
            'provider' => $this->faker->company,
            'name' => $this->faker->name,
            'expiry' => $this->faker->creditCardExpirationDate,
        ];
    }
}
