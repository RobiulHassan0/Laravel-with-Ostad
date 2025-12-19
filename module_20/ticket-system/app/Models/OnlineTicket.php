<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnlineTicket extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'priority',
        'user_id',
        'assigned_to',
        'assigned_by',
        'status',
        'resolved_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedTo(){
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy(){
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
