<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'short_desc', 'content', 'image', 'status', 'published_at', 'category_id', 'user_id'];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
