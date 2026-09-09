<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'description', 'image', 'parent_id', 'is_active', 'sort_order' ])]

class Category extends Model
{
    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean'
    ];

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
