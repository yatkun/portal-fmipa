<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaProfile;
use App\Http\Resources\MahasiswaProfileResource;
use Illuminate\Http\Request;

class MahasiswaProfileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaProfile = MahasiswaProfile::all();
        return response()->json([
            'status' => 'success',
            'data' => MahasiswaProfileResource::collection($mahasiswaProfile),
            'message' => 'Data mahasiswa profile retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nim' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'semester' => 'required|integer'
        ]);

        $mahasiswaProfile = MahasiswaProfile::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => new MahasiswaProfileResource($mahasiswaProfile),
            'message' => 'Mahasiswa profile created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswaProfile = MahasiswaProfile::find($id);

        if (!$mahasiswaProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mahasiswa profile not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new MahasiswaProfileResource($mahasiswaProfile),
            'message' => 'Mahasiswa profile retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mahasiswaProfile = MahasiswaProfile::find($id);

        if (!$mahasiswaProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mahasiswa profile not found'
            ], 404);
        }

        $validated = $request->validate([
            'nim' => 'sometimes|string|max:255',
            'nama_mahasiswa' => 'sometimes|string|max:255',
            'semester' => 'sometimes|integer'
        ]);

        $mahasiswaProfile->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new MahasiswaProfileResource($mahasiswaProfile),
            'message' => 'Mahasiswa profile updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswaProfile = MahasiswaProfile::find($id);

        if (!$mahasiswaProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mahasiswa profile not found'
            ], 404);
        }

        $mahasiswaProfile->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Mahasiswa profile deleted successfully'
        ], 200);
    }

    /**
     * Get mahasiswa profile by user_id
     */
    public function getByUser($userId)
    {
        $mahasiswaProfile = MahasiswaProfile::where('user_id', $userId)->first();

        if (!$mahasiswaProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mahasiswa profile not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new MahasiswaProfileResource($mahasiswaProfile),
            'message' => 'Mahasiswa profile retrieved successfully'
        ], 200);
    }
}
