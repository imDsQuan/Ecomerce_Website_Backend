<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
<<<<<<< HEAD
        return [
            //
=======
        $gender = $this -> faker->randomElement(['male', 'female']);

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender'=>$gender,
            'dob'=>$this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'tel'=>$this->faker->phoneNumber(),
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
        ];
    }
}
