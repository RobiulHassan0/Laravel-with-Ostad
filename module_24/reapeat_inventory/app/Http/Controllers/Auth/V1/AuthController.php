<?php

namespace App\Http\Controllers\Auth\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
            ]);

            $user = User::create([
                "name" => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully.',
                'user_data' => $user,
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
                "email" => "required|email|string",
                "password" => "required|min:5|string"
            ]);

            if (!Auth::attempt($validated)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials',
                ], 401);
            }

            $user = $request->user();
            $token = $user->createToken('api-token')->plainTextToken;

            $maxDevice = 3;
            $oldTokens = $user->tokens()->latest()->get();
            $oldTokens->skip($maxDevice)->each->delete();

            return response()->json([
                'success' => true,
                'message' => 'User logged in successfully',
                'user_data' => [
                    'user' => $user,
                    'token' => $token
                ],
            ], 200);
            
        }catch(ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong during registration',
                'error_debug' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request){
        try{
            $user = $request->user();
            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'Un authenticated',
                ], 401);
            }

            $user->currentAccessToken()->delete();

            return response()->json([
                'success' => false,
                'message' => 'User logged out successfully',
            ], 200);
        }catch(\Throwable $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong during logout',
            ], 500);
        }
    }

}
