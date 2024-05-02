<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NguoiDung::truncate();
        $data = [
            [
                'name' => 'Văn Lợi',
                'email' => 'vanloi@gmail.com',
                'password' => Hash::make('vanloi234'),
                'level' => 0,
                'status' => 'active',
                'diachi' => 'Binh Dinh',
                'dienthoai' => '098754321',
            ],
            [
                'name' => 'Hữu Trọng',
                'email' => 'huutrong@gmail.com',
                'password' => Hash::make('huutrong277'),
                'level' => 0,
                'status' => '',
                'diachi' => 'Binh Dinh',
                'dienthoai' => '0354121825',
            ],
        ];
        NguoiDung::insert($data);
    }
}
