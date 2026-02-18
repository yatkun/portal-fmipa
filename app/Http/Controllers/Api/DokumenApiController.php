<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Http\Resources\DokumenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = Dokumen::all();
        return response()->json([
            'status' => 'success',
            'data' => DokumenResource::collection($dokumen),
            'message' => 'Data dokumen retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file_path' => 'required|file'
        ]);

        $user = Auth::user();
        $filePath = $request->file('file_path')->store('dokumen');

        $dokumen = Dokumen::create([
            'user_id' => $user->id,
            'nama_dokumen' => $validated['nama_dokumen'],
            'file_path' => $filePath
        ]);

        return response()->json([
            'status' => 'success',
            'data' => new DokumenResource($dokumen),
            'message' => 'Dokumen created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dokumen not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new DokumenResource($dokumen),
            'message' => 'Dokumen retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dokumen not found'
            ], 404);
        }

        $validated = $request->validate([
            'nama_dokumen' => 'sometimes|string|max:255',
            'file_path' => 'sometimes|file'
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('dokumen');
            $validated['file_path'] = $filePath;
        }

        $dokumen->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new DokumenResource($dokumen),
            'message' => 'Dokumen updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);

        if (!$dokumen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dokumen not found'
            ], 404);
        }

        $dokumen->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Dokumen deleted successfully'
        ], 200);
    }

    /**
     * Get dokumen by user_id
     */
    public function getByUser($userId)
    {
        $dokumen = Dokumen::where('user_id', $userId)->get();
        return response()->json([
            'status' => 'success',
            'data' => DokumenResource::collection($dokumen),
            'message' => 'User dokumen retrieved successfully'
        ], 200);
    }
}
