<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class Func
{
    public static function convert_utf8_to_iconv($str = '')
    {
        return iconv('UTF-8', 'ISO-8859-1', $str);
    }

    /* Format money */
    public static function formatMoney($price = 0, $unit = 'đ', $html = false)
    {
        $str = '';

        if ($price) {
            $str .= number_format($price, 0, ',', '.');
            if ($unit != '') {
                if ($html) {
                    $str .= '<span>' . $unit . '</span>';
                } else {
                    $str .= $unit;
                }
            }
        }

        return $str;
    }

    /* Format phone */
    public static function formatPhone($number, $dash = ' ')
    {
        if (preg_match('/^(\d{4})(\d{3})(\d{3})$/', $number, $matches) || preg_match('/^(\d{3})(\d{4})(\d{4})$/', $number, $matches)) {
            return $matches[1] . $dash . $matches[2] . $dash . $matches[3];
        }
    }

    /* Lấy date */
    public static function makeDate($time = 0, $dot = '.', $lang = 'vi', $f = false)
    {
        $str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y", $time) : date("m{$dot}d{$dot}Y", $time);

        if ($f == true) {
            $thu['vi'] = array('Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy');
            $thu['en'] = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
            $str = $thu[$lang][date('w', $time)] . ', ' . $str;
        }

        return $str;
    }

    function CheckPermissionAdmin($id_user, $permissionCheck)
    {
        $id_role = DB::table('table_user_roles')->where('id_member', $id_user)->pluck('id_role');
        $arrPermission = DB::table('table_permission_role')->whereIn('id_role', $id_role)->pluck('id_permission');
        $arrKeyPermission = DB::table('table_permissions')->whereIn('id', $arrPermission)->pluck('key_permissions');

        if (Str::contains($permissionCheck, $arrKeyPermission)){
            return true;
        } else {
            return false; 
        }

    
    }
}