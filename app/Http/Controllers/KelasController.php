<?php

namespace App\Http\Controllers;

use App\Models\Deskripsikelas;
use App\Models\Kelas;
use App\Models\Kelasuser;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $users = $user->kelas;

        if($user->level == 'Dosen'){
            $profil =  $user->dosenProfile;
        }else if($user->level == 'Mahasiswa'){
            $profil =  $user->mahasiswaProfile;
        }
        $dosen = $user->dosenProfile;

        return view('elearning.dosen.index', compact(['dosen','profil']),[
            'title' => 'E-Learning FMIPA',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function buattugas($kode_kelas)
    {
        $user = Auth::user();
        $users = $user->kelas;

        return view('elearning.dosen.buattugas',[
            'title' => 'Tambah Tugas '.$kode_kelas,
            'users' => $users,
            'kode_kelas' => $kode_kelas
        ]);
    }


    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form Create
        $request->validate([
            'kode_kelas' => 'required|max:255|unique:kelas',
            'nama_kelas' => 'required',
        ],[
            'kode_kelas.unique' => 'Kode kelas telah digunakan, silahkan gunakan kode kelas yang lain !'
        ]);

         // Mendapatkan user yang sedang login
         $user = Auth::user();
       
         // Simpan data ke dalam database dengan mengaitkan id user yang login
        $data = new Kelas([
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
        ]);
        $data->user_id = $user->id; // Mengaitkan id user dengan data yang diupload
        $data->save();



        // Jika Anda ingin melakukan sesuatu setelah data disimpan, tambahkan logika di sini

        // Redirect ke halaman tertentu setelah data berhasil disimpan
        return back()->with('success', 'Kelas berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($kode_kelas)
    {

        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $tugas = Tugas::where('kelas_id', $kelas->id)->latest()->get();
        $user = Kelasuser::where('kelas_id', $kelas->id)->get();
        $deskripsi = Deskripsikelas::where('kelas_id', $kelas->id)->first();
        
      
        
        if (!$kelas) {
            return abort(404, 'Kelas not found.');
        }

        $user2 = Auth::user();
        if($user2->level == 'Dosen'){
            $profil =  $user2->dosenProfile;
        }else if($user2->level == 'Mahasiswa'){
            $profil =  $user2->mahasiswaProfile;
        }
     
        return view('elearning.dosen.detail', compact([
            'kelas',
            'tugas',
            'deskripsi',
            'user',
            'profil'
        ]),[
            'title' => $kelas->nama_kelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }

    
}
