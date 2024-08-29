<?php

namespace App\Http\Controllers;

use App\Models\Dokumeniku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenikuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function iku()
    {
        $user = Auth::user();
        $iku1 = Dokumeniku::where('jenis_iku', 'iku1')->get();
        return view('IKU.index', [
            'title' => 'Dokumen IKU',
            'iku1' => $iku1
        ]);
    }


    public function store_iku1(Request $request)
    {

        // Validasi data yang dikirimkan dari form Create
        $request->validate([
            'nama_dokumen' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'link' => 'required',
        ],[
            'nama_dokumen.unique' => 'Nama dokumen harus diisi',
            'keterangan.unique' => 'Keterangan harus diisi',
            'link.unique' => 'Link harus diisi',
        ]);

         // Mendapatkan user yang sedang login
         $user = Auth::user();
       
         // Simpan data ke dalam database dengan mengaitkan id user yang login
        $data = new Dokumeniku([
            'nama_dokumen' => $request->input('nama_dokumen'),
            'keterangan' => $request->input('keterangan'),
            'jenis_iku' => 'iku1',
            'link' => $request->input('link'),
        
        ]);
        $data->user_id = $user->id; 
        $data->created_at = now()->format('Y-m-d');// Mengaitkan id user dengan data yang diupload
        $data->save();
        // Jika Anda ingin melakukan sesuatu setelah data disimpan, tambahkan logika di sini

        // Redirect ke halaman tertentu setelah data berhasil disimpan
        return back()->with('success', 'Dokumen IKU 1 berhasil disimpan.');
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
    public function show(Dokumeniku $dokumeniku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumeniku $dokumeniku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumeniku $dokumeniku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumeniku $dokumeniku)
    {
        //
    }
}
