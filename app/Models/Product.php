<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'category_id',
        'name',
        'desc',
        'content',
        'photo',
        'regular_price',
        'sale_price',
        'discount',
        'code',
        'view',
        'status',
        'featured',
    ];
    protected $attributes = [
        'status' => true,
        'featured' => false,
    ];
    // public function images(){
    //     return $this->hasMany(Gallery::class, 'product_id');
    // }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function productGallery()
    {
        return $this->hasMany(Gallery::class,'product_id');
        
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
