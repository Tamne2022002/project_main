<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =['id', 'order_code', 'fullname', 'phone', 'address','total_price','status', 'id_member'];

}
