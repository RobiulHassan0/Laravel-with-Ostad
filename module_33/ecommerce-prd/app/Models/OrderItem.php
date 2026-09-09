<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['order_id', 'product_id', 'product_variant_id', 'variant_color', 'variant_size', 'unit_price', 'quantity', 'line_total'])]

class OrderItem extends Model
{
    protected $casts = [
        'unit_price' => 'decimal:2',
        'quantity' => 'integer',
        'line_total' => 'decimal:2'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function productVariant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
