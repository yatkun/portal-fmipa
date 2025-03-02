<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Kelasuser;
use App\Models\Tugasuser;
use App\Notifications\NilaiNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;

class JawabanController extends Controller
{
    public function store($kode_kelas, $id, Request $request)
    {

        $tgl_kirim = Carbon::now()->toDateTimeString();
        $user = Auth::user();

        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $kelas_user = Kelasuser::where('user_id', $user->id)
                                ->where('kelas_id',$kelas->id )->first();
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
                'tgl_kirim' => Carbon::now()->toDateTimeString()
            ]);
            $jawaban->update($data);
            
        } else {
            // Jika data belum ada, simpan data baru
            Tugasuser::create($data);
            
        }




        return redirect()->route('kelas.detail', ['kode_kelas' => $kode_kelas])->with('success', 'Jawaban berhasil dikirim.');
    }

    public function update(Request $request, $kode_kelas, $id, $tugas)
    {
        
        
        $tugas_id = Tugas::find($tugas);

        $user = Tugasuser::where('kelas_user_id', $id)
                ->where('tugas_id', $tugas_id->id)->first();
        // $kelas_user = Kelasuser::where('id', $user->id)->first();

        if ($user) {
            // Update data dengan data baru
            $user->nilai = $request->nilai;
            $user->tanggapan = $request->tanggapan;
          
            $user->save();
            
            $mahasiswa = Kelasuser::where('id', $user->kelas_user_id)->get()->pluck('user');
               
            Notification::send($mahasiswa, new NilaiNotification($user));
    
            return redirect()->route('e-learning.tugas.detail',['kode_kelas' => $kode_kelas, 'id'=>$user->tugas_id])->with('success', 'Nilai berhasil disimpan.');
        }

 
       
 
       
        
    }

    

}
