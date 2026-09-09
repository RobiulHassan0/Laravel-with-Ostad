<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name', 
    'slug', 
    'sku', 
    'short_desc', 
    'description', 
    'price',
    'discount_price',
    'stock_quantity',
    'has_variants',
    'image',
    'rating',
    'reviews_count',
    'is_featured',
    'is_active',
    'category_id',
    'brand_id'
])]

class Product extends Model
{

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'rating' => 'decimal:1',
        'reviews_count' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];



    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function productVariants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function productWishlists(){
        return $this->hasMany(ProductWishlist::class);
    }

    public function productCarts(){
        return $this->hasMany(ProductCart::class);
    }

    public function productReviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
