@extends('layouts.admin')
@section('title', 'Create Category | Simple Blog')

@section('content')

<header class="bg-white shadow-sm px-8 py-4">
    <div class="flex items-center gap-4">
        <a href="{{ route('categories.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-dark">Create Category</h1>
            <p class="text-gray-600">Add a new blog category</p>
        </div>
    </div>
</header>

<div class="p-8">
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-8">
            
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Category Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                        placeholder="e.g., Technology">
                    <!-- Validation Error -->
                    <p class="mt-1 text-sm text-red-600 hidden">The name field is required.</p>
                    <p class="mt-1 text-sm text-gray-500">Maximum 100 characters. Must be unique.</p>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none"
                        placeholder="Brief description of the category..."></textarea>
                    <p class="mt-1 text-sm text-gray-500">Optional. Describe what this category is about.</p>
                </div>

                <!-- Category Image -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Category Image
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-primary transition cursor-pointer">
                        <input type="file" id="image" name="image" class="hidden" accept="image/*">
                        <label for="image" class="cursor-pointer">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-600 mb-2">Click to upload an image</p>
                            <p class="text-sm text-gray-400">PNG, JPG, GIF up to 2MB</p>
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-dark transition focus:ring-4 focus:ring-primary/30">
                        Create Category
                    </button>
                    <a href="{{ route('categories.index') }}"
                        class="px-6 py-3 text-gray-600 hover:text-gray-800 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection 