<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::truncate();
        $data = [
            [
                'name' => 'Trần Văn Lợi',
                'email' => 'vanloi@gmail.com234',
                'content' => 'Quá ngon',
                'id_com' => 36,
            ],
            [
                'name' => 'Trần Chấn',
                'email' => 'okqua@gmail.com',
                'content' => 'Sản phẩm quá tuyệt',
                'id_com' => 36,
            ],
        ];
        Comment::insert($data);
    }
}