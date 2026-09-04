<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    token: String,
    email: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submitForm = () => {
    form.post('/reset-password')
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    Reset Password
                </h2>

                <p class="text-gray-500 mt-2">
                    Enter your new password below.
                </p>
            </div>

            <form @submit.prevent="submitForm" class="space-y-5">

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>

                    <input v-model="form.email" type="email" readonly
                        class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg outline-none text-gray-500">

                    <p v-if="form.errors.email" class="text-rose-500">{{ form.errors.email }}</p>
                </div>

                <!-- New Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        New Password
                        <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.password" type="password" placeholder="Enter new password (min 6 characters)"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">

                    <span v-if="form.errors.password" class="text-sm text-rose-500">
                        {{ form.errors.password }}
                    </span>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                        <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.password_confirmation" type="password" placeholder="Confirm your new password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">

                    <span v-if="form.errors.password_confirmation" class="text-sm text-rose-500">
                        {{ form.errors.password_confirmation }}
                    </span>
                </div>

                <!-- Reset Button -->
                <button type="submit" :disabled="form.processing" class="w-full bg-indigo-600 hover:bg-indigo-700
                           disabled:bg-indigo-400 text-white font-semibold
                           py-3 rounded-lg transition duration-200">
                    {{ form.processing ? 'Resetting...' : 'Reset Password' }}
                </button>

            </form>

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
