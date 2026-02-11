<?php

namespace App\Http\Controllers\Auth\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with('category')->orderByDesc('id')->get();

            return response()->json([
                'success' => true,
                'message' => 'Product list fetched successfully.',
                'products-data' => $products,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching products.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                "category_id" => "required|integer|exists:categories,id",
                "name" => ["required", "string", "max:30"],
                "sku" => ["required", "string", "max:30", 'unique:products,sku'],
                'unit' => ['required', 'string', 'max:20'],
                'image_path' => ['nullable', 'string', 'max:255'],
                "low_stock_threshold" => "nullable|integer|min:0",
                "color" => "nullable|string|max:20",
                "size" => "nullable|string|max:100",
                "weight" => "nullable|numeric|min:0",
                "price" => "required|numeric|min:0",
                "status" => "sometimes|boolean",
                "stock_qty" => ["nullable", "integer", "min:0"]
            ]);

            $product = Product::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Product created sucessfully.',
                'product_data' => $product->load('category')
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while creating product',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $product = Product::with('category')->find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => "Product not found",
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => "Product fetched successfully.",
                'product_data' => $product,
            ], 404);
              
        }catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching category',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, int $id){
        try{
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'success' => false,
                    'message' => "Product not found",
                ], 404);
            }

            $validated = $request->validate([
                "category_id" => "sometimes|integer|exists:categories,id",
                "name" => ["sometimes", "string", "max:30"],
                "sku" => ["sometimes", "string", "max:30", 'unique:products,sku,'.$product->id],
                'unit' => ['sometimes', 'string', 'max:20'],
                'image_path' => ['nullable', 'string', 'max:255'],
                "low_stock_threshold" => "nullable|integer|min:0",
                "color" => "nullable|string|max:20",
                "size" => "nullable|string|max:100",
                "weight" => "nullable|numeric|min:0",
                "price" => "sometimes|numeric|min:0",
                "status" => "sometimes|boolean",
                "stock_qty" => ["nullable", "integer", "min:0"]
            ]);

            $product->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Product updated sucessfully.',
                'product_data' => $product->load('category')
            ], 200);
            
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating product',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request, int $id){
        try{
            $product = Product::find($id);

            if(!$product){
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found to delete',
                ], 404);
            }

            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully.',
            ], 200);
            
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting product',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }
}
