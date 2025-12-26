<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['name', 'description', 'slug','color_index', 'image'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getColorAttribute() {
        $colors = config('category_colors');
        return $colors[$this->color_index] ??  $colors[0];
    }
}
