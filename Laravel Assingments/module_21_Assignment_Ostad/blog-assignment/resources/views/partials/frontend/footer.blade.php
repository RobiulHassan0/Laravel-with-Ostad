<!-- Footer -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="grid md:grid-cols-4 gap-8">

        <div>
            <div class="flex items-center space-x-2 mb-4">
                <svg class="w-8 h-8 text-secondary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
                <span class="text-xl font-bold">Simple Blog</span>
            </div>
            <p class="text-gray-400">A simple and elegant blog platform built with Laravel.</p>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Quick Links</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                <li><a href="{{ route('category-index') }}" class="hover:text-white transition">Categories</a></li>
                <li><a href="#" class="hover:text-white transition">About</a></li>
                <li><a href="#" class="hover:text-white transition">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Categories</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('category-index') }}" class="hover:text-white transition">Technology</a></li>
                <li><a href="{{ route('category-index') }}" class="hover:text-white transition">Lifestyle</a></li>
                <li><a href="{{ route('category-index') }}" class="hover:text-white transition">Education</a></li>
                <li><a href="{{ route('category-index') }}" class="hover:text-white transition">Travel</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Admin</h4>
            <ul class="space-y-2 text-gray-400">
                <li><a href="{{ route('auth.login') }}" class="hover:text-white transition">Login</a></li>
                <li><a href="{{ route('auth.registration') }}" class="hover:text-white transition">Register</a></li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2024 Simple Blog. All rights reserved. Built with Laravel.</p>
    </div>

</div>
    
