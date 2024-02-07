<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DosenProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DosenProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $dosen = $user->dosenProfile;
        if($user->level == 'Dosen'){
            $profil =  $user->dosenProfile;
        }else if($user->level == 'Mahasiswa'){
            $profil =  $user->mahasiswaProfile;
        }

        return view('profile.dosen.index', compact(['user', 'dosen','profil']), [
            'title' => 'Profil'
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $dosen = $user->dosenProfile;
        return view(
            'profile.dosen.edit',
            compact('dosen'),
            [
                'title' => 'Edit Profil'
            ]
        );
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $userr = User::find($user->id);
        $dosenProfile = $user->dosenProfile;

        // Validasi input dari form
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'email' => 'email|nullable',
            'nohp' => 'nullable',
            'google_scholar' => 'nullable',
        ]);


        if (!$dosenProfile) {
            $dosenProfile = new DosenProfile();
            $dosenProfile->user_id = $user->id;
        }

        // Update informasi profil dosen
        // Update informasi profil dosen

        // Simpan perubahan pada model User
        $userr->update([
            'nama' => $request->input('nama')
        ]);

        $dosenProfile->alamat = $request->input('alamat');
        $dosenProfile->email = $request->input('email');
        $dosenProfile->nohp = $request->input('nohp');
        $dosenProfile->google_scholar = $request->input('google_scholar');

        $dosenProfile->save();

        return redirect()->route('lihat.profil')->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function updateProfileImage(Request $request)
    {

        $user = auth()->user();

        $dosenProfile = $user->dosenProfile;

        // Validasi dan simpan gambar profil
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:1024', // Sesuaikan dengan kebutuhan Anda
        ]);
  
        if (!$dosenProfile) {
            $dosenProfile = new DosenProfile();
            $dosenProfile->user_id = $user->id;
        }

        if ($request->hasFile('foto')) {
            // Hapus gambar profil lama (kecuali jika itu gambar default)
            if ($dosenProfile->foto !== 'avatar.png') {
                Storage::delete('public/profile_image/' . $dosenProfile->foto);
            }

            // Simpan gambar profil baru
            $imagePath = $request->file('foto')->store('public/profile_image');
            $dosenProfile->foto = basename($imagePath);
            $dosenProfile->save();
        }
      

        return redirect()->back()->with('success', 'Gambar profil Anda berhasil diperbarui.');
    }
}
