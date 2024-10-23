<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    use SoftDeletes;

    protected $table = 'table_news';
    protected $fillable =['name','desc','content','photo_path','photo_name','status', 'featured',];
}
