<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Kelasuser;
use App\Models\Tugasuser;
use App\Models\Emahasiswa;
use Illuminate\Http\Request;
use App\Models\Deskripsikelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $users = $user->manykelas;
        $profil =  $user->mahasiswaProfile;
        //   dd($users);
        // Mengambil semua data user dari database

        return view('elearning.mahasiswa.index',compact(['profil']),[
            'title' => 'E-Learning FMIPA',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user()->id;
        // Validasi data yang dikirimkan dari form Create
        $request->validate([
            'kode_kelas' => 'required',

        ]);

        $inputKodeKelas = $request->input('kode_kelas');
        $existingKelas = Kelas::where('kode_kelas', $inputKodeKelas)->first();

        if (!$existingKelas) {
            return redirect()->back()->with('error', 'Kode kelas tidak ditemukan.');
        }

        $userHasKelas = KelasUser::where('user_id', $user)
            ->where('kelas_id', $existingKelas->id)
            ->exists();

        if ($userHasKelas) {
            return redirect()->back()->with('error', 'Anda sudah gabung pada kelas ini.');
        }

        // Tambahkan data ke tabel kelas_user
        $kelasUser = new KelasUser();
        $kelasUser->user_id = $user;
        $kelasUser->kelas_id = $existingKelas->id;
        $kelasUser->save();

        return redirect()->back()->with('success', 'Anda berhasil gabung pada kelas ' . $existingKelas->nama_kelas);
    }

    /**
     * Display the specified resource.
     */
    public function show(Emahasiswa $emahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emahasiswa $emahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emahasiswa $emahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emahasiswa $emahasiswa)
    {
        //
    }

    public function lihatkelas($kode_kelas)
    {
        $user = Auth::user();
        $profil =  $user->mahasiswaProfile;
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $deskripsi = Deskripsikelas::where('kelas_id', $kelas->id)->first();
        $tugas = Tugas::where('kelas_id', $kelas->id)->get();
        $kelasuser = Kelasuser::where('kelas_id', $kelas->id)
                                ->where('user_id', $user->id)->first();
        $kelas_id = Kelasuser::where('kelas_id', $kelas->id)->first();

        $jawaban = Tugasuser::where('kelas_user_id', $kelasuser->id)->get();

        $tugass = Tugas::where('kelas_id', $kelas->id)
            ->leftjoin('tugas_user', function ($join) use ($kelasuser) {
                $join->on('tugas.id', '=', 'tugas_user.tugas_id')
                    ->where('tugas_user.kelas_user_id', $kelasuser->id);
            })
            ->select('tugas.*', 'tugas_user.id as tugas_user_id', 'tugas_user.*', 'tugas.id as tugas_tugas_id')
            ->latest()->get();
     
            // dd($tugass);
        if (!$kelas) {
            return abort(404, 'Kelas not found.');
        }

        return view('elearning.mahasiswa.detailkelas', compact([
            'kelas',
            'tugass',
            'deskripsi',
            'jawaban',
            'profil'
            
        ]), [
            'title' => $kelas->nama_kelas
        ]);
    }


    public function detailtugas($kode_kelas, $id)
    {
        

        $user = Auth::user();
        $users = $user->kelas;
        $profil =  $user->mahasiswaProfile;
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $tugas = Tugas::find($id);
 
        $peserta = Kelasuser::where('kelas_id', $kelas->id)->get();
        $kelasuser = Kelasuser::where('kelas_id', $kelas->id)
                                ->where('user_id', $user->id)->first();
        $jawaban = Tugasuser::where('kelas_user_id', $kelasuser->id)
            ->where('tugas_id', $tugas->id)->first();


        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();

        return view('elearning.mahasiswa.detailtugas', compact(['kelas','profil', 'tugas', 'peserta', 'jawaban']), [
            'title' => 'Detail Tugas ' . $kode_kelas,
            'users' => $users,
            'kode_kelas' => $kode_kelas
        ]);
    }
}
