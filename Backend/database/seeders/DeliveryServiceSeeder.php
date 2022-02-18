<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 06a52d866e56aa0dd4a2d42ccd02734b03c64d0e
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_services')->insert([
            'name' =>'Giao Hang Nhanh',
            'price'=>'10',
        ]);
        DB::table('delivery_services')->insert([
            'name' =>'Giao Hang Tiet Kiem',
            'price'=>'10',
        ]);
        DB::table('delivery_services')->insert([
            'name' =>'Viettel Post',
            'price'=>'10',
        ]);
        DB::table('delivery_services')->insert([
            'name' =>'Goship',
            'price'=>'10',
        ]);
        DB::table('delivery_services')->insert([
            'name' =>'J&T Express',
            'price'=>'10',
        ]);
    }
}
