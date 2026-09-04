<script setup>
import { Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submitLogin = () => {
    form.post('/login');
}

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    Welcome Back
                </h2>
                <p class="text-gray-500 mt-2">
                    Login to your account
                </p>
            </div>

            <!-- Success Message -->
            <p v-if="$page.props.flash?.success"
                class="bg-green-300 py-2 my-4 rounded-md font-semibold text-center text-green-900">{{
                    $page.props.flash.success }}</p>
                    

            <form @submit.prevent="submitLogin" class="space-y-5">

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input v-model="form.email" type="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">
                    <span v-if="form.errors.email" class="text-rose-500">{{ form.errors.email }}</span>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Password
                        </label>

                        <Link href="/forgot-password" class="text-sm text-indigo-600 hover:text-indigo-700">
                            Forgot password?
                        </Link>
                    </div>

                    <input v-model="form.password" type="password" placeholder="Enter your password" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">

                    <span v-if="form.errors.password" class="text-rose-500">{{ form.errors.password }}</span>
                </div>

                <!-- Remember me -->
                <div class="flex items-center gap-2">
                    <input v-model="form.remember" type="checkbox" class="w-4 h-4 text-indigo-600 rounded">

                    <label class="text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <!-- Login Button -->
                <button :disabled="form.processing" type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700
                       text-white font-semibold py-3 rounded-lg
                       transition duration-200">
                    {{ form.processing ? 'Logging in...' : 'Login' }}
                </button>

            </form>

            <!-- Register -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Don't have an account?
                <Link href="/register" class="text-indigo-600 font-semibold hover:text-indigo-700">
                    Register
                </Link>
            </p>

        </div>
    </div>

</template>

<style scoped></style>