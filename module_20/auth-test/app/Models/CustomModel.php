<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{
    protected $table = 'custom_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active'
    ];

    protected $hidden = ['password'];
}
