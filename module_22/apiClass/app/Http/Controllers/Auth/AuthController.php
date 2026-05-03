<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token_type' => 'Bearer',
            'access_token' => $token,
            'user' => $user,
        ], 202);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credential are incorrect.'],
            ]);
        }

        // delete old token
        // $user->tokens()->delete();

        $maxDevices = 3;
        $activeTokensCount = $user->tokens()->count();

        // if($activeTokensCount > $maxDevices){
        //     return response()->json([
        //         'message'=> 'Maximum device limit reached. Plase logout from another device to login',
        //     ], 403);
        // }

        if($activeTokensCount >= $maxDevices){
            // delete oldest token
            $oldestToken = $user->tokens()->oldest()->first();
            
            if($oldestToken){
                $oldestToken->delete();
            }
        }

        // generate new token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=> 'User Logged in successfully',
            'token_type'=> 'Bearer',
            'access_token' => $token,
            'user'=> $user, 
        ]);
    }

    public function profile(Request $request){
        return response()->json([
            'message'=> 'User retrived successfully.',
            'user'=> $request->user(),
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'User log out successfully. '
        ]);
    }

}
