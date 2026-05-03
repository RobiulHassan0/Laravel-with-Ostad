<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // 1. Show all products
    public function index()
    {
        $products = DB::table('products')->paginate(10);
        return view('products.index', compact('products'));
    }

    // 2. Show create form
    public function create()
    {
        return view('products.create');
    }

    // 3. Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        DB::table('products')->insert([
            'product_id' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image, // localStorage filename
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/products')->with('success', 'Product created successfully!');
    }

    // 4. Show single product
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.show', compact('product'));
    }

    // 5. Show edit form
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('products.edit', compact('product'));
    }

    // 6. Update product
    public function update(Request $request, $id)
    {
        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'updated_at' => now(),
        ]);

        return redirect('/products')->with('success', 'Product updated successfully!');
    }

    // 7. Delete product
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/products')->with('success', 'Product deleted successfully!');
    }
}
