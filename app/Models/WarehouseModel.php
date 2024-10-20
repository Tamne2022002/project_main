<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseModel extends Model
{
    protected $table = 'table_warehouse';
    protected $fillable =['id_parent','quantity'];

}
