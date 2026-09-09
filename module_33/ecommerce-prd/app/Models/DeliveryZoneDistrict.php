<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryZoneDistrict extends Model
{
    protected $fillable = [
        'delivery_zone_id',
        'district_name'
    ];

    public function deliveryZone(){
        return $this->belongsTo(DeliveryZone::class);
    }
}
