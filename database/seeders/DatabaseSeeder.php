<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([ 
        //     PublishersTableSeeder::class,
        //     ProductsListTableSeeder::class,
        //     ProductsTableSeeder::class,
        //     UserTableSeeder::class
        // ]);

        $this->call([ 
            NewsTableSeeder::class,
            SettingTableSeeder::class,
            PhotoTableSeeder::class,// 3
            UserTableSeeder::class,// 4
            ProductsListTableSeeder::class,// 5
            PublishersTableSeeder::class,// 6
            MemberTableSeeder::class,// 7
            ProductsTableSeeder::class,// 8
            WarehousesTableSeeder::class,// 9
            RolesTableSeeder::class,// 10
            RoleUsersTableSeeder::class,// 11
            PermissionsTableSeeder::class,// 12
            PermissionRolesTableSeeder::class,// 13
            ImportOrderTableSeeder::class,// 14
            ImportOrderDetailsTableSeeder::class,// 15
            OrderStatusTableSeeder::class,
        ]);
    }
}
