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
     * Handles both dosen (created kelas) and mahasiswa (enrolled kelas)
     */
    public function getByUser($userId)
    {
        $user = \App\Models\User::find($userId);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // Check user level - use level field instead of profile existence
        if ($user->level === 'Mahasiswa') {
            // Get kelas dari kelas_user (pivot table) - enrolled classes for mahasiswa
            $kelas = $user->manykelas;
        } else {
            // Get kelas dari kelas (kelas.user_id) - created classes (for dosen and others)
            $kelas = $user->kelas;
        }

        return response()->json([
            'status' => 'success',
            'data' => KelasResource::collection($kelas),
            'message' => 'User kelas retrieved successfully'
        ], 200);
    }

    /**
     * Enroll mahasiswa to a kelas
     */
    public function enrollMahasiswa(Request $request, $kelasId)
    {
        $kelas = Kelas::find($kelasId);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        $validated = $request->validate([
            'mahasiswa_ids' => 'required|array',
            'mahasiswa_ids.*' => 'required|exists:users,id'
        ]);

        try {
            $successCount = 0;
            $errorMessages = [];

            foreach ($validated['mahasiswa_ids'] as $mahasiswaId) {
                $user = \App\Models\User::find($mahasiswaId);

                if ($user->level !== 'Mahasiswa') {
                    $errorMessages[] = "User ID {$mahasiswaId} is not a mahasiswa";
                    continue;
                }

                // Check if already enrolled
                if ($kelas->users()->where('user_id', $mahasiswaId)->exists()) {
                    $errorMessages[] = "User ID {$mahasiswaId} is already enrolled";
                    continue;
                }

                $kelas->users()->attach($mahasiswaId);
                $successCount++;
            }

            return response()->json([
                'status' => 'success',
                'data' => [
                    'enrolled_count' => $successCount,
                    'errors' => $errorMessages
                ],
                'message' => "{$successCount} mahasiswa enrolled successfully"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to enroll mahasiswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove mahasiswa from kelas
     */
    public function unenrollMahasiswa($kelasId, $mahasiswaId)
    {
        $kelas = Kelas::find($kelasId);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        $user = \App\Models\User::find($mahasiswaId);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mahasiswa not found'
            ], 404);
        }

        try {
            $kelas->users()->detach($mahasiswaId);

            return response()->json([
                'status' => 'success',
                'message' => 'Mahasiswa removed from kelas successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to remove mahasiswa from kelas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all mahasiswa in a kelas
     */
    public function getMahasiswa($kelasId)
    {
        $kelas = Kelas::find($kelasId);

        if (!$kelas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kelas not found'
            ], 404);
        }

        $mahasiswa = $kelas->users()
            ->where('level', 'Mahasiswa')
            ->select('id', 'nama', 'nidn', 'level')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswa,
            'total' => $mahasiswa->count(),
            'message' => 'Mahasiswa in kelas retrieved successfully'
        ], 200);
    }
}
