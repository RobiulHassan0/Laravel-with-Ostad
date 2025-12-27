@extends('layouts.admin')
@section('title', 'All Blogs | Simple Blog')

@section('content')

<!-- Main Content -->
<header class="bg-white shadow-sm px-8 py-4">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-dark">Posts</h1>
            <p class="text-gray-600">Manage blog posts</p>
        </div>
        <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Post
        </a>
    </div>
</header>

<div class="p-8">
    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <form action="{{ route('posts.allpost') }}" method="GET">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[200px]">
                    <input name="search" type="text" placeholder="Search posts..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" value="{{request('search')}}">
                </div>

                @if($categories->isNotEmpty())
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @endif

                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>

                <button class=" px-4 py-2 rounded-lg transition
                    {{ request('search') || request('status') || request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Filter
                </button>

                @if( request('search') || request('status') || request('category') )
                    <a href="{{ route('posts.allpost') }}" class="text-md bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">Reset</a>
                @endif    
            </div>
        </form>
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

                    @foreach($allPosts as $post)

                    <tr class="hover:bg-gray-50">
                        <!-- Post Title -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-medium text-dark">{{ $post->title }}</p>
                                    <p class="text-sm text-gray-500 truncate max-w-[300px]">{{ $post->short_desc }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Category -->
                        <td class="px-6 py-4">
                            <span class="{{ $post->category->color['badge'] }} text-xs font-medium px-2.5 py-1 rounded ">{{ $post->category->name }}</span>
                        </td>

                        <!-- Author -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-primary rounded-full flex items-center justify-center text-white text-xs font-bold">{{ mb_substr($post->user->name, 0, 1) }}</div>
                                <span class="text-sm text-gray-600">{{ $post->user->name }}</span>
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-600 text-xs font-medium px-2.5 py-1 rounded
                                {{ $post->status === 'published' 
                                    ? 'bg-green-100 text-green-600' 
                                    : 'bg-orange-100 text-orange-600' 
                                }}">
                                {{ ucfirst($post->status) }}
                                </span">
                        </td>

                        <!-- Published Date -->
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not Published' }}</td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center w-32 gap-3">
                                <!-- View -->
                                @if($post->status === 'published')
                                <a href="{{ route('blog.details', $post->id) }}" target="_blank" class="p-2 text-gray-500 hover:bg-gray-100 rounded-lg transition" title="View">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @endif

                                <!-- Edit -->
                                <a href="{{ route('posts.edit', $post->id) }}" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-sm text-gray-600">
                Showing {{ $allPosts->firstItem() }} to {{ $allPosts->lastItem() }} of {{ $allPosts->total() }} results
            </p>

            <nav class="flex items-center gap-2">
                <!-- Previous Button -->
                @if ($allPosts->onFirstPage())
                    <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $allPosts->previousPageUrl() }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition"> Previous </a>
                @endif

                <!-- Page Numbers -->
                @foreach ($allPosts->getUrlRange(max(1, $allPosts->currentPage() - 1), min($allPosts->lastPage(), $allPosts->currentPage() + 1)) as $page => $url)
                    @if ($page == $allPosts->currentPage())
                        <span class="px-3 py-1 bg-primary text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">{{ $page }}</a>
                    @endif
                @endforeach

                <!-- Next Button -->
                @if ($allPosts->hasMorePages())
                    <a href="{{ $allPosts->nextPageUrl() }}" class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">Next</a>
                @else
                    <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded cursor-not-allowed">Next</span>
                @endif
            </nav>
        </div>
    </div>
</div>

@endsection
