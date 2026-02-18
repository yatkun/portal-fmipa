<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Http\Resources\KelasResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json([
            'status' => 'success',
            'data' => KelasResource::collection($kelas),
            'message' => 'Data kelas retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kelas' => 'required|string|max:255|unique:kelas',
            'nama_kelas' => 'required|string|max:255'
        ]);

        $user = Auth::user();

        $kelas = Kelas::create([
            'kode_kelas' => $validated['kode_kelas'],
            'nama_kelas' => $validated['nama_kelas'],
            'user_id' => $user->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => new KelasResource($kelas),
            'message' => 'Kelas created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new KelasResource($kelas),
            'message' => 'Kelas retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        $validated = $request->validate([
            'nama_kelas' => 'sometimes|string|max:255'
        ]);

        $kelas->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new KelasResource($kelas),
            'message' => 'Kelas updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas deleted successfully'
        ], 200);
    }

    /**
     * Get kelas by user_id
     */
    public function getByUser($userId)
    {
        $kelas = Kelas::where('user_id', $userId)->get();
        return response()->json([
            'status' => 'success',
            'data' => KelasResource::collection($kelas),
            'message' => 'User kelas retrieved successfully'
        ], 200);
    }
}
