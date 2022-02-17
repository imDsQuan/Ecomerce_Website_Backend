<?php

namespace Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPayment>
 */
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
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
<<<<<<< HEAD
            //
=======
            'user_id' => rand(1,30),
            'acount_no' => $this->faker->creditCardNumber,
            'provider' => $this->faker->company,
            'name' => $this->faker->name,
            'expiry' => $this->faker->creditCardExpirationDate,
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
        ];
    }
}
