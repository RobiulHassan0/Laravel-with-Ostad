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
        // Group By
        $result = DB::table('products')
        ->select('short_des', DB::raw('count(*) as total'))
        ->groupBy('short_des')
        ->where('price', '>', 2000)
        ->get();

        // Blade টেমপ্লেটে ডেটা পাঠানো
        return view('query', compact('result'));
    }
}
