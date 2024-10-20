<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_product_list')->insert([
            //văn học
            ['name' => 'Văn học', 'id_parent' => '0','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //1
            ['name' => 'Tiểu thuyết', 'id_parent' => '1','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',],  //2
            ['name' => 'Tiểu thuyết trong nước', 'id_parent' => '2','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //3
            ['name' => 'Tiểu thuyết nước ngoài', 'id_parent' => '2','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //4
            //end văn học
            //sách giáo khoa
            ['name' => 'Sách giáo khoa', 'id_parent' => '0','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //5
            ['name' => 'Ngữ văn', 'id_parent' => '5','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //6
            ['name' => 'Toán', 'id_parent' => '5','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //7 
            ['name' => 'Tiếng Anh', 'id_parent' => '5','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //8
            ['name' => 'Ngữ văn cấp 1', 'id_parent' => '6','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //9
            ['name' => 'Ngữ văn cấp 2', 'id_parent' => '6','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //10
            ['name' => 'Ngữ văn cấp 3', 'id_parent' => '6','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //11
            ['name' => 'Toán cấp 1', 'id_parent' => '7','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //12
            ['name' => 'Toán cấp 2', 'id_parent' => '7','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //13
            ['name' => 'Toán cấp 3', 'id_parent' => '7','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //14
            ['name' => 'Tiếng anh cấp 1', 'id_parent' => '8','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //15
            ['name' => 'Tiếng anh cấp 2', 'id_parent' => '8','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //16
            ['name' => 'Tiếng anh cấp 3', 'id_parent' => '8','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //17
            //end sách giáo khoa
            //Sách tham khảo
            ['name' => 'Sách tham khảo', 'id_parent' => '0','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //18
            ['name' => 'Toán', 'id_parent' => '18','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //19
            ['name' => 'Ngữ văn', 'id_parent' => '18','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //20
            ['name' => 'Tiếng anh', 'id_parent' => '18','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //21
            //end sách tham khảo
            //Truyện tranh
            ['name' => 'Sách thiếu nhi, thiếu niên', 'id_parent' => '0','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //22
            ['name' => 'Truyện tranh thiếu nhi', 'id_parent' => '22','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //23
            ['name' => 'Manga - Comic', 'id_parent' => '22','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //24
            ['name' => 'Kiến thức bách khoa', 'id_parent' => '22','status' => 1,
                'featured' => 1,                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',], //25
        ]);
    }
}
