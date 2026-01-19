<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['name', 'rent', 'image'];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function currentBooking(){
        return $this->hasOne(Booking::class)
            ->whereDate('start_date','<=', now())
            ->whereDate('end_date','>=', now());
    }

    protected $casts = [
        'rent' => 'decimal:2',
    ];
}
