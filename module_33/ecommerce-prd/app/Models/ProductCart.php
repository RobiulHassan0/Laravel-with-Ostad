<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'product_variant_id',
        'quantity'
    ];

    protected $casts = ['quantity' => 'integer'];
    
    public function product(){
        return $this->belongsTo(Product::class);
    } 

    public function productVariant(){
        return $this->belongsTo(ProductVariant::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
