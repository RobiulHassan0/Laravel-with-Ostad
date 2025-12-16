<?php

namespace App\Http\Controllers;

use App\Models\CustomModel;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function showLoginForm(){
        return view('custom_auth.login');
    }

    public function loginSubmit(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = CustomModel::where('email', $email)
                    ->where('password', $password)
                    ->where('is_active', true)
                    ->first();
        
        session([
            'custom_user_id' => $user->id,
        ]);

        if($user){
            return redirect()->route('custom.dashboard');
        }
    }

    public function logOut(Request $request){
        $request->session()->forget('custom_user_id');
        return redirect()->route('custom.login')->with('success', 'Logout Successfull');
    }
}
