<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Deskripsikelas;
use Illuminate\Support\Facades\Auth;

class DeskripsikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kode_kelas)
    {
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();

        $user = Auth::user();
        $users = $user->kelas;

        $dosen = $user->dosenProfile;

        return view('elearning.dosen.edit', compact(['dosen','kelas']),[
            'title' => 'Edit Kelas',
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deskripsikelas $deskripsikelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deskripsikelas $deskripsikelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_kelas)
    {
  
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();

        $a = $kelas->deskripsi;



        
        // Validasi input dari form
        $request->validate([
            'nama_kelas' => 'required',
            'kode_kelas' => 'required',
            'deskripsi' => 'nullable',
        ]);


        if (!$a) {
            $a = new Deskripsikelas();
            $a->kelas_id = $kelas->id;
        }

        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->kode_kelas = $request->input('kode_kelas');
        
        $kelas->save();

        $a->deskripsi = $request->input('deskripsi');
       

        $a->save();

        return redirect()->route('e-learning.detail', ['kode_kelas' => $kelas->kode_kelas])->with('success', 'Deskripsi kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deskripsikelas $deskripsikelas)
    {
        //
    }
}
