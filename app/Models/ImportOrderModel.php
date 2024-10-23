<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportOrderModel extends Model
{
    use SoftDeletes;
    protected $table = 'table_importorder';
    protected $fillable = ['order_code', 'import_date', 'total_price'];
    public function importinvoicedetail()
    {
        return $this->hasMany(ImportOrderDetail::class, 'id_import_order');
    }
}
