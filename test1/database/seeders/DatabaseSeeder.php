<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('customers')->insert([
            'name'=>'Phong',
            'email'=>'phong1010@gmail.com',
            'password'=>Hash::make('password'),
        ]);

        DB::table('products')->where('name', 'Áo giữ nhiệt Essential Brush Poly')->update([
            
            'image' => 'front/img/product/24CMCW.DT001_-_XAM_1.webp',
            'price' => 149000,
            'sale_price' => 0,
            'category_id' => 1,
            'description' => '- Thành phần vải: 90% Polyester, 10% Spandex' . "\n" .
                     '- Form dáng: Slimfit ôm nhẹ vào cơ thể' . "\n" .
                     '- Chất liệu mềm mại và khả năng giữ ấm tốt' . "\n" .
                     '- Phù hợp: Mặc trong hoặc mặc ở nhà',
            'status' => 1
        ]);
        // Thêm sản phẩm thứ hai
        DB::table('products')->insert([
            'name' => 'Áo Sweater French Terry',
            'image' => 'front/img/product/24CMCW.ST001_-_Navy_2.webp', // Đường dẫn của sản phẩm thứ hai
            'price' => 349000,
            'sale_price' => 0,
            'category_id' => 2,
            'description' => 'Mô tả sản phẩm 2',
            'status' => 1,
        ]);
    }
}
