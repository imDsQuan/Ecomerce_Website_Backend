<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender'=>$gender,
            'dob'=>$this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'tel'=>$this->faker->phoneNumber(),
        ];
    }
}
