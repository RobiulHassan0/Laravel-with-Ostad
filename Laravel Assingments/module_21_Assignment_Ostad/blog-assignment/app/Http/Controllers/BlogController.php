<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('public.blogs.index');
    }

    public function showBlog(){
        $categories = Category::all();
        $posts = Post::all();
        
        if($posts->status !== 'published'){
            abort(404);
        }
        return view('public.blog-details', compact('categories', 'posts'));
    }

    public function showCategory($slug)
    { 
        // Logic to retrieve category by slug and its posts can be added here
        return view('public.category', compact('slug'));
    }


}
