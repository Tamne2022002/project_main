<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\GalleryModel;
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
        'id_publisher',
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
        return $this->hasMany(GalleryModel::class, 'id_parent');
    }
    
    public function category()
    {
        return $this->belongsTo(ProductListModel::class,'id');
    }
    public function publisher()
    {
        return $this->belongsTo(PublisherModel::class, 'id_publisher');        
    }
   
    public function productGallery()
    {
        return $this->hasMany(GalleryModel::class,'id_parent');
        
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
