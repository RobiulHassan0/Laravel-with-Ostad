<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->latest()->take(5)->get();
        $posts = Post::with('category', 'user')->where('status', 'published')->latest()->paginate(6);
        return view('frontend.blogs.index', compact('categories', 'posts'));
    }

    public function showBlog(Request $request, $id){
        $post = Post::with('category', 'user')
            ->where('id', $id)
            ->where('status', 'published')
            ->firstOrFail();       

        return view('frontend.blogs.blog_details', compact('post'));
    }

    public function showAllCategories(Request $request)
    { 
        $categories = Category::withCount('posts')->get();
        $posts = Post::with('category')->where('status', 'published')->latest()->paginate(6);
        return view('frontend.categories.categories', compact('categories', 'posts'));
    }

    public function categoryDetails($id){
        $category = Category::findOrFail($id);
        $posts = Post::with('category')->where('category_id', $id)->where('status', 'published')->latest()->paginate(6);
        return view('frontend.categories.category-details', compact('category', 'posts'));
    }
}
