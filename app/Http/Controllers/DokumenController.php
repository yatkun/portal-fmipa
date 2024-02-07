<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $datapribadi = $user->dokumen;
        // $datapribadi = Dokumen::find($user->id)->get();
        // dd($datapribadi);
        return view('dokumen.pribadi.index',[
            'title' => 'Dokumen Pribadi',
            'items' => $datapribadi
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
        // Validasi data yang dikirimkan dari form Create
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required',
            
        ]);

         // Mendapatkan user yang sedang login
         $user = Auth::user();
       
         // Simpan data ke dalam database dengan mengaitkan id user yang login
        $data = new Dokumen([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        $data->user_id = $user->id; // Mengaitkan id user dengan data yang diupload
        $data->save();



        // Jika Anda ingin melakukan sesuatu setelah data disimpan, tambahkan logika di sini

        // Redirect ke halaman tertentu setelah data berhasil disimpan
        return back()->with('success', 'Dokumen berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form Edit
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required',
            
        ]);

        // Temukan data berdasarkan id
        $data = Dokumen::find($id);

        // Pastikan data ditemukan
        if ($data) {
            // Update data dengan data baru
            $data->title = $request->title;
            $data->link = $request->link;
          
            $data->save();

            // Jika Anda ingin melakukan sesuatu setelah data diupdate, tambahkan logika di sini

            // Redirect ke halaman tertentu setelah data berhasil diupdate
            return back()->with('success', 'Dokumen berhasil diupdate.');
        } else {
            // Jika data tidak ditemukan, berikan pesan error atau tindakan yang sesuai
            return back()->with('error', 'Dokumen tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $data = Dokumen::find($id);
        if ($data) {
            $data->delete();
            return back()->with('success', 'Dokumen berhasil dihapus.');
        } else {
            return back()->with('error', 'Dokumen tidak ditemukan.');
        }
    }
}
