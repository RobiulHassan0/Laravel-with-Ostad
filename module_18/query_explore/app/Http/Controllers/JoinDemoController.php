<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinDemoController extends Controller
{
    public function index()
    {
        // LEFT JOIN কোয়েরি আপডেট করুন
        $result = DB::table('products')
            ->join('categories', function(JoinClause $join){
                $join->on('products.category_id', '=', 'categories.id')
                    ->where('categories.categoryName', '=', 'Food');
            })
            ->select('products.id', 'products.title', 'products.price', 'categories.categoryName') 
            ->get();

        // Blade টেমপ্লেটে ডেটা পাঠানো
        return view('query', compact('result'));
    }
}
