<?php

namespace App\Http\Controllers\Auth\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index(){
        try{
            $categories = Category::orderByDesc('id')->get();
            return response()->json([
                'success' => true, 
                'message' => 'Category list fetched successfully',
                'category-data' => $categories,
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching categories.',
            ], 500);
        }
    }

    public function store(Request $request){
        try{
            $validated = $request->validate([
                'name' => "required|string|max:50",
                "description" => "nullable|string",
                "status" => "boolean",
            ]);

            $category = Category::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully.',
                'category-data' => $category
            ], 201);
        }catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while creating category',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id){
        try{
            $category = Category::find($id);

            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Category fetched successfully',
                'category-date' => $category
            ], 200);

        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching category.',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, int $id){
        try{
            $category = Category::find($id);
            if(!$category){
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found',
                ], 404);
            }
            
            $validated = $request->validate([
                'name' => "sometimes|string|max:50",
                "description" => "sometimes|nullable|string",
                "status" => "sometimes|boolean"
            ]);

            $category->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Category Updated successfully',
                'category_data' => $category,
            ], 200);
        }catch(ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 404);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating category',
                'errors' => $e->getMessage()
            ], 500);        
        }
    }

    public function destroy(Request $request, int $id){
        try{
            $category = Category::find($id);
            if(!$category){
                return response()->json([
                    'sccess' => false,
                    'message' => 'Category not found.'
                ], 422);
            }

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category Deleted Sucessfully.'
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while deleting category.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }
}
