<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bill;
class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bill::truncate();
        $data = [
            [
                'id_customer' => 6,
                'date_order' => now(),
                'total' => 6000000,
                'payment' => 'COD',
                'note' => 'Ok',
            ],
            
        ];
        Bill::insert($data);
    }
}
