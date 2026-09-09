<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['title', 'subtitle', 'image', 'button_text', 'button_url', 'sort_order', 'is_active', 'starts_at', 'ends_at'])]

class HomepageSlider extends Model
{
    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime'
    ];    
    
}
