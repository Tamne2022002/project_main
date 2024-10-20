<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Danh mục sản phẩm',
                'display_name' => 'Danh mục sản phẩm',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Danh sách danh mục',
                'display_name' => 'Danh sách danh mục',
                'id_parent' => 1,
                'key_permissions' => 'list_category',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Thêm danh mục',
                'display_name' => 'Thêm danh mục',
                'id_parent' => 1,
                'key_permissions' => 'add_category',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sửa danh mục',
                'display_name' => 'Sửa danh mục',
                'id_parent' => 1,
                'key_permissions' => 'edit_category',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Xóa danh mục',
                'display_name' => 'Xóa danh mục',
                'id_parent' => 1,
                'key_permissions' => 'delete_category',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Slider',
                'display_name' => 'Slider',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Danh sách slider',
                'display_name' => 'Danh sách slider',
                'id_parent' => 6,
                'key_permissions' => 'list_slider',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Thêm slider',
                'display_name' => 'Thêm slider',
                'id_parent' => 6,
                'key_permissions' => 'add_slider',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Sửa slider',
                'display_name' => 'Sửa slider',
                'id_parent' => 6,
                'key_permissions' => 'edit_slider',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Xóa slider',
                'display_name' => 'Xóa slider',
                'id_parent' => 6,
                'key_permissions' => 'delete_slider',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Sản phẩm',
                'display_name' => 'Sản phẩm',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Danh sách sản phẩm',
                'display_name' => 'Danh sách sản phẩm',
                'id_parent' => 11,
                'key_permissions' => 'list_product',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Thêm sản phẩm',
                'display_name' => 'Thêm sản phẩm',
                'id_parent' => 11,
                'key_permissions' => 'add_product',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Sửa sản phẩm',
                'display_name' => 'Sửa sản phẩm',
                'id_parent' => 11,
                'key_permissions' => 'edit_product',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Xóa sản phẩm',
                'display_name' => 'Xóa sản phẩm',
                'id_parent' => 11,
                'key_permissions' => 'delete_product',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Cấu hình chung',
                'display_name' => 'Cấu hình chung',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Xem cấu hình chung',
                'display_name' => 'Xem cấu hình chung',
                'id_parent' => 17,
                'key_permissions' => 'list_setting',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Sửa cấu hình chung',
                'display_name' => 'Sửa cấu hình chung',
                'id_parent' => 17,
                'key_permissions' => 'edit_setting',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Nhân viên',
                'display_name' => 'Nhân viên',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Danh sách nhân viên',
                'display_name' => 'Danh sách nhân viên',
                'id_parent' => 20,
                'key_permissions' => 'list_user',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Thêm nhân viên',
                'display_name' => 'Thêm nhân viên',
                'id_parent' => 20,
                'key_permissions' => 'add_user',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Sửa nhân viên',
                'display_name' => 'Sửa nhân viên',
                'id_parent' => 20,
                'key_permissions' => 'edit_user',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Xóa nhân viên',
                'display_name' => 'Xóa nhân viên',
                'id_parent' => 20,
                'key_permissions' => 'delete_user',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'Vai trò',
                'display_name' => 'Vai trò',
                'id_parent' => 0,
                'key_permissions' => '0',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'Danh sách vai trò',
                'display_name' => 'Danh sách vai trò',
                'id_parent' => 25,
                'key_permissions' => 'list_role',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Thêm vai trò',
                'display_name' => 'Thêm vai trò',
                'id_parent' => 25,
                'key_permissions' => 'add_role',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Sửa vai trò',
                'display_name' => 'Sửa vai trò',
                'id_parent' => 25,
                'key_permissions' => 'edit_role',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Xóa vai trò',
                'display_name' => 'Xóa vai trò',
                'id_parent' => 25,
                'key_permissions' => 'delete_role',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'Bài viết',
                'display_name' => 'Bài viết',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Danh Sách Bài Viết',
                'display_name' => 'Danh Sách Bài Viết',
                'id_parent' => 30,
                'key_permissions' => 'list_news',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Thêm Bài Viết',
                'display_name' => 'Thêm Bài Viết',
                'id_parent' => 30,
                'key_permissions' => 'add_news',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Sửa Bài Viết',
                'display_name' => 'Sửa Bài Viết',
                'id_parent' => 30,
                'key_permissions' => 'edit_news',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Xóa Bài Viết',
                'display_name' => 'Xóa Bài Viết',
                'id_parent' => 30,
                'key_permissions' => 'delete_news',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Nhà Xuất Bản',
                'display_name' => 'Nhà Xuất Bản',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'Danh Sách Nhà Xuất Bản',
                'display_name' => 'Danh Sách Nhà Xuất Bản',
                'id_parent' => 35,
                'key_permissions' => 'list_publisher',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'Thêm Nhà Xuất Bản',
                'display_name' => 'Thêm Nhà Xuất Bản',
                'id_parent' => 35,
                'key_permissions' => 'add_publisher',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'Sửa Nhà Xuất Bản',
                'display_name' => 'Sửa Nhà Xuất Bản',
                'id_parent' => 35,
                'key_permissions' => 'edit_publisher',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'Xóa Nhà Xuất Bản',
                'display_name' => 'Xóa Nhà Xuất Bản',
                'id_parent' => 35,
                'key_permissions' => 'delete_publisher',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'Bài Viết Giới Thiệu',
                'display_name' => 'Bài Viết Giới Thiệu',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'Xem Bài Viết Giới Thiệu',
                'display_name' => 'Xem Bài Viết Giới Thiệu',
                'id_parent' => 40,
                'key_permissions' => 'list_staticnews',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'Sửa Bài Viết Giới Thiệu',
                'display_name' => 'Sửa Bài Viết Giới Thiệu',
                'id_parent' => 40,
                'key_permissions' => 'edit_staticnews',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'Quản lý kho',
                'display_name' => 'Quản lý kho',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'Danh sách kho',
                'display_name' => 'Danh sách kho',
                'id_parent' => 43,
                'key_permissions' => 'list_warehouse',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'Đơn nhập',
                'display_name' => 'Đơn nhập',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'Danh sách đơn nhập',
                'display_name' => 'Danh sách đơn nhập',
                'id_parent' => 45,
                'key_permissions' => 'list_import_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'Thêm đơn nhập',
                'display_name' => 'Thêm đơn nhập',
                'id_parent' => 45,
                'key_permissions' => 'add_import_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'Xem đơn nhập',
                'display_name' => 'Xem đơn nhập',
                'id_parent' => 45,
                'key_permissions' => 'view_import_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'Xóa đơn nhập',
                'display_name' => 'Xóa đơn nhập',
                'id_parent' => 45,
                'key_permissions' => 'delete_import_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'Đơn hàng',
                'display_name' => 'Đơn hàng',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'Danh sách đơn hàng',
                'display_name' => 'Danh sách đơn hàng',
                'id_parent' => 50,
                'key_permissions' => 'list_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'Xem & sửa đơn hàng',
                'display_name' => 'Xem & sửa đơn hàng',
                'id_parent' => 50,
                'key_permissions' => 'view_edit_order',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 53,
                'name' => 'Thống kê',
                'display_name' => 'Thống kê',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 54,
                'name' => 'Xem thống kê',
                'display_name' => 'Xem thống kê',
                'id_parent' => 53,
                'key_permissions' => 'list_statistic',
                'created_at' => '2024-07-02 09:27:00',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'Người Dùng',
                'display_name' => 'Người Dùng',
                'id_parent' => 0,
                'key_permissions' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'Danh Sách Người Dùng',
                'display_name' => 'Danh Sách Người Dùng',
                'id_parent' => 55,
                'key_permissions' => 'list_member',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'Thêm Người Dùng',
                'display_name' => 'Thêm Người Dùng',
                'id_parent' => 55,
                'key_permissions' => 'add_member',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'Sửa Người Dùng',
                'display_name' => 'Sửa Người Dùng',
                'id_parent' => 55,
                'key_permissions' => 'edit_member',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'Xóa Người Dùng',
                'display_name' => 'Xóa Người Dùng',
                'id_parent' => 55,
                'key_permissions' => 'delete_member',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}
