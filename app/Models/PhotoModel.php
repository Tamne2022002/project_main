<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoModel extends Model
{
    use SoftDeletes;

    protected $table = 'table_photo';
    protected $fillable =['name','desc','photo_path','photo_name'];

}
