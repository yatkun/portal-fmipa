<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DokumensController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeskripsikelasController;
use App\Http\Controllers\DosenProfileController;
use App\Http\Controllers\EdosenController;
use App\Http\Controllers\EmahasiswaController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaProfileController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\ChangePasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'checkRole:Dosen,Mahasiswa,Admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/ganti-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/ganti-password', [ChangePasswordController::class, 'changePassword'])->name('change.password.post');

    // Dokumen-pribadi

});


Route::middleware(['auth', 'checkRole:Dosen,Admin'])->group(function () {
    // Dokumen-pribadi
    Route::get('/dokumen/pribadi', [DokumenController::class, 'index']);
    Route::post('/dokumen/pribadi/store', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::put('/dokumen/pribadi/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/pribadi/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

  

});


Route::middleware(['auth', 'checkRole:Mahasiswa'])->group(function () {
    Route::get('/e-learning', [EmahasiswaController::class, 'index'])->name('elearning.mahasiswa.index');
    Route::post('/e-learning/gabung', [EmahasiswaController::class, 'store'])->name('emahasiswa.store');

    Route::get('/e-learning/mahasiswa/kelas/{kode_kelas}', [EmahasiswaController::class, 'lihatkelas'])->name('kelas.detail');
    Route::get('/e-learning/mahasiswa/kelas/{kode_kelas}/tugas/{id}', [EmahasiswaController::class, 'detailtugas'])->name('kelas.tugas.detail');


    Route::post('/e-learning/mahasiswa/kelas/{kode_kelas}/tugas/{id}/store', [JawabanController::class, 'store'])->name('jawaban.store');


});




Route::middleware('guest')->group(function () {
    // Rute untuk registrasi
    Route::get('/daftar', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/daftar', [RegisterController::class, 'register'])->name('register');

    // Rute untuk login
    Route::get('/masuk', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/masuk', [LoginController::class, 'login'])->name('login');
});

Route::post('/keluar', [LoginController::class, 'logout'])->name('logout');







Route::middleware('auth', 'checkRole:Admin')->group(function () {

    //  Akun Dosen
    Route::get('/pengguna/dosen', [UserController::class, 'index'])->name('pengguna.dosen.index');
    Route::post('/pengguna/dosen/daftar', [UserController::class, 'register'])->name('dosen.store');
    Route::put('/pengguna/dosen/{id}', [UserController::class, 'update_dosen'])->name('dosen.update');
    Route::delete('/pengguna/dosen/{id}', [UserController::class, 'destroy_dosen'])->name('dosen.destroy');

    // Akun Mahasiswa
    Route::get('/pengguna/mahasiswa', [UserController::class, 'mahasiswa_index'])->name('pengguna.mahasiswa.index');
    Route::post('/pengguna/mahasiswa/daftar', [UserController::class, 'mahasiswa_register'])->name('mahasiswa.store');
    Route::put('/pengguna/mahasiswa/{id}', [UserController::class, 'update_mahasiswa'])->name('mahasiswa.update');
    Route::delete('/pengguna/mahasiswa/{id}', [UserController::class, 'destroy_mahasiswa'])->name('mahasiswa.destroy');
});



Route::middleware('auth', 'checkRole:Dosen')->group(function () {
    Route::get('/e-learning/kelas', [KelasController::class, 'index'])->name('elearning.dosen.index');
    Route::post('/e-learning/kelas/simpan', [KelasController::class, 'store'])->name('e-learning.store');
    Route::get('/e-learning/kelas/{kode_kelas}', [KelasController::class, 'show'])->name('e-learning.detail');
    Route::get('/e-learning/kelas/{kode_kelas}/edit', [DeskripsikelasController::class, 'index'])->name('e-learning.edit');
    Route::put('/e-learning/kelas/{kode_kelas}/update', [DeskripsikelasController::class, 'update'])->name('e-learning.update');
    Route::get('/e-learning/kelas/{kode_kelas}/tugas/tambah', [KelasController::class, 'buattugas'])->name('e-learning.tugas.buat');
    Route::get('/e-learning/kelas/{kode_kelas}/tugas/{id}', [TugasController::class, 'detailtugas'])->name('e-learning.tugas.detail');
    Route::get('/e-learning/kelas/{kode_kelas}/tugas/{id}/edit', [TugasController::class, 'edit'])->name('e-learning.tugas.edit');
    Route::put('/e-learning/kelas/{kode_kelas}/tugas/{id}/update', [TugasController::class, 'update'])->name('e-learning.tugas.update');
    Route::post('/e-learning/kelas/{kode_kelas}/tugas/store', [TugasController::class, 'store'])->name('tugas.store');
    Route::delete('/e-learning/kelas/{kode_kelas}/tugas/{id}/delete', [TugasController::class, 'delete'])->name('tugas.delete');

    Route::get('/e-learning/kelas/{kode_kelas}/tugas/{id}/{user_id}', [TugasController::class, 'detailjawaban'])->name('e-learning.jawaban.detail');


    Route::get('/dosen-profil', [DosenProfileController::class, 'index'])->name('lihat.profil');
    Route::get('/dosen-profil/edit', [DosenProfileController::class, 'edit'])->name('edit.profil');
    Route::put('/dosen-profil/update', [DosenProfileController::class, 'update'])->name('update.profil');
    Route::post('/update-profile-image-dosen', [DosenProfileController::class, 'updateProfileImage'])->name('foto.profile');

    Route::put('/e-learning/kelas/{kode_kelas}/tugas/{id}/{tugas}/update-nilai', [JawabanController::class, 'update'])->name('nilai.update');
});

Route::middleware('auth', 'checkRole:Mahasiswa')->group(function () {
   
    Route::get('/mahasiswa-profil', [MahasiswaProfileController::class, 'index'])->name('lihat.profil.mahasiswa');
    Route::get('/mahasiswa-profil/edit', [MahasiswaProfileController::class, 'edit'])->name('edit.profil.mahasiswa');
    Route::put('/mahasiswa-profil/update', [MahasiswaProfileController::class, 'update'])->name('update.profil.mahasiswa');
    Route::post('/update-profile-image', [MahasiswaProfileController::class, 'updateProfileImage'])->name('foto.profile.mahasiswa');

});