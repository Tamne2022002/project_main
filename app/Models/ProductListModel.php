<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductListModel extends Model
{
    use HasFactory;
    
    protected $fillable =['name','id_parent','status', 'featured',];
}
