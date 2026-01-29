<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class CategoryController extends Controller
{
    public function index(){
        try{
            $categories = Category::orderByDesc("id")->get();
            return response()->json([
                'success' => true,
                'message' => 'Category list fetched successfully!',
                'categories-data' => $categories,
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success'=> false,
                'message'=> 'Something went wrong while fetching categories',
                'errors'=> $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request){
        try{
            $validated = $request->validate([
                'name'=> 'required|string|max:30',
                'description' => ['nullable','string'],
                'status' => 'boolean'
            ]);
            
            $category = Category::create($validated);

            return response()->json([
                'success'=> true,
                'message'=> 'Creategory created successfully',
                'category-data'=> $category
            ], 201);
        }catch(ValidationException $e){
            return response()->json([
                'success'=> false,
                'message'=> 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }catch(\Throwable $e){
            return response()->json([
                'success'=> false,
                'message'=> 'Something went wrong while creating category',
                'errors'=> $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id){
        try{
            $category = Category::find($id);

            if(!$category){
                return response()->json([
                    'success'=> false,
                    'message'=> 'Category Not Found.',
                ], 404);
            }

            return response()->json([
                'success'=> true,
                'message'=> 'Category fetched successfully.',
                'category-data' => $category
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success'=> false,
                'message'=> 'Something went wrong while fetching category',
                'errors' => $e->getMessage(),
            ]) ;
        }
    }

    public function update(Request $request, int $id){
        try{
            $category = Category::find($id);

            if(!$category){
                return response()->json([
                    'success'=> false,
                    'message'=> 'Category Not Found.',
                ], 404);
            }

            $validated = $request->validate([
                'name'=> ['sometimes', 'required', 'string','max:30'],
                "description" => "sometimes|nullable|string",
                "status"=> ["sometimes","boolean"],
            ]);
            
            $category->update($validated);
            
            return response()->json([
                "success"=> true,
                "message" => "Category updated successfully",
                "category-data" => $category,
            ], 200);

        }catch(ValidationException $e){
            return response()->json([
                "success"=> false,
                "message"=> "Category update validation Error",
                "errors"=> $e->errors(),
            ]);
        }catch(\Throwable $e){
            return response()->json([
                "success"=> false,
                "message"=> "Somethng went wrong while updating category",
                "errors"=> $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request, int $id){
        try{
            $category = Category::find($id);
            
            if(!$category){
                return response()->json([
                    'success'=> false,
                    'message'=> 'Category Not Found.',
                ], 404);
            }

            $category->delete();

            return response()->json([
                'success'=> true,
                'message'=> 'Category deleted successfully!',
            ], 200);

        }catch(\Throwable $e){
            return response()->json([
                "success" => false,
                "message"=> $e->getMessage(),
            ], 500);
        }
    }
}
