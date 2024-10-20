<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => '1', 'full_name' => 'Nguyễn Minh Tâm', 'phone' => '0335644500', 'address' => 'TP. Hồ Chí Minh', 'email' => '0306201074@caothang.edu.vn', 'password' =>bcrypt('123456'), 'type' => 1],
            ['id' => '2', 'full_name' => 'Phạm Hữu Phúc','phone' => '0386292585', 'address' => 'TP. Hồ Chí Minh', 'email' => '0306201168@caothang.edu.vn', 'password' =>bcrypt('123456'),  'type' => 1],
        ]);
    }
}
