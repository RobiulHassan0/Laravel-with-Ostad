@extends('layouts.app')

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
            <a href="#posts" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg">
                View All Posts
            </a>
            <a href="#categories" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition">
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
            <!-- Category Card 1 -->
            @foreach($categories as $category)
            <a href="{{ route('category', ['slug' => $category->slug]) }}" class="group bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-semibold">{{ $category->name }}</h3>
                <p class="text-sm text-blue-100 mt-1">{{ $category->post_count }} posts</p>
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
            <!-- Post Card 1 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-blue-100 text-blue-600 text-xs font-medium px-2.5 py-0.5 rounded">Technology</span>
                        <span class="text-gray-400 text-sm">Dec 15, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">Getting Started with Laravel 11: A Complete Guide</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Laravel 11 brings exciting new features and improvements. In this comprehensive guide, we'll explore the latest updates and how to leverage them in your projects...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">John Doe</span>
                        </div>
                        <a href="blog-details.html" class="text-primary font-medium text-sm hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="#" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-dark transition">
                Load More Posts
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </div>
</section>