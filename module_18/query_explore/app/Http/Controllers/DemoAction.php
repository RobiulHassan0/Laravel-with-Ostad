<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoAction extends Controller
{
    public function DemoAction(){
        // $result = DB::table('products')->get(); // get all records from products table
        // $result = DB::table('products')->count(); // count all records from products table 
        // $result = DB::table('products')->min('price'); // get min value of price column
        // $result = DB::table('products')->max('price'); // get max value of price column
        // $result = DB::table('products')->avg('price'); // get average value of price column
        // $result = DB::table('products')->sum('price'); // get sum value of price column
        
        // Select Clause : get specific columns
        // $result = DB::table('products')->select('title', 'price', 'stock')->get();   
        
        // Distinct Clause : get unique values, that means no duplicates
        $result = DB::table('products')->select('title')->distinct()->get(); 
        // return $result;
    }

    // Joining Tables
    public function joiningTables(){
        // Inner Join 
        $result = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->get();

        // Left Join : এখানে left table হলো products এবং right table হলো categories। Left Join এর মাধ্যমে left table এর সব রেকর্ড পাওয়া যায়, আর matched রেকর্ড পাওয়া যায় right table থেকে। যদি match না থাকে, তাহলে right side থেকে NULL পাওয়া যায়।
        $result = DB::table('products')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('brands', 'products.brand_id', '=', 'brands.id');
        
        // Right Join : এখানে right table হলো categories এবং left table হলো products। Right Join এর মাধ্যমে right table এর সব রেকর্ড পাওয়া যায়, আর matched রেকর্ড পাওয়া যায় left table থেকে। যদি match না থাকে, তাহলে left side থেকে NULL পাওয়া যায়।
        $result = DB::table('products')
        ->rightJoin('categories', 'products.category_id', '=', 'categories.id')
        ->rightJoin('brands', 'products.brand_id', '=', 'brands.id');

        // Cross Join : Cross Join এর মাধ্যমে দুইটা table এর সব রেকর্ডের combination পাওয়া যায়। ধরো, যদি table A তে ৩টা রেকর্ড থাকে এবং table B তে ৪টা রেকর্ড থাকে, তাহলে Cross Join এর মাধ্যমে ৩x৪=১২টা রেকর্ড পাওয়া যাবে।
        $result = DB::table('products')->crossJoin('brands')->get();

        // Advanced Joins Clauses:
        $result = DB::table('products')
            ->join('categories', function(JoinClause $join){
                $join->on('products.category_id', '=', 'categories.id')
                    ->where('categories.categoryName', '=', 'Food');
            })->get();
        
        
        // Unions Query
        $Query1 = DB::table('products')->where('products.price', '>', 2000);
        $Otherquery = DB::table('products')->where('products.discount', '>', 1);
            $result = $Query1->union($Otherquery)->get();

        
        // Basic Where
        $result = DB::table('products')
            ->where('products.price', 'NOT LIKE', '%Ca%')
            ->get();

        $result = DB::table('products')
            ->whereIn('products.price', [20, 5000])
            ->get();  
            
        $result = DB::table('products')
            ->whereNotIn('products.price', [20, 5000])
            ->get(); 
        
        // Order By
        $result = DB::table('brands')->orderBy('brandName', 'desc')->get();
        $result = DB::table('brands')->oldest()->first();
        $result = DB::table('brands')->latest()->first();
        $result = DB::table('products')->skip(2)->take(3)->get();

        // Group By
        $result = DB::table('products')->groupBy('price')->having('price', '>', 2000)->get();
        
        // Data Insert
        $result = DB::table('brands')
            ->insert([
                'brandName' => 'Dell',
                'brandImg' => 'Photo Dell'
            ]);
        return $result;
    }

    function insertDemoData(Request $result){

        $result = DB::table('brands')
    }

}

