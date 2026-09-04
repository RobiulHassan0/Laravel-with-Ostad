<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verify Your Email</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            font-family: Arial, Helvetica, sans-serif;
            color: #374151;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .bg-gray-100 {
            background-color: #f3f4f6;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .w-full {
            width: 100%;
        }

        .max-w-md {
            max-width: 28rem;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .rounded-2xl {
            border-radius: 1rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .shadow-xl {
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .p-8 {
            padding: 2rem;
        }

        .text-center {
            text-align: center;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .mb-7 {
            margin-bottom: 1.75rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-5 {
            margin-top: 1.25rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-semibold {
            font-weight: 600;
        }

        .leading-6 {
            line-height: 1.5rem;
        }

        .text-gray-800 {
            color: #1f2937;
        }

        .text-gray-700 {
            color: #374151;
        }

        .text-gray-600 {
            color: #4b5563;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-gray-400 {
            color: #9ca3af;
        }

        .text-indigo-600 {
            color: #4f46e5;
        }

        .text-indigo-500 {
            color: #6366f1;
        }

        .bg-indigo-600 {
            background-color: #4f46e5;
        }

        .bg-indigo-50 {
            background-color: #eef2ff;
        }

        .bg-amber-50 {
            background-color: #fffbeb;
        }

        .bg-amber-100 {
            background-color: #fef3c7;
        }

        .text-amber-600 {
            color: #d97706;
        }

        .text-amber-700 {
            color: #b45309;
        }

        .border {
            border-width: 1px;
            border-style: solid;
        }

        .border-gray-100 {
            border-color: #f3f4f6;
        }

        .border-indigo-100 {
            border-color: #e0e7ff;
        }

        .border-amber-100 {
            border-color: #fef3c7;
        }

        .tracking-widest {
            letter-spacing: 0.1em;
        }

        .tracking-otp {
            letter-spacing: 0.45em;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .inline-flex {
            display: inline-flex;
        }

        .flex-shrink-0 {
            flex-shrink: 0;
        }

        .w-14 {
            width: 3.5rem;
        }

        .h-14 {
            height: 3.5rem;
        }

        .w-12 {
            width: 3rem;
        }

        .h-12 {
            height: 3rem;
        }

        .w-9 {
            width: 2.25rem;
        }

        .h-9 {
            height: 2.25rem;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .justify-start {
            justify-content: flex-start;
        }

        .p-4 {
            padding: 1rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-5 {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .pt-5 {
            padding-top: 1.25rem;
        }

        .border-t {
            border-top-width: 1px;
            border-top-style: solid;
        }

        .border-slate-100 {
            border-color: #f1f5f9;
        }

        .bg-slate-50 {
            background-color: #f8fafc;
        }

        .text-slate-800 {
            color: #1e293b;
        }

        .text-slate-700 {
            color: #334155;
        }

        .text-slate-600 {
            color: #475569;
        }

        .text-slate-500 {
            color: #64748b;
        }

        .text-slate-400 {
            color: #94a3b8;
        }

        .text-white {
            color: #ffffff;
        }

        .pl-otp {
            padding-left: 0.45em;
        }

        .logo {
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background-color: #4f46e5;
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
        }

        .main-card {
            border: 1px solid #f1f5f9;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        }

        .top-line {
            height: 5px;
            background-color: #4f46e5;
        }

        .verification-icon {
            margin: 0 auto;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eef2ff;
            color: #4f46e5;
            font-size: 20px;
            font-weight: 700;
        }

        .otp-box {
            background-color: #eef2ff;
            border: 1px solid #e0e7ff;
            border-radius: 12px;
            padding: 20px 24px;
            text-align: center;
        }

        .expiry-box {
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            margin-top: 20px;
            gap: 12px;
        }

        .expiry-icon {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background-color: #fef3c7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d97706;
        }

        .footer {
            background-color: #f8fafc;
            border-top: 1px solid #f1f5f9;
            padding: 20px 32px;
            text-align: center;
        }

        @media only screen and (max-width: 480px) {
            .p-8 {
                padding: 24px;
            }

            .text-3xl {
                font-size: 1.6rem;
            }

            .otp-code {
                font-size: 26px !important;
            }
        }
    </style>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-10">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-6">

                <!-- Logo Placeholder -->
                <div class="logo">
                    TA
                </div>

                <h1 class="mt-2 text-xl font-bold text-slate-800">
                    Task App
                </h1>

            </div>


            <!-- Main Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden main-card">

                <!-- Top Accent -->
                <div class="top-line"></div>


                <div class="p-8">

                    <!-- Heading -->
                    <div class="text-center mb-7">

                        <div class="verification-icon mb-4">
                            ✓
                        </div>

                        <h2 class="text-2xl font-bold text-gray-800">
                            Verify Your Email
                        </h2>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Please verify your email address to
                            complete your account setup.
                        </p>

                    </div>


                    <!-- Greeting -->
                    <div>

                        <p class="text-sm text-gray-600">
                            Hello
                            <span class="font-semibold text-gray-800">
                                {{ $userName }}
                            </span>
                        </p>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Your verification code is:
                        </p>

                    </div>


                    <!-- OTP -->
                    <div class="my-6">

                        <div class="otp-box">

                            <p class="
                                text-xs
                                font-semibold
                                uppercase
                                tracking-widest
                                text-indigo-500
                            ">
                                Verification Code
                            </p>

                            <div class="
                                otp-code
                                mt-2
                                text-3xl
                                font-bold
                                tracking-otp
                                pl-otp
                                text-indigo-600
                            ">
                                {{ $otp }}
                            </div>

                        </div>

                    </div>


                    <!-- Expiry Notice -->
                    <div class="expiry-box">

                        <div class="expiry-icon">
                            ⏱
                        </div>

                        <p class="text-sm leading-6 text-amber-700">
                            This verification code will expire in
                            <strong>
                                10 Minutes
                            </strong>.
                        </p>

                    </div>


                    <!-- Security Message -->
                    <div class="mt-6 text-center">

                        <p class="text-xs leading-6 text-gray-400">
                            If you did not create an account,
                            you can safely ignore this email.
                        </p>

                    </div>

                </div>


                <!-- Footer -->
                <div class="footer">

                    <p class="text-sm font-semibold text-slate-700">
                        — Task App
                    </p>

                    <p class="mt-2 text-xs text-slate-400">
                        Secure • Simple • Productive
                    </p>

                </div>

            </div>


            <!-- Bottom Text -->
            <p class="mt-5 text-center text-xs text-gray-400">
                This is an automated email. Please do not reply.
            </p>

        </div>

    </div>

</body>

</html>