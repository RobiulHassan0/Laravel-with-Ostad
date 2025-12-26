<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - Admin | Simple Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        'primary-dark': '#1e3a8a',
                        secondary: '#f59e0b',
                        accent: '#10b981',
                        dark: '#1f2937',
                        light: '#f3f4f6'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-light min-h-screen">
    <!-- @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-dark min-h-screen fixed left-0 top-0">
            <div class="p-6">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 text-white mb-8">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <span class="text-xl font-bold">Simple Blog</span>
                </a>

                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-gray-700">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">A</div>
                    <div>
                        <p class="text-white font-medium">{{ Auth::user() ? Auth::user()->name : 'Guest Admin' }}</p>
                        <p class="text-gray-400 text-sm">{{ Auth::user() ? Auth::user()->email : 'admin@blog.com' }}</p>                    
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        Categories
                    </a>
                    <a href="{{ route('posts.allpost') }}" class="flex items-center gap-3 px-4 py-3 bg-primary rounded-lg text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        Posts
                    </a>
                </nav>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
                <a href="" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
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
        </main>
    </div>
</body>
</html>
