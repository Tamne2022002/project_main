<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $fillable =['name','desc','phone','email','zalo','address','fanpage','website','link_map','iframe_map','logo_name','logo_path','favicon_name','favicon_path'];
}
