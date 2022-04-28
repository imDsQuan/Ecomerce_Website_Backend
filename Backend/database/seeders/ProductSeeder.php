<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' =>'Váy suông',
            'description' => 'Áo sơ mi vải rũ bóng, cổ chữ V có ve lật, dài tay. Gấu xẻ hai bên. Cài khuy màu vàng kim phía trước.',
            'price' => 80,
            'image_path' => 'https://static.zara.net/photos///2022/V/0/1/p/2511/129/330/2/w/750/2511129330_6_1_1.jpg?ts=1643901853629',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'ÁO KHOÁC BOMBER VẢI COTTON LÔNG XÙ',
            'description' => 'Áo khoác vải cotton có bề mặt lông xù. Cổ cao bằng vải gân co giãn. Dài tay. Có túi may viền hai bên hông. Gấu bo vải gân co giãn. Cài khóa kéo phía trước.',
            'price' => 50,
            'image_path' => 'https://static.zara.net/photos///2022/V/0/2/p/9632/410/707/2/w/750/9632410707_2_1_1.jpg?ts=1643185658589',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'ÁO KHOÁC BOMBER DẠ',
            'description' => 'Áo sơ mi vải rũ bóng, cổ chữ V có ve lật, dài tay. Gấu xẻ hai bên. Cài khuy màu vàng kim phía trước.',
            'price' => 60,
            'image_path' => 'https://static.zara.net/photos///2022/V/0/2/p/9632/410/401/2/w/383/9632410401_2_1_1.jpg?ts=1642585466662',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'LETTER PATCH SWEATSHIRT',
            'description' => 'Áo sơ mi vải rũ bóng, cổ chữ V có ve lật, dài tay. Gấu xẻ hai bên. Cài khuy màu vàng kim phía trước.',
            'price' => 80,
            'image_path' => 'https://static.zara.net/photos///2022/V/0/1/p/0039/400/052/3/w/383/0039400052_1_1_1.jpg?ts=1649070082251',
            'category_id' => rand(1, 6)
        ]);



    }
}
