@extends('layouts.app')
@section('title', 'All Categories | Simple Blog')

@section('content')

<!-- Categories Section -->
    <section id="categories" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

@endsection