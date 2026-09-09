<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'contact_email',
        'contact_phone',
        'contact_address',
        'facebook_url',
        'instagram_url',
        'whatsapp_number',
        'default_delivery_charge',
    ];

    protected $casts = [
        'default_delivery_charge' => 'decimal:2'
    ];
}
