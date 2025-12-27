@extends('layouts.admin')
@section('title', 'Admin Dashboard | Simple Blog')

@section('content')
<!-- Top Header -->

    <header class="bg-white shadow-sm px-8 py-4">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-dark">Dashboard</h1>
                <p class="text-gray-600">Welcome back, Admin!</p>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 text-primary hover:underline">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                View Site
            </a>
        </div>
    </header>
<div class="p-8"> 
    <!-- Stats Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Categories -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <span class="text-green-500 text-sm font-medium">+2 new</span>
            </div>
            <h3 class="text-3xl font-bold text-dark">{{$totalCategories}}</h3>
            <p class="text-gray-600">Total Categories</p>
        </div>

        <!-- Total Posts -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <span class="text-green-500 text-sm font-medium">+8 this week</span>
            </div>
            <h3 class="text-3xl font-bold text-dark">{{$totalPosts}}</h3>
            <p class="text-gray-600">Total Posts</p>
        </div>

        <!-- Published Posts -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-dark">{{$totalPublishedPosts}}</h3>
            <p class="text-gray-600">Published</p>
        </div>

        <!-- Draft Posts -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-dark">{{$totalDraftPosts}}</h3>
            <p class="text-gray-600">Drafts</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{route('posts.create')}}" class="flex flex-col items-center gap-2 p-4 bg-primary/5 rounded-lg hover:bg-primary/10 transition">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-dark">New Post</span>
                </a>
                <a href="{{route('categories.create')}}" class="flex flex-col items-center gap-2 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-dark">New Category</span>
                </a>
                <a href="{{route('posts.allpost')}}" class="flex flex-col items-center gap-2 p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                    <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-dark">Manage Posts</span>
                </a>
                <a href="{{route('categories.index')}}" class="flex flex-col items-center gap-2 p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-dark">Categories</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark mb-4">Recent Activity</h2>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-dark">New post <span class="font-medium">"Laravel 11 Guide"</span> published</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-dark">Category <span class="font-medium">"Education"</span> updated</p>
                        <p class="text-xs text-gray-500">5 hours ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-dark">Post <span class="font-medium">"API Best Practices"</span> published</p>
                        <p class="text-xs text-gray-500">Yesterday</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts Table -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-dark">Recent Posts</h2>
            <a href="{{ route('posts.allpost') }}" class="text-primary text-sm hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($recentPosts as $post)
                    <tr class="hover:bg-gray-50 border-b border-gray-100">
                        <td class="px-6 py-4">
                            <p class="font-medium text-dark">{{$post->title}}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="{{ $post->category->color['badge'] }} text-xs px-2 py-1 rounded">{{ucfirst($post->category->name)}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded
                        {{  $post->status == 'published' 
                            ? 'bg-green-100 text-green-600' 
                            : 'bg-orange-100 text-orange-600' 
                        }}">
                        {{ucfirst($post->status)}}
                        </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{$post->published_at ? $post->published_at->format('M d, Y') : 'Not published'}}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{route('posts.edit', $post->id)}}" class="text-primary hover:underline text-sm">Edit</a>
                                <span class="text-gray-300">|</span>
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline text-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection


