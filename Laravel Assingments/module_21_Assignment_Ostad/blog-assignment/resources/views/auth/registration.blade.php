<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Simple Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        'primary-dark': '#1e3a8a',
                        secondary: '#f59e0b',
                        accent: '#10b981',
                        dark: '#1f2937',
                        light: '#f3f4f6'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', 'Hind Siliguri', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-primary to-primary-dark min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="index.html" class="inline-flex items-center space-x-2 text-white">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <span class="text-2xl font-bold">Simple Blog</span>
            </a>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-dark">Create Account</h1>
                <p class="text-gray-600 mt-2">Register to become an admin</p>
            </div>

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <!-- Name Field -->
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="John Doe">
                    </div>
                    <p class="mt-1 text-sm text-red-600 hidden">Name is required.</p>
                </div>

                <!-- Email Field -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="admin@example.com">
                    </div>
                    <p class="mt-1 text-sm text-red-600 hidden">Please enter a valid email address.</p>
                </div>

                <!-- Password Field -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required minlength="5"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="••••••••">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Must be at least 5 characters</p>
                </div>

                <!-- Confirm Password Field
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="••••••••">
                    </div>
                    <p class="mt-1 text-sm text-red-600 hidden">Passwords do not match.</p>
                </div> -->

                <!-- Terms Checkbox -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms" required class="w-4 h-4 mt-0.5 text-primary border-gray-300 rounded focus:ring-primary">
                        <span class="ml-2 text-sm text-gray-600">
                            I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-primary text-white py-3 px-4 rounded-lg font-semibold hover:bg-primary-dark transition focus:ring-4 focus:ring-primary/30">
                    Create Account
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-sm text-gray-500">or</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            <!-- Login Link -->
            <p class="text-center text-gray-600">
                Already have an account? 
                <a href="login.html" class="text-primary font-medium hover:underline">Sign in here</a>
            </p>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="index.html" class="inline-flex items-center gap-2 text-blue-100 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>
