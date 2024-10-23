<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetailModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cart',
        'id_product',
        'quantity',
        'price',
    ];
}
