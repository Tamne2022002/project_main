<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_member')->insert([
            ['name' => 'Administrator',
             'phone' => '0335644500',
             'address' => 'Tp. Hồ Chí Minh',
             'email' => 'hotro@gmail.com',
             'password' =>bcrypt('123456')],
        ]);
    }
}
