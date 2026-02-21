<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\KelasApiController;
use App\Http\Controllers\Api\TugasApiController;
use App\Http\Controllers\Api\DokumenApiController;
use App\Http\Controllers\Api\DosenProfileApiController;
use App\Http\Controllers\Api\MahasiswaProfileApiController;
use App\Http\Controllers\Api\JawabanApiController;
use App\Http\Controllers\Api\LinkApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Authentication Routes
Route::post('/login', [AuthApiController::class, 'login']);

// Protected Routes (Require API Token)
Route::middleware('auth:sanctum')->group(function () {
    // Auth Routes
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/profile', [AuthApiController::class, 'profile']);

    // User Resources
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserApiController::class, 'index']);
        Route::post('/', [UserApiController::class, 'store']);
        Route::get('/dosen', [UserApiController::class, 'getDosen']);
        Route::get('/mahasiswa', [UserApiController::class, 'getMahasiswa']);
        Route::get('/{id}', [UserApiController::class, 'show']);
        Route::put('/{id}', [UserApiController::class, 'update']);
        Route::delete('/{id}', [UserApiController::class, 'destroy']);
    });

    // Kelas Resources
    Route::prefix('kelas')->group(function () {
        Route::get('/', [KelasApiController::class, 'index']);
        Route::post('/', [KelasApiController::class, 'store']);
        Route::get('/user/{userId}', [KelasApiController::class, 'getByUser']);
        Route::post('/{kelasId}/enroll', [KelasApiController::class, 'enrollMahasiswa']);
        Route::delete('/{kelasId}/mahasiswa/{mahasiswaId}', [KelasApiController::class, 'unenrollMahasiswa']);
        Route::get('/{kelasId}/mahasiswa', [KelasApiController::class, 'getMahasiswa']);
        Route::get('/{id}', [KelasApiController::class, 'show']);
        Route::put('/{id}', [KelasApiController::class, 'update']);
        Route::delete('/{id}', [KelasApiController::class, 'destroy']);
    });

    // Tugas Resources
    Route::prefix('tugas')->group(function () {
        Route::get('/', [TugasApiController::class, 'index']);
        Route::post('/', [TugasApiController::class, 'store']);
        Route::get('/{id}', [TugasApiController::class, 'show']);
        Route::put('/{id}', [TugasApiController::class, 'update']);
        Route::delete('/{id}', [TugasApiController::class, 'destroy']);
        Route::get('/kelas/{kelasId}', [TugasApiController::class, 'getByKelas']);
    });

    // Dokumen Resources
    Route::prefix('dokumen')->group(function () {
        Route::get('/', [DokumenApiController::class, 'index']);
        Route::post('/', [DokumenApiController::class, 'store']);
        Route::get('/{id}', [DokumenApiController::class, 'show']);
        Route::put('/{id}', [DokumenApiController::class, 'update']);
        Route::delete('/{id}', [DokumenApiController::class, 'destroy']);
        Route::get('/user/{userId}', [DokumenApiController::class, 'getByUser']);
    });

    // Dosen Profile Resources
    Route::prefix('dosen-profile')->group(function () {
        Route::get('/', [DosenProfileApiController::class, 'index']);
        Route::post('/', [DosenProfileApiController::class, 'store']);
        Route::get('/{id}', [DosenProfileApiController::class, 'show']);
        Route::put('/{id}', [DosenProfileApiController::class, 'update']);
        Route::delete('/{id}', [DosenProfileApiController::class, 'destroy']);
        Route::get('/user/{userId}', [DosenProfileApiController::class, 'getByUser']);
    });

    // Mahasiswa Profile Resources
    Route::prefix('mahasiswa-profile')->group(function () {
        Route::get('/', [MahasiswaProfileApiController::class, 'index']);
        Route::post('/', [MahasiswaProfileApiController::class, 'store']);
        Route::get('/{id}', [MahasiswaProfileApiController::class, 'show']);
        Route::put('/{id}', [MahasiswaProfileApiController::class, 'update']);
        Route::delete('/{id}', [MahasiswaProfileApiController::class, 'destroy']);
        Route::get('/user/{userId}', [MahasiswaProfileApiController::class, 'getByUser']);
    });

    // Jawaban Resources
    Route::prefix('jawaban')->group(function () {
        Route::get('/', [JawabanApiController::class, 'index']);
        Route::post('/', [JawabanApiController::class, 'store']);
        Route::get('/{id}', [JawabanApiController::class, 'show']);
        Route::put('/{id}', [JawabanApiController::class, 'update']);
        Route::delete('/{id}', [JawabanApiController::class, 'destroy']);
        Route::get('/tugas/{tugasId}', [JawabanApiController::class, 'getByTugas']);
        Route::get('/user/{userId}', [JawabanApiController::class, 'getByUser']);
    });

    // Link Resources
    Route::prefix('links')->group(function () {
        Route::get('/', [LinkApiController::class, 'index']);
        Route::post('/', [LinkApiController::class, 'store']);
        Route::get('/{id}', [LinkApiController::class, 'show']);
        Route::put('/{id}', [LinkApiController::class, 'update']);
        Route::delete('/{id}', [LinkApiController::class, 'destroy']);
    });
});