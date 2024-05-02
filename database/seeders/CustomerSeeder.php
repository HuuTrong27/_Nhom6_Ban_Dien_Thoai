<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Xoa dữ liệu cũ 
        Customer::truncate();
        $data = [
            [
            'name' => 'Trần Văn Lợi',
            'gender' => 'male',
            'email' => 'admin@gmail.com',
            'address' => 'Bình Định',
            'phone_number' => '0923511567',
            'note' => 'ok',
            ],
        ];
        Customer::insert($data);
    }
}
