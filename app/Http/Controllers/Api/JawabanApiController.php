<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tugasuser;
use App\Http\Resources\JawabanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jawaban = Tugasuser::all();
        return response()->json([
            'status' => 'success',
            'data' => JawabanResource::collection($jawaban),
            'message' => 'Data jawaban retrieved successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'jawaban' => 'sometimes|string',
            'file_jawaban' => 'sometimes|file'
        ]);

        $user = Auth::user();
        $filePath = null;

        if ($request->hasFile('file_jawaban')) {
            $filePath = $request->file('file_jawaban')->store('jawaban');
            $validated['file_jawaban'] = $filePath;
        }

        $jawaban = Tugasuser::create([
            'tugas_id' => $validated['tugas_id'],
            'user_id' => $user->id,
            'jawaban' => $validated['jawaban'] ?? null,
            'file_jawaban' => $filePath
        ]);

        return response()->json([
            'status' => 'success',
            'data' => new JawabanResource($jawaban),
            'message' => 'Jawaban submitted successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jawaban = Tugasuser::find($id);

        if (!$jawaban) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jawaban not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new JawabanResource($jawaban),
            'message' => 'Jawaban retrieved successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jawaban = Tugasuser::find($id);

        if (!$jawaban) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jawaban not found'
            ], 404);
        }

        $validated = $request->validate([
            'jawaban' => 'sometimes|string',
            'file_jawaban' => 'sometimes|file',
            'nilai' => 'sometimes|numeric'
        ]);

        if ($request->hasFile('file_jawaban')) {
            $filePath = $request->file('file_jawaban')->store('jawaban');
            $validated['file_jawaban'] = $filePath;
        }

        $jawaban->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new JawabanResource($jawaban),
            'message' => 'Jawaban updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jawaban = Tugasuser::find($id);

        if (!$jawaban) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jawaban not found'
            ], 404);
        }

        $jawaban->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Jawaban deleted successfully'
        ], 200);
    }

    /**
     * Get jawaban by tugas_id
     */
    public function getByTugas($tugasId)
    {
        $jawaban = Tugasuser::where('tugas_id', $tugasId)->get();
        return response()->json([
            'status' => 'success',
            'data' => JawabanResource::collection($jawaban),
            'message' => 'Tugas jawaban retrieved successfully'
        ], 200);
    }

    /**
     * Get jawaban by user_id
     */
    public function getByUser($userId)
    {
        $jawaban = Tugasuser::where('user_id', $userId)->get();
        return response()->json([
            'status' => 'success',
            'data' => JawabanResource::collection($jawaban),
            'message' => 'User jawaban retrieved successfully'
        ], 200);
    }
}
