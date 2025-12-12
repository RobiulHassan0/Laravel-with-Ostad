<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function oneToOne(){
        $data = Customer::with('profile')
        ->orderBy('id', 'desc')
        ->get();
        return response()->json($data); 
    }

    public function oneToMany(){
        // $data = Customer::with('orders.items')
        // ->orderBy('id', 'desc')
        // ->get();
        // return response()->json($data);

        // $data = Customer::with(['orders.items', 'orders.payments', 'profile'])
        // ->orderBy('id', 'desc')
        // ->get();

        // return response()->json($data);

        // $data = Customer::with(['orders.items' => function ($query) {
        //     $query->select('order_id', 'product_id', 'qty', 'unit_price');
        // }])
        // ->orderBy('id', 'desc')
        // ->get();
        // return response()->json($data);

        $data = Customer::select('id', 'name', 'email', 'phone')
            ->with([
                'orders' => function ($query){
                    $query->select('id', 'customer_id', 'order_no', 'status', 'grand_total')->orderBy('id', 'desc');
                },
                'orders.items' => function($query){
                    $query->select('order_id', 'product_id', 'qty', 'unit_price');
                }
            ])->orderBy('id', 'desc')
            ->get();
        return response()->json($data);
    }

    public function manyToMany(){
        $products = Product::whereHas('categories', function($query) {
            $query->where('name', 'Phones');
        })->with('categories')->get();
        return response()->json($products);
    }

    public function productWithCat(){
        $products = Product::with('categories');
        return response()->json($products);
    }

    public function manyToManyTest(){
        $products = Product::with(['categories'])
        ->whereHas('categories', function ($query) {
            $query->where('name', 'Accessories');
        })
        ->get();
        return response()->json($products);
    }

    public function selfReff(){
        $tree = Category::with('children')
        // ->where('parent_id', null)
        ->whereNull('parent_id')
        ->get();

        $withParents = Category::with('parent')
        ->whereNotNull('parent_id')
        ->get();
        return response()->json([
            'root_with_children' => $tree,
            'children_with_parent' => $withParents,

        ]);
    }
}
