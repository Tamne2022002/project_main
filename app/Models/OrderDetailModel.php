<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;

    protected $fillable = [ 'id_order', 'id_product', 'quantity', 'regular_price', 'sale_price'];
}
