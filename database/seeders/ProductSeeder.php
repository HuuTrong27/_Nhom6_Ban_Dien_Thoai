<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $data = [
            [
            'name' => 'Iphone Pro Max',
            'image' => '1608558424.png',
            'price' => 22000000,
            'discount' => 0,
            'description' => '<p>Iphone H&atilde;ng H&agrave;ng đầu việt nam</p>',
            'baohanh' => '24 Tháng',
            'new' => 1,
            'trangthai' => 'Còn hàng',
            'content' => '<p>Ram 6GB</p>

            <p>Dung Lượng 128gB</p>
            
            <p>IOS 14</p>',
            'idcat' => 1, 
            ],
            [
                'name' => 'Iphone 7 Plus',
                'image' => '1608558569.jpeg',
                'price' => 12000000,
                'discount' => 11800000,
                'description' => '<p>Iphone Mạnh Mẽ</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 3GB</p>

                <p>Dung Lượng 64GB</p>',
                'idcat' => 1, 
            ],
            [
                'name' => 'Iphone 6Plus',
                'image' => '1608558746.jpeg',
                'price' => 7000000,
                'discount' => 0,
                'description' => '<p>Iphone Mạnh Mẽ</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 2GB</p>',
                'idcat' => 1, 
            ],
            [
                'name' => 'Sam Sung J7 Pro',
                'image' => '1608558807.jpeg',
                'price' => 7500000,
                'discount' => 0,
                'description' => '<p>Sam Sung H&agrave;ng đầu việt nam</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 3GB</p>',
                'idcat' => 2, 
            ],
            [
                'name' => 'Sam sung J7 Prime',
                'image' => '1608558866.jpeg',
                'price' => 7200000,
                'discount' => 7000000,
                'description' => '<p>Sam Sung H&agrave;ng đầu việt nam</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 4GB</p>',
                'idcat' => 2, 
            ],
            [
                'name' => 'OPPO A12',
                'image' => '1608558936.jpeg',
                'price' => 10000000,
                'discount' => 9700000,
                'description' => '<p>Oppo Lướt &ecirc;m mượt m&agrave;&nbsp;</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 8GB</p>

                <p>DL 64GB</p>',
                'idcat' => 3, 
            ],
            [
                'name' => 'OPPO A5',
                'image' => '1608559001.jpeg',
                'price' => 8000000,
                'discount' => 0,
                'description' => '<p>Oppo lướt &ecirc;m mượt m&agrave;</p>',
                'baohanh' => '24 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 4GB</p>',
                'idcat' => 3, 
            ],
            [
                'name' => 'APPLE WATCH 005X',
                'image' => '1608559095.jpeg',
                'price' => 23000000,
                'discount' => 22900000,
                'description' => '<p>Phong c&aacute;ch thời thượng</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>M&agrave;n H&igrave;nh 2In</p>',
                'idcat' => 5, 
            ],
            [
                'name' => 'SONY XA',
                'image' => '1608559237.jpeg',
                'price' => 5500000,
                'discount' => 0,
                'description' => '<p>SONY cổ xưa vẫn giữ được sức mạnh</p>',
                'baohanh' => '12 Tháng',
                'new' => 0,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 2GB</p>',
                'idcat' => 6, 
            ],
            [
                'name' => 'Dell 007X',
                'image' => '1608559290.png',
                'price' => 18000000,
                'discount' => 0,
                'description' => '<p>Laptop&nbsp;</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 8GB</p>

                <p>SSD 240</p>',
                'idcat' => 7, 
            ],
            [
                'name' => 'XiaoMi',
                'image' => '1608559359.png',
                'price' => 8200000,
                'discount' => 0,
                'description' => '<p>XiaoMi Pin Tr&acirc;u</p>',
                'baohanh' => '12 Tháng',
                'new' => 0,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 2GB</p>',
                'idcat' => 4, 
            ],
            [
                'name' => 'Sam Sung A50',
                'image' => '1608649876.jpeg',
                'price' => 7300000,
                'discount' => 0,
                'description' => '<p>Sam SUng Pin Tr&acirc;u</p>',
                'baohanh' => '24 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 4GB</p>

                <p>&nbsp;</p>',
                'idcat' => 2, 
            ],
            [
                'name' => 'Iphone 5S',
                'image' => '1608724763.jpeg',
                'price' => 2000000,
                'discount' => 0,
                'description' => '<p>Iphone</p>',
                'baohanh' => '24 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 1GB</p>
                <p>&nbsp;</p>',
                'idcat' => 1, 
            ],
            [
                'name' => 'Sam SUng J7 PRIME',
                'image' => '1608724915.jpeg',
                'price' => 6000000,
                'discount' => 0,
                'description' => '<p>Sam&nbsp; Sung</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 3GB</p>

                <p>Dung lượng 64GB</p>',
                'idcat' => 2, 
            ],
            [
                'name' => 'Sony 5',
                'image' => '1608725170.jpeg',
                'price' => 4500000,
                'discount' => 0,
                'description' => '<p>Sony</p>',
                'baohanh' => '12 Tháng',
                'new' => 1,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 4GB</p>

                <p>Dung Lượng 32GB</p>',
                'idcat' => 6, 
            ],
            [
                'name' => 'OPPO A37',
                'image' => '1608725301.jpeg',
                'price' => 40000000,
                'discount' => 0,
                'description' => '<p>Oppo</p>',
                'baohanh' => '12 Tháng',
                'new' => 0,
                'trangthai' => 'Hết hàng',
                'content' => '<p>Ram 2GB</p>

                <p>Dung Lượng 8GB</p>',
                'idcat' => 3, 
            ],
            [
                'name' => 'MapBook PRO',
                'image' => '1608725621.png',
                'price' => 35000000,
                'discount' => 34000000,
                'description' => '<p>Laptop</p>',
                'baohanh' => '24 Tháng',
                'new' => 0,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 16GB</p>

                <p>&nbsp;</p>',
                'idcat' => 7, 
            ],
            [
                'name' => 'HP 009X',
                'image' => '1608725682.png',
                'price' => 23000000,
                'discount' => 22000000,
                'description' => '<p>LapTop</p>',
                'baohanh' => '24 Tháng',
                'new' => 0,
                'trangthai' => 'Còn hàng',
                'content' => '<p>Ram 8GB</p>

                <p>SSD 240GB</p>
                
                <p>Core i7</p>',
                'idcat' => 7, 
            ],
 
            // Thêm các bản ghi khác nếu cần
        ];
        
        Product::insert($data);
    }
}
