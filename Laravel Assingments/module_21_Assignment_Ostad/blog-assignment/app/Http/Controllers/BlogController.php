<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function showCategory($slug)
    {
        // Logic to retrieve category by slug and its posts can be added here
        return view('public.category', compact('slug'));
    }
}
