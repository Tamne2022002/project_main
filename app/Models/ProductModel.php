<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;
    protected $table = 'table_product'; 
    protected $fillable = [
        'name',
        'id_list',
        'desc',
        'content',
        'photo_name',
        'photo_path',
        'regular_price',
        'sale_price',
        'discount',
        'publisher_id',
        'author',
        'code',
        'publishing_year',
        'status',
        'featured',
    ];
    protected $attributes = [
        'status' => false,
        'featured' => false,
    ];
    public function images(){
        return $this->hasMany(Gallery::class, 'id_parent');
    }
    
    public function category()
    {
        return $this->belongsTo(ProductList::class,'category_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id_publisher');        
    }
   
    public function productGallery()
    {
        return $this->hasMany(Gallery::class,'id_parent');
        
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
