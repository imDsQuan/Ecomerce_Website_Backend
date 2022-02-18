<?php

namespace Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminUser>
 */
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
class AdminUserFactory extends Factory
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
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
        ];
    }
}
