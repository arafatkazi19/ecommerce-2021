<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','brand_id','category_id','quantity','regular_price','is_featured',
        'tags','status'];


    /**
     * Get the brand that owns the product.
     */
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }
}
