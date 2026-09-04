<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue'

const otpForm = useForm({
    otp: '',
})

const resendForm = useForm({});

const submitOtp = () => {
    otpForm.post('/verify-email')
}

const resendOtp = () => {
    resendForm.post('/verify-email/resend')
}
</script>

<template>
    <Navbar />

    <div class="min-h-[calc(100vh-64px)] flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

            <!-- Heading -->
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-100">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 008.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>

                <!-- Success message -->
                <p v-if="$page.props.flash?.success" class="text-sm text-emerald-500 mt-2">
                    {{ $page.props.flash.success }}
                </p>

                <h2 class="text-3xl font-bold text-gray-800">
                    Verify Your Email
                </h2>

                <p class="text-gray-500 mt-3 leading-relaxed">
                    We've sent a verification code to your email <strong class="text-rose-500">{{
                        $page.props.auth.user.email }}</strong> address.
                    Please enter the code below to verify your account.
                </p>
            </div>

            <!-- OTP Form -->
            <form @submit.prevent="submitOtp" class="space-y-6">

                <!-- OTP Input -->
                <div>
                    <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">
                        Verification Code
                    </label>

                    <input v-model="otpForm.otp" id="otp" type="text" inputmode="numeric" maxlength="6"
                        placeholder="Enter 6-digit code"
                        class="w-full px-4 py-3 text-center text-xl tracking-[0.5em] font-semibold border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />

                    <!-- Error message -->
                    <p v-if="otpForm.errors.otp" class="text-sm text-rose-500 mt-2">
                        {{ otpForm.errors.otp }}
                    </p>
                </div>

                <!-- Verify Button -->
                <button :disabled="otpForm.processing" type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 disabled:bg-indigo-400 text-white font-semibold py-3 rounded-lg transition duration-200">
                    {{ otpForm.processing ? 'Verifying...' : 'Verify Email' }}
                </button>
            </form>

            <!-- Resend OTP -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    Didn't receive the code?
                </p>

                <button @click="resendOtp" type="button"
                    class="mt-2 text-sm text-indigo-600 font-semibold hover:text-indigo-700 disabled:text-gray-400">
                    {{ resendForm.processing ? 'Sending...' : 'Resend Code' }}
                </button>
            </div>

            <!-- Help Text -->
            <p class="text-xs text-gray-400 text-center mt-6">
                Please check your spam or junk folder if you don't see the email.
            </p>

        </div>
    </div>
</template>

<style scoped></style>