
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology - Category | Simple Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
                    },
                    fontFamily: {
                        'bengali': ['Hind Siliguri', 'sans-serif'],
                        'sans': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', 'Hind Siliguri', sans-serif; }
    </style>
</head>
<body class="bg-light min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <span class="text-xl font-bold text-dark">Simple Blog</span>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary transition">Home</a>
                    <a href="{{ route('category-index') }}" class="text-primary font-medium">Categories</a>
                    <a href="{{ route('auth.login') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Category Header -->
    <!-- Categories Section -->
    <section id="categories" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Category Card -->
                @foreach($categories as $category)
                @php
                $colors = [
                ['card' => 'bg-gradient-to-br from-blue-500 to-blue-600', 'badge' => 'bg-blue-100 text-blue-600'],
                ['card' => 'bg-gradient-to-br from-green-500 to-green-600', 'badge' => 'bg-green-100 text-green-600'],
                ['card' => 'bg-gradient-to-br from-purple-500 to-purple-600', 'badge' => 'bg-purple-100 text-purple-600'],
                ['card' => 'bg-gradient-to-br from-orange-500 to-orange-600', 'badge' => 'bg-orange-100 text-orange-600'],
                ['card' => 'bg-gradient-to-br from-pink-500 to-pink-600', 'badge' => 'bg-pink-100 text-pink-600'],
                ['card' => 'bg-gradient-to-br from-indigo-500 to-indigo-600', 'badge' => 'bg-indigo-100 text-indigo-600'],
                ['card' => 'bg-gradient-to-br from-teal-500 to-teal-600', 'badge' => 'bg-teal-100 text-teal-600'],
                ['card' => 'bg-gradient-to-br from-rose-500 to-rose-600', 'badge' => 'bg-rose-100 text-rose-600'],
                ['card' => 'bg-gradient-to-br from-amber-500 to-amber-600', 'badge' => 'bg-amber-100 text-amber-600'],
                ['card' => 'bg-gradient-to-br from-cyan-500 to-cyan-600', 'badge' => 'bg-cyan-100 text-cyan-600'],
                ];
                $colorData = $colors[$loop->index % count($colors)];
                @endphp
                <a href="{{ route('home', $category->id) }}" class="group {{ $colorData['card'] }} p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-6 h-6 object-contain brightness-0 invert">
                    </div>
                    <h3 class="font-semibold">{{ $category->name }}</h3>
                    <p class="text-sm text-blue-100 mt-1">{{ $category->posts_count }} posts</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Posts List -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Post Card -->
                @foreach($posts as $post)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                    <div class="h-48 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-gray-400 text-sm">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                            <a href="{{ route('category-details', $post->category->id) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $post->description }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">{{ substr($post->user->name, 0, 1) }}</div>
                                <span class="text-sm text-gray-600">{{ $post->user->name }}</span>
                            </div>
                            <a href="{{ route('blog.details', $post->id) }}" class="text-primary font-medium text-sm hover:underline">Read More →</a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-24 flex justify-center">
                <nav class="flex items-center gap-2">
                    <!-- Previous Page -->
                    @if($posts->onFirstPage())
                        <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Previus</span>
                    @else 
                        <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-200 transition">Previous</a>
                    @endif

                    <!-- Page Numbers -->
                    @for($page = 1; $page <= $posts->lastPage(); $page++)
                        @if($page == $posts->currentPage())
                            <span class="px-3 py-1 bg-primary text-white rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $posts->url($page) }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">{{ $page }}</a>
                        @endif
                    @endfor

                    <!-- Next Page -->
                    @if($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-200 transition">Next</a>
                    @else
                        <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Next</span>
                    @endif

                </nav>
            </div>
        </div>
    </section>

    <!-- Empty State (Hidden by default - show when no posts) -->
    <section class="py-16 hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">No posts in this category yet</h3>
            <p class="text-gray-600 mb-6">Check back later for new content!</p>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-primary-dark transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <span class="text-xl font-bold">Simple Blog</span>
                </div>
                <p class="text-gray-400">&copy; 2024 Simple Blog. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
