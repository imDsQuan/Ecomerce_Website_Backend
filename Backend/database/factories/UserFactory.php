<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this -> faker->randomElement(['male', 'female']);
        return [
            'username' => $this->faker->unique()->userName(),
            'password' => $this->faker->password(6, 32),
            'email' => $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender'=>$gender,
            'remember_token' => Str::random(10),
            'dob'=>$this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'tel'=>$this->faker->phoneNumber(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
