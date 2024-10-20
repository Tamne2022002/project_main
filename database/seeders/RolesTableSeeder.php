<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Quản trị hệ thống',
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Nhập liệu bài viết',
                'display_name' => 'thêm xoá sửa bài viết',
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-17 23:20:09',
                'deleted_at' => NULL,
            ),
        ));
    }
}
