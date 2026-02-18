<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    /**
     * Login user and generate API token
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('nidn', $validated['nidn'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'ID Pengguna atau Kata Sandi salah'
            ], 401);
        }

        // Check if user account is active
        if (!$user->is_active) {
            return response()->json([
                'status' => 'error',
                'message' => 'Akun anda dalam tahap review. Silahkan hubungi admin !'
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'nidn' => $user->nidn,
                    'level' => $user->level
                ],
                'token' => $token
            ],
            'message' => 'Login successful'
        ], 200);
    }

    /**
     * Logout user and revoke token
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful'
        ], 200);
    }

    /**
     * Get current authenticated user
     */
    public function profile(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'data' => $request->user(),
            'message' => 'Profile retrieved successfully'
        ], 200);
    }
}
