<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class ProductController extends Controller
{
    public function index(){
        // $products = DB::table("products")->get();

        // $products = DB::table("orders")->where('id', 2)->get();

        // $products=DB::table('products')->select('title', 'sku', 'price')
        // ->where('price', '>', 1000)->get();

        // $products = DB::table("products")->where('sku', 'BS-300')->get(); // find in all data and get all similar rows

        // $products = DB::table("products")->where('sku', 'BS-300')->first(); //  get only first rows in tergated similar rows
        // $products = DB::table("products")->where('id', '3')->first(); // similar of top way, but find in only ID Columns
        
        // $products = DB::table("products")->find(3); // similar but shortcut

        // $products = DB::table("products")->count();

        // $products = DB::table("products")->max('price');
        // $products = DB::table("products")->min('price');

        // $products = DB::table("products")->sum('price');
        // $products = DB::table("products")->sum('stock');

        $products = DB::table("products")
        ->sum(DB::raw("price * stock")); // sum all products with stock numbers.
        return $products;
    }

    public function orders(){
        // $orders = DB::table('orders')->get();

        $orders = DB::table("orders")
            ->rightJoin("customers","orders.customer_id", "=", "customers.id")->get();
    
        $customers = DB::table("customers")->leftJoin("orders", 'customers.id', "=", "orders.customer_id")->get();
            return $customers;
    
    }

}
