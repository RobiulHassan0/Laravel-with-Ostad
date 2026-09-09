<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['name', 'charge', 'is_default', 'is_active'])]
class DeliveryZone extends Model
{
    protected $casts = [
        'charge' => 'decimal:2',
        'is_default' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function deliveryZoneDistricts(){
        return $this->hasMany(DeliveryZoneDistrict::class);
    }
}
