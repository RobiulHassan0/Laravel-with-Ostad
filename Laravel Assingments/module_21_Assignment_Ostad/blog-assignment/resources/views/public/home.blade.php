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
<!-- 
            <!-- Category Card 2 -->
            <a href="{{ route('category', ['slug' => 'lifestyle']) }}" class="group bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold">Lifestyle</h3>
                <p class="text-sm text-green-100 mt-1">8 posts</p>
            </a>

            <!-- Category Card 3 -->
            <a href="{{ route('category', ['slug' => 'education']) }}" class="group bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="font-semibold">Education</h3>
                <p class="text-sm text-purple-100 mt-1">15 posts</p>
            </a>

            <!-- Category Card 4 -->
            <a href="{{ route('category', ['slug' => 'travel']) }}" class="group bg-gradient-to-br from-orange-500 to-orange-600 p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                </div>
                <h3 class="font-semibold">Travel</h3>
                <p class="text-sm text-orange-100 mt-1">6 posts</p>
            </a>

            <!-- Category Card 5 -->
            <a href="{{ route('category', ['slug' => 'entertainment']) }}" class="group bg-gradient-to-br from-pink-500 to-pink-600 p-6 rounded-xl text-white text-center hover:shadow-xl transition transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold">Entertainment</h3>
                <p class="text-sm text-pink-100 mt-1">10 posts</p>
            </a> -->
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

            <!-- Post Card 2 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-green-100 text-green-600 text-xs font-medium px-2.5 py-0.5 rounded">Lifestyle</span>
                        <span class="text-gray-400 text-sm">Dec 14, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">10 Productivity Tips for Remote Workers</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Working from home can be challenging. Here are ten proven strategies to boost your productivity and maintain a healthy work-life balance...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Jane Smith</span>
                        </div>
                        <a href="blog-details.html" class="text-primary font-medium text-sm hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Post Card 3 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-purple-100 text-purple-600 text-xs font-medium px-2.5 py-0.5 rounded">Education</span>
                        <span class="text-gray-400 text-sm">Dec 13, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">Understanding MVC Architecture in Web Development</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        The Model-View-Controller pattern is fundamental to modern web frameworks. Learn how MVC works and why it's essential for building maintainable applications...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Admin</span>
                        </div>
                        <a href="blog-details.html" class="text-primary font-medium text-sm hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Post Card 4 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-orange-400 to-orange-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-orange-100 text-orange-600 text-xs font-medium px-2.5 py-0.5 rounded">Travel</span>
                        <span class="text-gray-400 text-sm">Dec 12, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">Top 5 Destinations for Winter Vacation 2024</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Planning your winter getaway? Discover the most breathtaking destinations that offer perfect weather, stunning views, and unforgettable experiences...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Travel Expert</span>
                        </div>
                        <a href="blog-details.html" class="text-primary font-medium text-sm hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Post Card 5 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-pink-400 to-pink-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1485846234645-a62644f84728?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-pink-100 text-pink-600 text-xs font-medium px-2.5 py-0.5 rounded">Entertainment</span>
                        <span class="text-gray-400 text-sm">Dec 11, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">Best Movies to Watch This Holiday Season</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        From heartwarming classics to exciting new releases, here's your ultimate guide to the best movies perfect for cozy holiday viewing...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Movie Buff</span>
                        </div>
                        <a href="blog-details.html" class="text-primary font-medium text-sm hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Post Card 6 -->
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400" alt="Post Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-teal-100 text-teal-600 text-xs font-medium px-2.5 py-0.5 rounded">Technology</span>
                        <span class="text-gray-400 text-sm">Dec 10, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        <a href="blog-details.html">Building RESTful APIs with Laravel: Best Practices</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        Learn how to design and implement robust RESTful APIs using Laravel. This guide covers authentication, validation, and error handling...
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-600">Dev Master</span>
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