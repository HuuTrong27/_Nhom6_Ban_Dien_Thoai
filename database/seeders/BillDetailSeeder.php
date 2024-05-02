<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bill_detail;
class BillDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bill_detail::truncate();
        $data = [
            [
            'id_bill' => 1,
            'id_products' => 7,
            'quantity' => 1,
            'image' => null,
            'price' => 6000000,
            ],
            
        ];
        Bill_detail::insert($data);
    }
}
