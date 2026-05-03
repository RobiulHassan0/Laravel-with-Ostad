

    <!-- Sidebar -->
    <aside class="w-64 bg-dark min-h-screen fixed left-0 top-0">
        <div class="p-6">
            <!-- Logo -->
            <a href="{{route('home')}}" class="flex items-center space-x-2 text-white mb-8">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
                <span class="text-xl font-bold">Simple Blog</span>
            </a>

            <!-- Admin Info -->
            <div class="flex items-center gap-3 mb-8 pb-6 border-b border-gray-700">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                    H
                </div>
                <div>
                    <p class="text-white font-medium">{{ Auth::user()->name ?? 'Guest Admin' }}</p>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->email ?? 'admin@blog.com' }}</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-primary rounded-lg text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{route('categories.index')}}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Categories
                </a>
                <a href="{{ route('posts.allpost') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Posts
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
                <button type="submit" class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-lg transition w-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </div>
        </form>
    </aside>
