@extends('layouts.admin')
@section('title', 'Edit Blog | Simple Blog')

@section('content')

<div class="p-8">
    <form id="postUpdateForm"
        action="{{ route('posts.update', $post->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
    </form>
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Title -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Post Title <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" name="title" required form="postUpdateForm"
                    value="{{ old('title', $post->title) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition text-lg">
                @if ($errors->has('title'))
                    <p class="mt-1 text-sm text-red-600 hidden">{{$message}}</p>
                @endif
            </div>

            <!-- Short Description -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                    Short Description <span class="text-red-500">*</span>
                </label>
                <textarea id="short_description" name="short_desc" rows="3" required form="postUpdateForm"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none"
                    placeholder="Enter a short description for this post (max 150 characters)">{{ old('short_desc', $post->short_desc) }}</textarea>

                @error('short_desc')
                <p class="mt-1 text-sm text-red-600 hidden">{{$message}}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    Content <span class="text-red-500">*</span>
                </label>
                <textarea id="content" name="content" rows="15" required form="postUpdateForm"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none">{{ old('content', $post->content) }}</textarea>

                @if ($errors->has('content'))
                <p class="text-red-500 text-sm mt-2">{{ $errors->first('content') }}</p>
                @endif
            </div>

            <!-- Current Featured Image -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Current Featured Image
                </label>
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Current featured image" class="w-full h-48 object-cover rounded-lg">
                </div>

            </div>

            <!-- Upload New Image -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Upload New Featured Image
                </label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition cursor-pointer">
                    <input type="file" id="featured_image" name="image" form="postUpdateForm" class="hidden" accept="image/*">
                    <label for="featured_image" class="cursor-pointer">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-600 text-sm">Click to upload a new image</p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 5MB</p>
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
                    @php
                    $status = old('status', $post->status);
                    @endphp
                    <select id="status" name="status" required form="postUpdateForm"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $status == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <!-- Published Date Info -->
                    @if($post->status === 'published' && $post->published_at)
                    <div class="mb-4 p-3 space-y-2 bg-green-50 rounded-lg">
                        <p class="text-sm text-green-700">
                            <span class="font-bold">Published :</span>
                            {{ $post->published_at->format('M d, Y \a\t g:i A') }}
                        </p>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col gap-3">

                    <button type="submit" form="postUpdateForm"
                        class="w-full bg-primary text-white px-4 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                        Update Post
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

                <select id="category_id" name="category_id" required form="postUpdateForm"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    <option value="">Choose a category...</option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>

            <!-- Post Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-semibold text-dark mb-4">Post Info</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Author:</span>
                        <span class="font-bold text-dark">{{ Str::ucfirst($post->user->name) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Created:</span>
                        <span class="text-gray-700">{{ $post->created_at->format('M d, Y \a\t g:i A') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Updated:</span>
                        <span class="text-gray-700">{{ $post->updated_at->ne($post->created_at) ? $post->updated_at->format('M d, Y \a\t g:i A') : 'not updated yet' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Slug:</span>
                        <span class="text-gray-700">{{ $post->category->slug }}</span>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-2 border-red-100">
                <h3 class="font-semibold text-red-600 mb-3">Danger Zone</h3>
                <p class="text-sm text-gray-600 mb-4">Once deleted, this post cannot be recovered.</p>
                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full bg-red-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-red-600 transition"
                        onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection