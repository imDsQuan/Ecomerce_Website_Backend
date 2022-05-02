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

        DB::table('products')->insert([
            'name' =>'Blue Jacket',
            'description' => 'This is description for Jacket',
            'price' => 80,
            'image_path' => 'https://thegioixechaydien.com/wp-content/uploads/2015/01/jacket2.jpg',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Black White Jacket',
            'description' => 'This is description for Jacket',
            'price' => 80,
            'image_path' => 'https://product.hstatic.net/1000285106/product/999d26ab52d1a08ff9c022_444d787726ad4e09b228027be58282f4_grande.jpg',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Brown Jacket',
            'description' => 'This is description for Jacket',
            'price' => 80,
            'image_path' => 'https://ivymoda.com/assets/files/news/2021/07/26/e8f495636b685860aff62ccbc314a6ca.jpg',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Hoodie UID',
            'description' => 'This is description for Hoodie',
            'price' => 80,
            'image_path' => 'https://bumshop.com.vn/wp-content/uploads/2021/01/hd73-ao-hoodie-form-rong-nam-nu-uid-6.jpg',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Sad Boiz Signature Hoodie',
            'description' => 'This is description for Hoodie',
            'price' => 80,
            'image_path' => 'http://product.hstatic.net/200000159059/product/114fc420-7fc3-420d-9228-065246a721cf_32c7c59978844f3b9b880bdeba8eaadc_grande.jpeg',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Orange Hoodie',
            'description' => 'This is description for Hoodie',
            'price' => 80,
            'image_path' => 'https://lh5.googleusercontent.com/5j-bH_qCy9tK3coiCySdigft4shiHF0iyOMPUFZmEYKsVGJRPGGpSyvs2AHuMyzvIMciPRGYx2RevdNEsdNiYnscgdAmptw4zSMMXl_mn-IuSB_5FGbOMVgIawxWJzLI0Al7rxlR',
            'category_id' => rand(1, 6)
        ]);

        DB::table('products')->insert([
            'name' =>'Hoodie Adidas',
            'description' => 'This is description for Hoodie',
            'price' => 80,
            'image_path' => 'https://assets.adidas.com/images/w_600,f_auto,q_auto/e5f8ddac897740ee87faacf0015fff97_9366/Ao_Hoodie_Kermit_(Unisex)_trang_GP3336.jpg',
            'category_id' => rand(1, 6)
        ]);


    }
}
