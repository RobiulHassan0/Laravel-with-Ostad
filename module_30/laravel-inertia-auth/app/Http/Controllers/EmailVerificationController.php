<?php

namespace App\Http\Controllers;

use App\Mail\OtpVerificationMail;
use App\Models\EmailOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    public function showOtpForm()
    {
        return Inertia::render('Auth/VerifyEmail');
    }

    public function sendOtp(Request $request)
    {
        $user = $request->user();

        // if already verified 
        if ($user->email_verified_at) {
            return redirect()->route('tasks.index');
        }

        // delete any old otp for this user
        EmailOtp::where('user_id', $user->id)->delete();

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

        return back()->with('success', 'Verification code sent to your email.');
    }

    public function verifyOtp(Request $request)
    {
        $userGivenOtp = $request->validate([
            'otp' => 'required|string|size:6'
        ]);

        $user = $request->user();

        // find the latest otp for that user
        $otpRecord = EmailOtp::where('user_id', $user->id)->latest()->first();

        // check if otp existing
        if (!$otpRecord) {
            return back()->withErrors(['otp' => "Oops! 😅This verification code wasn't sent to you. Please enter the correct code."]);
        }

        // check otp expiration
        if ($otpRecord->isExpired()) {
            $otpRecord->delete();
            return back()->withErrors(
                [
                    'otp' => "your verification code has expired. please press 'resend code' button."
                ]
            );
        }

        // check if otp dose not match
        if ($otpRecord->otp !== $userGivenOtp['otp']) {
            return back()->withErrors([
                'otp' => 'The verification code is not correct. plz try again.'
            ]);
        }

        //  Mark as verified
        $user->email_verified_at = now(); 
        $user->save();

        //  clean up verified otp from Otp reocords.
        $otpRecord->delete(); 

        return redirect()->route('tasks.index')->with('success', 'Your account has been verified!');

        // if($otpRecord->otp === $userGivenOtp['otp']){
        //     //  Mark as verified
        //     $user->email_verified_at = now(); 
        //     $user->save();

        //     //  clean up verified otp from Otp reocords.
        //     $otpRecord->delete(); 

        //     return redirect()->route('tasks.index')->with('success', 'Your account has been verified!');            
        // }else{
        //   return back()->withErrors([
        //         'otp' => 'The verification code is not correct. plz try again.'
        //     ]);
        // }
    }
}
