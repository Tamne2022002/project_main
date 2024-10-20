<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_order_status')->insert([
            ['id'=>1 , 'name' => 'Mới đặt'],
            ['id'=>2 ,'name' => 'Đã xác nhận'],
            ['id'=>3 ,'name' => 'Đã thanh toán'],
            ['id'=>4 ,'name' => 'Đang giao hàng'],
            ['id'=>5 ,'name' => 'Đã giao'],
            ['id'=>6 ,'name' => 'Đã huỷ'],
        ]);
    }
}
