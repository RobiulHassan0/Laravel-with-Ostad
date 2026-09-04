<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PasswordResetController extends Controller
{
    // Show the 'Enter your Email' form
    public function showForgotForm(){
        return Inertia::render('Auth/ForgotPasswordForm');
    }

    // Send reset link with shown form
    public function sendResetLink(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the link sent successfully
        if($status === Password::RESET_LINK_SENT){
            return back()->with('success', 'Password reset link has been sent to your email!');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    // 
    public function showResetForm(Request $request, string $token){
        return Inertia::render('Auth/ResetPasswordForm', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function resetPassword(Request $request){
        $validated = $request->validate(
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:4|confirmed'
            ]
        );

        $status = Password::reset( $validated, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60)
            ])->save();
        });

        if($status === Password::PASSWORD_RESET){
            return redirect()->route('login')->with('success', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
