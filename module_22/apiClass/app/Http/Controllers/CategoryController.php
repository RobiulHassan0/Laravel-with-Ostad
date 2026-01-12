<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'message' => 'Category retrived successfully',
            'data' => new CategoryCollection($categories),
        ]);
    }

    public function categoryWithProduct()
    {
        $categories = Category::with('products')->get();
        return response()->json([
            'message' => 'Category with Products retrived successfully',
            'categories' => new CategoryCollection($categories),
        ]);
    }
    // public function index(){
    //     $categories = Category::all();
    //     return response()->json([
    //         'message' => "Task retrived success",
    //         "data"=> new CategoryCollection($categories)
    //     ]);
    // }

    // public function categoryWithProduct(){
    //     $categories = Category::with('products')->get();
    //     return response()->json([
    //         'message'=> 'Tasks retrived successfully',
    //         'data'=> new CategoryCollection($categories)
    //     ]);
    // }
}
