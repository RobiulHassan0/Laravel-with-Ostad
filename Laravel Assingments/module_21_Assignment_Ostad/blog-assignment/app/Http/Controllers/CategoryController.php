<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function showCategories(){
        $categories = Category::all();
        return view('admin.categories.show-categories', compact('categories'));
    }

    public function createCategory(){
        return view('admin.categories.create');
    }

    public function storeCategory(CategoryRequest $request){
        $data = $request->validated();   
        $data['slug'] = Str::slug($data['name']);
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() .'_'. uniqid() .'.'. $image->getClientOriginalExtension();
            
            $path = $image->storeAs('categories', $imageName, 'public');
            $data['image'] = $path;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.category-edit', compact('category'));
    }

    public function updateCategory(CategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $data = $request->validated();   

        if($request->hasFile('image')){
            if($category->image){
                Storage::disk('public')->delete($category->image);
            }

            $image = $request->file('image');
            $imageName = time() .'_'. uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('categories', $imageName, 'public');
            $data['image'] = $path;
        }

        $category->update($data);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
