<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductListModel extends Model
{
    use SoftDeletes;
    protected $table = 'table_product_list';
    protected $fillable =['name','id_parent','status','featured'];
    public function children()
    {
        return $this->hasMany(ProductListModel::class, 'id_parent');
    } 
    public function parent()
    {
        return $this->belongsTo(ProductListModel::class, 'id_parent');
    }
    public function childrenRecursive()
    {
        return $this->hasMany(ProductListModel::class, 'id_parent')->with('childrenRecursive');
    }
    public function category()
    {
        return $this->belongsTo(ProductListModel::class);
    }
}
