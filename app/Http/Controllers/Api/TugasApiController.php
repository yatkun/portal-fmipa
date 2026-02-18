<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Http\Resources\TugasResource;
use Illuminate\Http\Request;

class TugasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::all();
        return response()->json([
            'status' => 'success',
            'data' => TugasResource::collection($tugas),
            'message' => 'Data tugas retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'required|date|after:tgl_mulai'
        ]);

        $tugas = Tugas::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => new TugasResource($tugas),
            'message' => 'Tugas created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tugas not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new TugasResource($tugas),
            'message' => 'Tugas retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tugas not found'
            ], 404);
        }

        $validated = $request->validate([
            'judul' => 'sometimes|string|max:255',
            'deskripsi' => 'sometimes|string',
            'tgl_mulai' => 'sometimes|date',
            'tgl_akhir' => 'sometimes|date'
        ]);

        $tugas->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new TugasResource($tugas),
            'message' => 'Tugas updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tugas not found'
            ], 404);
        }

        $tugas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Tugas deleted successfully'
        ], 200);
    }

    /**
     * Get tugas by kelas_id
     */
    public function getByKelas($kelasId)
    {
        $tugas = Tugas::where('kelas_id', $kelasId)->get();
        return response()->json([
            'status' => 'success',
            'data' => TugasResource::collection($tugas),
            'message' => 'Kelas tugas retrieved successfully'
        ], 200);
    }
}
