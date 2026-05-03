@extends('layouts.admin')
@section('title', 'Create Blog | Simple Blog')

@section('content')

<header class="bg-white shadow-sm px-8 py-4">
    <div class="flex items-center gap-4">
        <a href="{{ route('posts.allpost') }}" class="p-2 hover:bg-gray-100 rounded-lg transition">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-dark">Create Post</h1>
            <p class="text-gray-600">Write a new blog post</p>
        </div>
    </div>
</header>

<div class="p-8">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Post Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition text-lg"
                        placeholder="Enter your post title... (max 100 characters)">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 hidden">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- Short Description -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                        Short Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="short_description" name="short_desc" rows="3" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none"
                        placeholder="Enter a short description for this post (max 150 characters)"></textarea>

                    @error('short_desc')
                        <p class="mt-1 text-sm text-red-600 hidden">{{$message}}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" name="content" rows="15" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none"
                        placeholder="Write your blog content here... (minimum 50 characters)"></textarea>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 hidden">{{$message}}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Featured Image
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-primary transition cursor-pointer">
                        <input type="file" id="featured_image" name="image" class="hidden" accept="image/*">
                        
                        <label for="featured_image" class="cursor-pointer">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-600 mb-2">Click to upload a featured image</p>
                            <p class="text-sm text-gray-400">PNG, JPG, GIF up to 2MB</p>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                
                <!-- Publish Box -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="font-semibold text-dark mb-4">Publish</h3>
                    
                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select id="status" name="status" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3">
                        <button type="submit"
                            class="w-full bg-primary text-white px-4 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                            Create Post
                        </button>
                        <a href="{{ route('posts.allpost') }}"
                            class="w-full text-center px-4 py-3 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            Cancel
                        </a>
                    </div>
                </div>

                <!-- Category -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="font-semibold text-dark mb-4">Category</h3>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Select Category <span class="text-red-500">*</span>
                    </label>
                    <select id="category_id" name="category_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        <option value="">Choose a category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-sm text-red-600 hidden">Please select a category.</p>
                    <a href="{{ route('categories.create') }}" class="inline-block mt-3 text-sm text-primary hover:underline">
                        + Add New Category
                    </a>
                </div>

                <!-- Writing Tips -->
                <div class="bg-blue-50 rounded-xl p-6">
                    <h3 class="font-semibold text-dark mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Writing Tips
                    </h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Use a catchy title (max 150 chars)</li>
                        <li>• Content should be at least 50 characters</li>
                        <li>• Add a featured image for better engagement</li>
                        <li>• Save as draft to continue editing later</li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

