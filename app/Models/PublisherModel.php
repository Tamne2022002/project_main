<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublisherModel extends Model
{
    use SoftDeletes;
    protected $fillable =['name','desc','photo_path','photo_name'];

}
