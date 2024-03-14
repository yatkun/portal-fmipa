<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Kelasuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        $user = auth()->user();
        $dosen = $user->dosenProfile;

        $userid = $user->id;
        if($user->level == 'Dosen'){
            $profil =  $user->dosenProfile;
            $kelas = Kelas::where('user_id', $userid)->count();
        }else if($user->level == 'Mahasiswa'){
            $profil =  $user->mahasiswaProfile;
            $kelas = Kelasuser::where('user_id', $userid)->count();
        }else if($user->level == 'Admin'){
            $profil =  $user->dosenProfile;
            $kelas = Kelasuser::where('user_id', $userid)->count();
        }

    
        return view('settings.changepassword', compact(['dosen','profil','kelas']), [
            'title' => 'Dashboard'
        ]);
    }

    public function changePassword(Request $request)
    {
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // $user = Auth::user();
        if (!Auth::check()) {
            // Redirect to login or handle unauthorized access
        }
        // $user = auth()->user();
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah!.']);
        }
   /** @var \App\Models\User $user **/

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('change.password')->with('success', 'Password berhasil diganti!!');
    }
}
