<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'data' => UserResource::collection($users),
            'message' => 'Data users retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'level' => 'required|in:Dosen,Mahasiswa,Admin,Tendik'
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            'nidn' => $validated['nidn'],
            'password' => Hash::make($validated['password']),
            'level' => $validated['level']
        ]);

        return response()->json([
            'status' => 'success',
            'data' => new UserResource($user),
            'message' => 'User created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new UserResource($user),
            'message' => 'User retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'nidn' => 'sometimes|string|max:255|unique:users,nidn,' . $id,
            'level' => 'sometimes|in:Dosen,Mahasiswa,Admin,Tendik'
        ]);

        $user->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new UserResource($user),
            'message' => 'User updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully'
        ], 200);
    }

    /**
     * Get Dosen users
     */
    public function getDosen()
    {
        $users = User::where('level', 'Dosen')->get();
        return response()->json([
            'status' => 'success',
            'data' => UserResource::collection($users),
            'message' => 'Dosen data retrieved successfully'
        ], 200);
    }

    /**
     * Get Mahasiswa users
     */
    public function getMahasiswa()
    {
        $users = User::where('level', 'Mahasiswa')->where('is_active', 1)->get();
        return response()->json([
            'status' => 'success',
            'data' => UserResource::collection($users),
            'message' => 'Mahasiswa data retrieved successfully'
        ], 200);
    }
}
