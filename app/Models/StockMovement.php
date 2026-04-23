<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id',
        'invoice_id',
        'type',
        'quantity',
        'note',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function inovice(){
        return $this->belongsTo(Invoice::class);  
    }
}
