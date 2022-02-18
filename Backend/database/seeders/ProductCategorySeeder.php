<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'name' =>'T-shirt',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Shirt',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Jacket',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Coat',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Hoodie',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Sweater',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Trousers',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Track Pants',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Short',
            'desc' => 'This is description for ....'
        ]);
        DB::table('product_categories')->insert([
            'name' =>'Jeans',
            'desc' => 'This is description for ....'
        ]);
    }
}
