<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_no', 
        'invoice_date', 
        'subtotal', 
        'discount_type', 
        'discount_amount', 
        'discount_value', 
        'grand_total', 
        'status'
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_value' => 'deciaml:2',
        'grand_total' => 'decimal:2'
    ];

    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }

    public function stockMovements(){
        return $this->hasMany(StockMovement::class);
    }
}
