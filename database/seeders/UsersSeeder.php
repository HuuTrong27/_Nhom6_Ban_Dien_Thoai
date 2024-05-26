<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 0,
            'trangthai' => 'active',
        ]);
        User::create([
            'name' => 'VanLoi',
            'email' => 'tranvanloi@gmail.com',
            'password' => Hash::make('19072004'),
            'level' => 1, // Giả sử level 1 là người dùng thông thường, bạn có thể thay đổi theo yêu cầu
            'trangthai' => 'active',
        ]);
    }
}
