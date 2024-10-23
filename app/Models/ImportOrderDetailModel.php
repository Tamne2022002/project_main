<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportOrderDetailModel extends Model
{
    protected $table = 'table_importorderdetail';
    protected $fillable = ['id_import_order', 'id_product', 'import_price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    
}