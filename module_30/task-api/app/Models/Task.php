<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
