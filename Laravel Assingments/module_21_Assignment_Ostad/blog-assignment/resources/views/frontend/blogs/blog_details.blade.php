@extends('layouts.app')
@section('title', 'Blog Details | Simple Blog')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4 ">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-primary transition">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('category-details', $post->category->id) }}" class="hover:text-primary transition">{{ $post->category->name }}</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-dark font-medium">{{ $post->title }}</span>
            </nav>
        </div>
    </div>

    <!-- Blog Content -->
    <article class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <header class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <a href="{{ route('category-details', $post->category->id) }}" class="{{ $post->category->color['badge'] }} text-sm font-medium px-3 py-1 rounded-full hover:bg-blue-200 transition">
                        {{ $post->category->name }}
                    </a>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500">{{ $post->created_at->format('F j, Y') }}</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-dark mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary to-blue-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                        {{ strtoupper(substr($post->user->name, 0, 2)) }}
                    </div>
                    <div>
                        <p class="font-medium text-dark">{{ $post->user->name }}</p>
                        <p class="text-sm text-gray-500">Full Stack Developer</p>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->category->slug}}" class="w-full h-64 md:h-96 object-cover">
            </div>

            <!-- Content -->
            <div class="prose text-gray-700 text-lg">
                {!! $post->content !!}
            </div>

            <!-- Tags -->
            <div class="mt-10 pt-8 border-t">
                <div class="flex flex-wrap gap-2">
                    <span class="text-gray-600 font-medium">Tags:</span>
                    <a href="{{ route('category-details', $post->category->id) }}" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">{{ $post->category->name }}</a>
                    <a href="{{ route('category-details', $post->category->id) }}" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">{{ $post->category->name }}</a>
                    <a href="{{ route('category-details', $post->category->id) }}" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">{{ $post->category->name }}</a>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Home
                </a>
                <a href="{{ route('category-details', $post->category->id) }}" class="flex items-center justify-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-primary-dark transition">
                    {{ ucfirst($post->category->name) }} Posts
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </article>

    <!-- Related post -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-dark mb-8 ">Recent post from {{ $post->category->name }}</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Related Post 1 -->
                <article class="bg-light rounded-xl overflow-hidden hover:shadow-lg transition group">
                    <div class="h-40 bg-gradient-to-br from-teal-400 to-teal-600 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-gray-500 mb-2">{{ $post->created_at->format('M d, Y') }}</p>
                        <h3 class="font-bold text-dark group-hover:text-primary transition">
                            <a href="{{ route('blog.details', $post->id) }}">{{ $post->title }}</a>
                        </h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

@endsection