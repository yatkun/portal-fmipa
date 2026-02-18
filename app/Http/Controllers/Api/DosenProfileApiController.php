<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DosenProfile;
use App\Http\Resources\DosenProfileResource;
use Illuminate\Http\Request;

class DosenProfileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosenProfile = DosenProfile::all();
        return response()->json([
            'status' => 'success',
            'data' => DosenProfileResource::collection($dosenProfile),
            'message' => 'Data dosen profile retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_dosen' => 'required|string|max:255',
            'nomor_induk_pegawai' => 'required|string|max:255',
            'keahlian' => 'sometimes|string',
            'email_institusional' => 'sometimes|string|email'
        ]);

        $dosenProfile = DosenProfile::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => new DosenProfileResource($dosenProfile),
            'message' => 'Dosen profile created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosenProfile = DosenProfile::find($id);

        if (!$dosenProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen profile not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new DosenProfileResource($dosenProfile),
            'message' => 'Dosen profile retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosenProfile = DosenProfile::find($id);

        if (!$dosenProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen profile not found'
            ], 404);
        }

        $validated = $request->validate([
            'nama_dosen' => 'sometimes|string|max:255',
            'nomor_induk_pegawai' => 'sometimes|string|max:255',
            'keahlian' => 'sometimes|string',
            'email_institusional' => 'sometimes|string|email'
        ]);

        $dosenProfile->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new DosenProfileResource($dosenProfile),
            'message' => 'Dosen profile updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosenProfile = DosenProfile::find($id);

        if (!$dosenProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen profile not found'
            ], 404);
        }

        $dosenProfile->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Dosen profile deleted successfully'
        ], 200);
    }

    /**
     * Get dosen profile by user_id
     */
    public function getByUser($userId)
    {
        $dosenProfile = DosenProfile::where('user_id', $userId)->first();

        if (!$dosenProfile) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen profile not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new DosenProfileResource($dosenProfile),
            'message' => 'Dosen profile retrieved successfully'
        ], 200);
    }
}
