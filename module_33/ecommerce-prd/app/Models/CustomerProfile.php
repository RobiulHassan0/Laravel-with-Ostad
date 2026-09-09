<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'avatar', 'gender', 'date_of_birth'])]
class CustomerProfile extends Model
{
    protected $casts = [
        'date_of_birth' => 'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
