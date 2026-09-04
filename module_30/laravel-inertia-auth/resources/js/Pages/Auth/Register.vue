<script setup>
import { Link, useForm } from '@inertiajs/vue3';


    const form = useForm(
        {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }
    );

    const submitRegister = () => {
        form.post('/register'); 
    }

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">
                    Create an Account
                </h2>

                <p class="text-gray-500 mt-2">
                    Create your account to get started
                </p>
            </div>

            <form @submit.prevent="submitRegister" class="space-y-5">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Name <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.name" type="text" placeholder="Enter your name" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">
                    <span v-if="form.errors.name" class="text-rose-500">{{ form.errors.name }}</span>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.email" type="email" placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">
                    
                    <span v-if="form.errors.email" class="text-rose-500">{{ form.errors.email }}</span>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.password" type="password" placeholder="Enter your password" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">

                    <span v-if="form.errors.password" class="text-rose-500">{{ form.errors.password }} </span>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password <span class="text-rose-500">*</span>
                    </label>

                    <input v-model="form.password_confirmation" type="password" placeholder="Confirm your password" class="w-full px-4 py-3 border border-gray-300 rounded-lg
                           outline-none focus:ring-2 focus:ring-indigo-500
                           focus:border-indigo-500">

                    <span v-if="form.errors.password_confirmation" class="text-rose-500">{{ form.errors.password_confirmation }} </span>
                </div>

                <!-- Register Button -->
                <button :disabled="form.processing" type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700
                       text-white font-semibold py-3 rounded-lg
                       transition duration-200">
                    {{ form.processing ? 'Creating account...' : 'Register' }}
                </button>

            </form>

            <!-- Login -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <Link href="/login" class="text-indigo-600 font-semibold hover:text-indigo-700">
                    Login
                </Link>
            </p>

        </div>
    </div>

</template>

<style scoped></style>