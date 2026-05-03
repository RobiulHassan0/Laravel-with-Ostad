<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $totalPublishedPosts = Post::where('status', 'published')->count();
        $totalDraftPosts = Post::where('status', 'draft')->count();
        $recentPosts = Post::with('category')->latest()->take(3)->get();
        
        return view('admin.dashboard', compact('totalPosts', 'totalCategories', 'totalPublishedPosts', 'totalDraftPosts', 'recentPosts'));
    }
}
