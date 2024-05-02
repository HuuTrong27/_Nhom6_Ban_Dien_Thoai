<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slide;
class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'link' => '',
                'image' => 'Banner1.png',
                
            ],
            [
                'link' => '',
                'image' => 'slider_5.png',
            ],
            [
                'link' => '',
                'image' => 'banner3.png',
            ],
            [
                'link' => '',
                'image' => 'slider_3.jpg',
            ],
            [
                'link' => '',
                'image' => 'slider_2.jpg',
            ],
            [
                'link' => '',
                'image' => 'slider_6.jpg',
            ],
            [
                'link' => '',
                'image' => 'slider_7.jpg',
            ],

            // Thêm các bản ghi khác nếu cần
        ];
        
        Slide::insert($data);
        
    }
}
