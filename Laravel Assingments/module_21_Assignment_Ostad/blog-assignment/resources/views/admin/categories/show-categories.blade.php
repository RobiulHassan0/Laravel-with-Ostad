@extends('layouts.admin')
@section('title', 'All Categories | Simple Blog')

@section('content')
    <header class="bg-white shadow-sm px-8 py-4">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-dark">Categories</h1>
                <p class="text-gray-600">Manage blog categories</p>
            </div>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Category
            </a>
        </div>
    </header>

    <div class="p-8">
        <!-- Success Message (Hidden by default) -->
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 hidden">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Category created successfully!</span>
            </div>
        </div>

        <!-- Categories Table -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Posts</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        @foreach($categories as $category)

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $category->id }}</td>

                            <td class="px-6 py-4">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center shadow-sm {{ $category->color['card'] }}">
                                    @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        alt="{{ $category->name }}"
                                        class="w-6 h-6 object-contain brightness-0 invert">
                                    @else
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <p class="font-medium text-dark">{{ $category->name }}</p>
                                <p class="text-sm text-gray-500">Slug: {{ $category->slug }}</p>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                {{ $category->description }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="text-xs font-medium px-2 py-1 rounded {{ $category->color['badge'] }}">
                                    {{ $category->posts->count() }} posts
                                </span>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $category->created_at ? $category->created_at->format('M d, Y') : 'N/A' }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="p-2 text-primary hover:bg-primary/10 rounded-lg" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg" title="Delete">
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
        </div>
    </div>

@endsection