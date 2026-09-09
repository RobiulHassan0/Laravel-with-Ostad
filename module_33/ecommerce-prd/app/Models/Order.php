<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'order_number',
        'recipient_name',
        'recipient_phone',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postcode',
        'country',
        'total_amount',
        'status',
        'payment_status',
        'payment_method',
        'transaction_id',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2'
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customerAddress(){
        return $this->belongsTo(CustomerAddress::class, 'address_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }
}
