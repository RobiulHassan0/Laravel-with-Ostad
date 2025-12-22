<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts - Admin | Simple Blog</title>
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
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-dark min-h-screen fixed left-0 top-0">
            <div class="p-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 text-white mb-8">
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
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        Categories
                    </a>
                    <a href="{{ route('admin.posts.allpost') }}" class="flex items-center gap-3 px-4 py-3 bg-primary rounded-lg text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        Posts
                    </a>
                </nav>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
                <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-lg transition">
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
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-dark">Posts</h1>
                        <p class="text-gray-600">Manage blog posts</p>
                    </div>
                    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Post
                    </a>
                </div>
            </header>

            <div class="p-8">
                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1 min-w-[200px]">
                            <input type="text" placeholder="Search posts..." 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        </div>
                        @if($categories->isNotEmpty())
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @endif

                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                            <option value="">All Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                            Filter
                        </button>
                    </div>
                </div>

                <!-- Posts Table -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Published</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=100" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-medium text-dark">Getting Started with Laravel 11</p>
                                                <p class="text-sm text-gray-500 truncate max-w-[300px]">A comprehensive guide to Laravel 11...</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-blue-100 text-blue-600 text-xs font-medium px-2.5 py-1 rounded">Technology</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center text-white text-xs font-bold">J</div>
                                            <span class="text-sm text-gray-600">John Doe</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-600 text-xs font-medium px-2.5 py-1 rounded">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">Dec 15, 2024</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="../blog-details.html" target="_blank" class="p-2 text-gray-500 hover:bg-gray-100 rounded-lg transition" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <a href="posts-edit.html" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=100" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-medium text-dark">10 Productivity Tips for Remote Workers</p>
                                                <p class="text-sm text-gray-500 truncate max-w-[300px]">Working from home can be challenging...</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-600 text-xs font-medium px-2.5 py-1 rounded">Lifestyle</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-teal-500 rounded-full flex items-center justify-center text-white text-xs font-bold">J</div>
                                            <span class="text-sm text-gray-600">Jane Smith</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-600 text-xs font-medium px-2.5 py-1 rounded">Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">Dec 14, 2024</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="../blog-details.html" target="_blank" class="p-2 text-gray-500 hover:bg-gray-100 rounded-lg transition" title="View">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <a href="posts-edit.html" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=100" alt="" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-medium text-dark">Understanding MVC Architecture</p>
                                                <p class="text-sm text-gray-500 truncate max-w-[300px]">The MVC pattern is fundamental...</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-purple-100 text-purple-600 text-xs font-medium px-2.5 py-1 rounded">Education</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-white text-xs font-bold">A</div>
                                            <span class="text-sm text-gray-600">Admin</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="bg-orange-100 text-orange-600 text-xs font-medium px-2.5 py-1 rounded">Draft</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-400">—</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="posts-edit.html" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                        <p class="text-sm text-gray-600">Showing 1 to 3 of 24 posts</p>
                        <nav class="flex items-center gap-2">
                            <button class="px-3 py-1 bg-gray-100 text-gray-500 rounded hover:bg-gray-200 transition disabled:opacity-50" disabled>
                                Previous
                            </button>
                            <button class="px-3 py-1 bg-primary text-white rounded">1</button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">2</button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">3</button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">
                                Next
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
