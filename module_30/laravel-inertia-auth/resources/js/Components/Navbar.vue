<script setup>
import { Link, router } from '@inertiajs/vue3';

function logout(){
    router.post('/logout')
}

</script>

<template>
    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo -->
                <div class="text-2xl font-bold text-indigo-600">
                    <Link href="/tasks">TaskApp</Link>
                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">
                        Home
                    </a>

                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">
                        Tasks
                    </a>

                    <a href="#" class="text-gray-700 hover:text-indigo-600 transition">
                        About
                    </a>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-3">
                    <template v-if="$page.props.auth?.user">
                        <p class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 transition">
                            Hello, {{ $page.props.auth.user.name }}
                        </p>

                        <button @click="logout" class="px-4 py-2 bg-indigo-600 text-white text-sm
                           font-semibold rounded-lg hover:bg-indigo-700
                           transition">
                            Log Out
                        </button>
                    </template>

                    <template v-else>
                        <Link href="/login" class="px-4 py-2 text-sm font-medium text-gray-600
                           hover:text-indigo-600 transition">
                            Login
                        </Link>

                        <Link href="/register" class="px-4 py-2 bg-indigo-600 text-white text-sm
                           font-semibold rounded-lg hover:bg-indigo-700
                           transition">
                            Register
                        </Link>
                    </template>
                </div>

            </div>
        </div>
    </nav>

</template>

<style scoped></style>