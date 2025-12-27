<!-- Navigation -->
<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-16">

            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
                <span class="text-xl font-bold text-dark">Simple Blog</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                
                <a href="{{ route('home') }}" class="text-primary font-medium">Home</a>
                <a href="{{ route('category-index') }}" class="text-gray-600 hover:text-primary transition">Categories</a>
                
                @if (Auth::check())
                    <a href="{{ route('admin.dashboard') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">Dashboard</a>
                @else
                    <a href="{{ route('auth.login') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">Login</a>
                @endif
            
            </div>

            <button class="md:hidden text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>

    </div>

</nav>