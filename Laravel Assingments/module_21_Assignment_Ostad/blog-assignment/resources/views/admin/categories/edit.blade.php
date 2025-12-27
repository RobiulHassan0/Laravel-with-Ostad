@extends('layouts.admin')
@section('title', 'Edit Category | Simple Blog')

@section('content')
<header class="bg-white shadow-sm px-8 py-4">
    <div class="flex items-center gap-4">
        <a href="{{ route('categories.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-dark">Edit Category</h1>
            <p class="text-gray-600">Update category details</p>
        </div>
    </div>
</header>

<div class="p-8">
    <form id="categoryUpdateForm"
        action="{{ route('categories.update', $category->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method("PUT")
    </form>
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-8">

            <!-- Category Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Category Name <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" required
                    value="{{ old('name', $category->name) }}" form="categoryUpdateForm"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                    placeholder="e.g., Technology">
                <p class="mt-1 text-sm text-gray-500">Maximum 100 characters. Must be unique.</p>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea id="description" name="description" rows="4" form="categoryUpdateForm"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none"
                    placeholder="Brief description of the category...">{{ old('description', $category->description) }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Optional. Describe what this category is about.</p>
            </div>

            <!-- Current Image -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Current Image
                </label>
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="w-full h-full object-cover rounded-lg">
                        @else
                        <span class="text-white font-bold">None</span>
                        @endif
                    </div>
                    <!-- <form action="{{ route('categories.removeImage', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm hover:underline">Remove Image</button>
                        </form> -->
                </div>
            </div>

            <!-- New Image Upload -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Upload New Image
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition cursor-pointer">
                    <input form="categoryUpdateForm" type="file" id="image" name="image" class="hidden" accept="image/*">
                    <label for="image" class="cursor-pointer">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600 text-sm">Click to upload a new image</p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB</p>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4">
                <button type="submit" form="categoryUpdateForm"
                    class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition focus:ring-4 focus:ring-primary/30">
                    Update Category
                </button>
                <a href="{{ route('categories.index') }}"
                    class="px-6 py-3 text-gray-600 hover:text-gray-800 transition">
                    Cancel
                </a>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="mt-8 bg-white rounded-xl shadow-sm p-8 border-2 border-red-100">
            <h3 class="text-lg font-bold text-red-600 mb-4">Danger Zone</h3>

            <p class="text-gray-600 mb-4">Once you delete a category, there is no going back. All posts under this category will become uncategorized.</p>
            <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600 transition"
                    onclick="return confirm('Are you sure you want to delete this category?')">
                    Delete Category
                </button>
            </form>
        </div>
    </div>
</div>

@endsection