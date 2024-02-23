<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kelasuser;
use App\Models\Tugasuser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanController extends Controller
{
    public function store($kode_kelas, $id, Request $request)
    {

        $tgl_kirim = Carbon::now()->toDateTimeString();
        $user = Auth::user();
        $kelas_user = Kelasuser::where('user_id', $user->id)->first();
        $tugas = Tugas::find($id);


        $request->validate([
            'deskripsi' => 'nullable',
            'link' => 'required',
        ]);

        $data = ([
            'kelas_user_id' => $kelas_user->id,
            'tugas_id' => $id,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'tgl_kirim' => $tgl_kirim,
            'nilai' => 'belum dinilai',
        ]);

        $jawaban = Tugasuser::where('kelas_user_id', $kelas_user->id)
            ->where('tugas_id', $tugas->id)->first();

        if ($jawaban) {
            // Jika data sudah ada, perbarui data yang ada
            $data = ([
                'kelas_user_id' => $kelas_user->id,
                'tugas_id' => $id,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link,
                'nilai' => 'belum dinilai',
                'tgl_kirim' => Carbon::now()->toDateTimeString()
            ]);
            $jawaban->update($data);
            
        } else {
            // Jika data belum ada, simpan data baru
            Tugasuser::create($data);
            
        }




        return redirect()->route('kelas.detail', ['kode_kelas' => $kode_kelas])->with('success', 'Jawaban berhasil dikirim.');
    }

    public function update(Request $request, $kode_kelas, $id)
    {
       
        $user = Tugasuser::where('kelas_user_id', $id)->first();

        $user->update($request->all());

        return redirect()->route('e-learning.tugas.detail',['kode_kelas' => $kode_kelas, 'id'=>$id])->with('success', 'Nilai berhasil disimpan.');
        
    }

    

}
