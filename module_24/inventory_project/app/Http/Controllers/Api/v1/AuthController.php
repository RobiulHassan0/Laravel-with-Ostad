<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Throwable;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                "name" => "required|string|max:25",
                "email" => ["required", "email", "string", "max:50", "unique:users,email"],
                "password" => ["required", "string", "min:5", "confirmed"],
            ]);

            $user = User::create([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "password" => $validated["password"],
            ]);

            $token = $user->createToken("api-token")->plainTextToken;

            return response()->json([
                "success" => true,
                "message" => "User registerd successfully!",
                "data" => [
                    'user' => $user,
                    'token' => $token,
                ],
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong during registration',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                "email" => ["required", "email", "string"],
                "password" => ["required", "string"],
            ]);

            // if(!Auth::attempt($validated)){
            //     return response()->json([
            //         'success' => false,
            //         'message'=> 'Invalid credentials',
            //     ], 401);
            // }
            // $user = $request->user();  

            $user = User::where('email', $validated['email'])->first();
            if (!$user || !Hash::check($validated['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' =>  'Invalid email or password',
                ], 401);
            }

            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'User logged in successfully',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong during login',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request){
        try{
            $user = $request->user();

            if(!$user){
                return response()->json([
                    'success'=> false,
                    'message'=> 'User Unauthenticated'
                ], 401);
            }

            $user->currentAccessToken()->delete();

            return response()->json([
                'success'=> true,
                'message'=> 'User logged out successfully',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success'=> false,
                'message'=> 'Something went wrong during logout',
                'errors'=> $e->getMessage(),
            ], 500);
        }
    }
}
