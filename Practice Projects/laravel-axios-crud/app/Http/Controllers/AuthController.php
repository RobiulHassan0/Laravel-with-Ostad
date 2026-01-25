<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            "name" => "required|string|max:20",
            "email" => "required|string|max:50|email|unique:users",
            "password" => "required|string|max:4",
        ]);

        $user = User::create([
            "name"=> $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json([
            "message" => "user registerd successfully",
            "token_type" => "Bearer",
            "token"=> $token,
            "user" => $user
        ], 201);
    }
        

    public function login(Request $request){
        $data = $request->validate([
            "email" => "required|string|email",
            "password"=> "required|string|max:4",
        ]);

        $user = User::where("email", $data["email"])->first();
        if(!$user || !Hash::check($data['password'], $user->password)){
            throw ValidationException::withMessages(['email' => ['the provided credentials are incorrect'],]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'User logged in successfully',
            'token_type' => 'Bearer',
            'access_token' => $token,
            'user' => $user,
        ]);
    }

    public function profile(Request $request){
        return [
            "message" => "User Got Success!",
            "user"=> $request->user(),
        ];
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message"=> "user logout successfully"],0);
    }
}
