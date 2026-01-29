<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 
        'name', 
        'sku', 
        'description', 
        'unit', 
        'stock_qty', 
        'low_stock_threshold', 
        'weight', 
        'color', 
        'size', 
        'price', 
        'image_path', 
        'status'
    ];

    protected $casts = [
        'stock_qty' => 'integer',
        'low_stock_threshold' => 'integer',
        'weight' => 'decimal:2',
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }
}
