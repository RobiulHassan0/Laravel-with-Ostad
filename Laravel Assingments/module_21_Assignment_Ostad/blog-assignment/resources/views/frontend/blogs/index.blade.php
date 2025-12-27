@extends('layouts.app')
@section('title', 'Home | Simple Blog')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary to-primary-dark text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                Welcome to My Simple Blog
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Read articles by category. Discover new ideas, stories, and insights.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#posts" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg ">
                    View All Posts
                </a>
                <a href="{{ route('category-index') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">
                    Browse Categories
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-16 bg-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-dark mb-4">Browse by Category</h2>
                <p class="text-gray-600">Find posts that interest you the most</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Category Card -->
                @foreach($categories as $category)
                    <a href="{{ route('category-details', $category->id) }}" class="group {{ $category->color['card'] }} p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
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

    <!-- Recent Posts Section -->
    <section id="posts" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-dark mb-4">Recent Posts</h2>
                <p class="text-gray-600">Latest articles from our blog</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Post Card -->
                @foreach($posts as $post)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="{{ $post->category->color['badge'] }} text-xs font-medium px-2.5 py-0.5 rounded">{{ $post->category->name }}</span>
                            <span class="text-gray-400 text-sm">{{ $post->created_at->format('M j, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                            <a href="{{ route('blog.details', $post->id) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $post->content }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-300 rounded-full"><img src="https://i.ibb.co.com/8LKS6Dzk/man.png" alt="man" border="0"></div>
                                <span class="text-sm text-gray-600">{{ $post->user->name }}</span>
                            </div>
                            <a href="{{ route('blog.details', $post->id) }}" class="text-primary font-medium text-sm hover:underline">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-24 flex justify-center">
            <nav class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($posts->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed ">Previus</span>
                @else
                <a href="{{ $posts->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-primary hover:text-white transition">Previous</a>
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
                    <a href="{{ $posts->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-primary hover:text-white transition">Next</a>
                @else
                    <span class="px-3 py-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Next</span>
                @endif
            </nav>
        </div>
    </section>

@endsection

