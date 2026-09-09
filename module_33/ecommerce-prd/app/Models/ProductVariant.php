<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'color',
        'size',
        'price_override',
        'stock_quantity',
    ];

    protected $casts = [
        'price_override' => 'decimal:2',
        'stock_quantity' => 'integer'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function productCarts(){
        return $this->hasMany(ProductCart::class);
    }

    public function OrderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
