<script setup>
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: '',
});

function submitLink(){
    form.post('/forgot-password')
}

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    Forgot Password?
                </h2>

                <p class="text-gray-500 mt-2">
                    No worries! Enter your email and we'll send you
                    a password reset link.
                </p>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitLink" class="space-y-5">

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>

                    <input v-model="form.email" type="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500 transition">
                
                    <p v-if="form.errors.email" class="text-rose-500">{{ form.errors.email }}</p>

                </div>

                <!-- Submit -->
                <button :disabled="form.processing" type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700
                       text-white font-semibold py-3 rounded-lg
                       transition duration-200">
                    {{ form.processing ? 'Sending...' : 'Send Reset Link' }}
                </button>

            </form>

            <!-- Success Message -->
            <p v-if="$page.props.flash?.success" class="bg-green-300 py-2 my-4 rounded-md font-semibold text-center text-green-900">{{ $page.props.flash.success }}</p>

            <!-- Back to Login -->
            <div class="text-center mt-6">
                <Link href="/login" class="text-sm text-indigo-600 font-semibold
                       hover:text-indigo-700">
                    ← Back to Login
                </Link>
            </div>

        </div>
    </div>

</template>

<style scoped></style>