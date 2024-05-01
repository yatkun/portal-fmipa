<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Kelasuser;
use App\Models\Tugasuser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Notifications\TugasNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Notifications\Events\NotificationSending;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($kode_kelas, Request $request )
    {

        $tgl_mulai = Carbon::createFromFormat('d/m/Y', $request->input('tglmulai'));
        $tgl_akhir = Carbon::createFromFormat('d/m/Y', $request->input('tglakhir'));
        // Validasi data yang dikirimkan dari form Create
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tglmulai' => 'required|date_format:d/m/Y',
            'tglakhir' => 'required|date_format:d/m/Y'
            
        ]);

         // Mendapatkan user yang sedang login
        $user = Auth::user();
        $kelas= Kelas::where('kode_kelas', $kode_kelas)->first();

     
         // Simpan data ke dalam database dengan mengaitkan id user yang login
        $data = new Tugas([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tglmulai' => $tgl_mulai->toDateString(),
            'tglakhir' => $tgl_akhir->toDateString(),
            'link' => $request->link,
            'kelas_id' => $kelas->id,
        ]);
        $data->save();

        $mahasiswa = Kelasuser::where('kelas_id', $kelas->id)->get()->pluck('user');

        Notification::send($mahasiswa, new TugasNotification($data));
        
      
        // Jika Anda ingin melakukan sesuatu setelah data disimpan, tambahkan logika di sini

        // Redirect ke halaman tertentu setelah data berhasil disimpan
        return redirect()->route('e-learning.detail', ['kode_kelas' => $kode_kelas])->with('success', 'Tugas berhasil ditambahkan');
    }

    public function detailtugas($kode_kelas, $id)
    {

        $user = Auth::user();
        $users = $user->kelas;
        $profil =  $user->dosenProfile;
        
        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $tugas = Tugas::find($id);

        $peserta = Kelasuser::where('kelas_id', $kelas->id)->get();
        $jawaban = Tugasuser::where('tugas_id', $tugas->id)->get();

        
      
        return view('elearning.dosen.tugas.detail',compact(['kelas','tugas','peserta','jawaban','profil']),[
            'title' => 'Detail Tugas '.$kode_kelas,
            'users' => $users,
            'kode_kelas' => $kode_kelas
        ]);
    }
    

    public function detailjawaban($kode_kelas, $id, $user_id)
    {

        $user = Auth::user();
        $users = $user->kelas;

        $kelas = Kelas::where('kode_kelas', $kode_kelas)->first();
        $tugas = Tugas::find($id);

        $peserta = Kelasuser::where('kelas_id', $kelas->id)->get();
        $jawaban = Tugasuser::where('tugas_id', $tugas->id)->get();
   
        $mahasiswa = Kelasuser::where('user_id', $user_id)->first();
   
        if (!$mahasiswa) {
            abort(404);
        }
      
        return view('elearning.dosen.tugas.jawaban.index',compact(['kelas','tugas','peserta','jawaban','mahasiswa']),[
            'title' => 'Detail Tugas '.$kode_kelas,
            'users' => $users,
            'kode_kelas' => $kode_kelas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode_kelas, $id)
    {
        $tugas = Tugas::findOrFail($id);
        
        // dd($tugas);
        $user = Auth::user();
        $users = $user->kelas;
       
        $dosen = $user->dosenProfile;

        return view('elearning.dosen.tugas.edit', compact(['dosen','tugas']),[
            'title' => 'Edit Tugas',
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_kelas, $id)
    {
      
        

        $tgl_mulai = Carbon::createFromFormat('d/m/Y', $request->input('tglmulai'));
        
        $tgl_akhir = Carbon::createFromFormat('d/m/Y', $request->input('tglakhir'));
        // dd($tgl_akhir);
        // Validasi data yang dikirimkan dari form Create
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tglmulai' => 'required',
            'tglakhir' => 'required',
            'link' => 'nullable'
        ]);

        $validatedData['tglmulai'] = $tgl_mulai->toDateString();
        $validatedData['tglakhir'] = $tgl_akhir->toDateString();
        


        $post = Tugas::find($id);
        
        $post->update($validatedData);

        return redirect()->route('e-learning.tugas.detail', ['kode_kelas' => $kode_kelas, 'id' => $id])->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $kode_kelas, $id)
    {

        $data = Tugas::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('e-learning.detail', ['kode_kelas' => $kode_kelas])->with('success', 'Tugas berhasil dihapus.');
        } else {
            return back()->with('error', 'Tugas tidak ditemukan.');
        }
    }
}
