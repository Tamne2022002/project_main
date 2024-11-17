<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_setting')->insert([
            ['name' => 'TPStore', 
            'desc' => 'Sách là nguồn tri thức vô tận, TP Store là người bạn đồng hành trên hành trình khám phá',
            'phone'=>'0768848015',
            'email'=>'tpstore@gmail.com',
            'zalo'=>'0768848015',
            'address'=>'65 Đ. Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam',
            'fanpage'=>'https://www.facebook.com/ltbookstore',
            'website'=>'www.tpstore.com',
            'link_map'=>'https://maps.app.goo.gl/QKWt2djGjJHrn2yY9',
            'iframe_map'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5139339979746!2d106.69867477462712!3d10.771894089376579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1712596492263!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'logo_path'=>'',
            'logo_name'=>'',
            'favicon_path'=>'',
            'favicon_name'=>''],
            
        ]);
    }
}
