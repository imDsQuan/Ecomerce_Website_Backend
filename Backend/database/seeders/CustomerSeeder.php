<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\Customer;
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
=======
        Customer::factory(20)->create();
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
    }
}
