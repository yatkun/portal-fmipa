<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DosenProfile;
use Illuminate\Http\Request;
use App\Models\MahasiswaProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswaProfile;
        $profil =  $user->mahasiswaProfile;

        return view('profile.mahasiswa.index', compact(['user', 'mahasiswa', 'profil']), [
            'title' => 'Profil'
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswaProfile;
        return view(
            'profile.mahasiswa.edit',
            compact('mahasiswa'),
            [
                'title' => 'Edit Profil'
            ]
        );
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $userr = User::find($user->id);
        $mahasiswaProfile = $user->mahasiswaProfile;

        // Validasi input dari form
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            'alamat' => 'nullable',
            'email' => 'email|nullable',
            'nohp' => 'nullable',
            'angkatan' => 'nullable',
            'semester' => 'nullable',
            'prodi' => 'nullable',
            'kelas' => 'nullable',
        ]);


        if (!$mahasiswaProfile) {
            $mahasiswaProfile = new MahasiswaProfile();
            $mahasiswaProfile->user_id = $user->id;
        }

        // Update informasi profil dosen
        // Update informasi profil dosen

        // Simpan perubahan pada model User
        $userr->update([
            'nama' => $request->input('nama'),
            'nidn' => $request->input('nidn')
        ]);

        $mahasiswaProfile->prodi = $request->input('prodi');
        $mahasiswaProfile->angkatan = $request->input('angkatan');
        $mahasiswaProfile->semester = $request->input('semester');
        $mahasiswaProfile->kelas = $request->input('kelas');
        $mahasiswaProfile->alamat = $request->input('alamat');
        $mahasiswaProfile->email = $request->input('email');
        $mahasiswaProfile->nohp = $request->input('nohp');


        $mahasiswaProfile->save();

        return redirect()->route('lihat.profil.mahasiswa')->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function updateProfileImage(Request $request)
    {

        $user = auth()->user();

        $mahasiswaProfile = $user->mahasiswaProfile;

        // Validasi dan simpan gambar profil
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:1024', // Sesuaikan dengan kebutuhan Anda
        ]);
  
        if (!$mahasiswaProfile) {
            $mahasiswaProfile = new MahasiswaProfile();
            $mahasiswaProfile->user_id = $user->id;
        }

        if ($request->hasFile('foto')) {
            // Hapus gambar profil lama (kecuali jika itu gambar default)
            if ($mahasiswaProfile->foto !== 'avatar.png') {
                Storage::delete('public/profile_image/' . $mahasiswaProfile->foto);
            }

            // Simpan gambar profil baru
            $imagePath = $request->file('foto')->store('public/profile_image');
            $mahasiswaProfile->foto = basename($imagePath);
            $mahasiswaProfile->save();
        }
      

        return redirect()->back()->with('success', 'Gambar profil Anda berhasil diperbarui.');
    }
}
