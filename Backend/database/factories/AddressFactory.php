<?php

namespace Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
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
<<<<<<< HEAD
            //
=======
            'user_id' => rand(1, 30),
            'homeNo' => $this->faker->numberBetween(100, 999),
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'district' => $this->faker->country,
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
        ];
    }
}
