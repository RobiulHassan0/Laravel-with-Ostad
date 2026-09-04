<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use App\Models\EmailOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        // Generate 6 digits random code 
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Save otp to database
        EmailOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // send the Email
        Mail::to($user->email)->send(
            new OtpVerificationMail($otp, $user->name)
        );

        return redirect()
            ->route('verification.notice')
            ->with('success', 'Account Created! Please check your email for the verification code.');
    }

    public function showLogin()
    {
        return Inertia::render('Auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        if (
            Auth::attempt(
                $request->only('email', 'password'),
                $request->boolean('remember')
            )
        ) {
            $request->session()->regenerate();

            return redirect()
                ->route('tasks.index')
                ->with('success', 'Login Successful');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Logout Successful');
    }
}
