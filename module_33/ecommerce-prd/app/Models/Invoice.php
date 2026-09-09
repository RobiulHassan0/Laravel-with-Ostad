<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_id',
        'invoice_number',
        'vat_amount',
        'issued_at'
    ];

    protected $casts = [
        'vat_amount' => 'decimal:2',
        'issued_at' => 'datetime'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
