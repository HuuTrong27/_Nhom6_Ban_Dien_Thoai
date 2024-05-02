<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::truncate();
        $data = [
            [
                'name' => 'Iphone',
                'image' => '1608304497.jpeg',
                'description' => 'Đặc điểm nổi bật của iPhone 12 Pro 128GB  iPhone 12 Pro - "Siêu phẩm công nghệ" với nhiều nâng cấp mạnh mẽ về thiết kế, cấu hình và hiệu năng, khẳng định đẳng cấp thời thượng trên thị trường smartphone cao cấp.',
                'content' => '<p>Iphone</p>',
            ],
            [
                'name' => 'Sam Sung',
                'image' => '1608304562.jpeg',
                'description' => 'Samsung lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ Galaxy M với tên gọi là Samsung Galaxy M51. Thiết kế mới này tuy nằm trong phân khúc tầm trung nhưng được Samsung nâng cấp và cải tiến với camera góc siêu rộng, dung lượng pin siêu khủng cùng vẻ ngoài sang trọng và thời thượng.',
                'content' => '<h2><a href="https://www.thegioididong.com/dtdd-samsung" target="_blank">Samsung</a>&nbsp;lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ&nbsp;<a href="https://www.thegioididong.com/dtdd-samsung-galaxy-m" target="_blank">Galaxy M</a>&nbsp;với t&ecirc;n gọi l&agrave;&nbsp;<a href="https://www.thegioididong.com/dtdd/samsung-galaxy-m51">Samsung&nbsp;Galaxy M51</a>. Thiết kế mới n&agrave;y tuy nằm trong ph&acirc;n kh&uacute;c tầm trung nhưng được Samsung n&acirc;ng cấp v&agrave; cải tiến với camera g&oacute;c si&ecirc;u rộng, dung lượng pin si&ecirc;u khủng c&ugrave;ng vẻ ngo&agrave;i sang trọng v&agrave; thời thượng.</h2>',
            ],
            [
                'name' => 'Oppo',
                'image' => '1608304597.jpeg',
                'description' => '<h2>Oppo lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ&nbsp;<a href="https://www.thegioididong.com/dtdd-samsung-galaxy-m" target="_blank">Galaxy M</a>&nbsp;với t&ecirc;n gọi l&agrave;&nbsp;<a href="https://www.thegioididong.com/dtdd/samsung-galaxy-m51">Samsung&nbsp;Galaxy M51</a>. Thiết kế mới n&agrave;y tuy nằm trong ph&acirc;n kh&uacute;c tầm trung nhưng được Samsung n&acirc;ng cấp v&agrave; cải tiến với camera g&oacute;c si&ecirc;u rộng, dung lượng pin si&ecirc;u khủng c&ugrave;ng vẻ ngo&agrave;i sang trọng v&agrave; thời thượng.</h2>',
                'content' => '<p>Oppo</p>',
            ],
            [
                'name' => 'XiaoMi',
                'image' => '1608304655.jpeg',
                'description' => 'Xiaomi lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ Galaxy M với tên gọi là Samsung Galaxy M51. Thiết kế mới này tuy nằm trong phân khúc tầm trung nhưng được Samsung nâng cấp và cải tiến với camera góc siêu rộng, dung lượng pin siêu khủng cùng vẻ ngoài sang trọng và thời thượng.',
                'content' => '<h2>XiaoMi&nbsp;lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ&nbsp;<a href="https://www.thegioididong.com/dtdd-samsung-galaxy-m" target="_blank">Galaxy M</a>&nbsp;với t&ecirc;n gọi l&agrave;&nbsp;<a href="https://www.thegioididong.com/dtdd/samsung-galaxy-m51">Samsung&nbsp;Galaxy M51</a>. Thiết kế mới n&agrave;y tuy nằm trong ph&acirc;n kh&uacute;c tầm trung nhưng được Samsung n&acirc;ng cấp v&agrave; cải tiến với camera g&oacute;c si&ecirc;u rộng, dung lượng pin si&ecirc;u khủng c&ugrave;ng vẻ ngo&agrave;i sang trọng v&agrave; thời thượng.</h2>',
            ],
            [
                'name' => 'APPLE WATCH',
                'image' => '1608304706.jpeg',
                'description' => 'Apple lại tiếp tục cho ra mắt chiếc Apple Watch mới thuộc thế hệ Galaxy M với tên gọi là Samsung Galaxy M51. Thiết kế mới này tuy nằm trong phân khúc tầm trung nhưng được Samsung nâng cấp và cải tiến với camera góc siêu rộng, dung lượng pin siêu khủng cùng vẻ ngoài sang trọng và thời thượng.',
                'content' => '<h2>Apple Watch lại tiếp tục cho ra mắt chiếc smartphone mới thuộc thế hệ&nbsp;<a href="https://www.thegioididong.com/dtdd-samsung-galaxy-m" target="_blank">Galaxy M</a>&nbsp;với t&ecirc;n gọi l&agrave;&nbsp;<a href="https://www.thegioididong.com/dtdd/samsung-galaxy-m51">Samsung&nbsp;Galaxy M51</a>. Thiết kế mới n&agrave;y tuy nằm trong ph&acirc;n kh&uacute;c tầm trung nhưng được Samsung n&acirc;ng cấp v&agrave; cải tiến với camera g&oacute;c si&ecirc;u rộng, dung lượng pin si&ecirc;u khủng c&ugrave;ng vẻ ngo&agrave;i sang trọng v&agrave; thời thượng.</h2>',
            ],
            [
                'name' => 'SONY',
                'image' => '1608304757.jpeg',
                'description' => 'Sony',
                'content' => '<p>Sony</p>',
            ],
            [
                'name' => 'LAPTOP',
                'image' => '1608304788.png',
                'description' => 'Laptop',
                'content' => '<p>Laptop</p>',
            ],
        ];
        Category::insert($data);
    }
}