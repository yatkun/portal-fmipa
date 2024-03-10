<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data yang dikirim dari form login
        $request->validate([
            'nidn' => 'required',
            'password' => 'required',
        ]);

        
        // Mencoba untuk melakukan login
        if (Auth::attempt(['nidn' => $request->nidn, 'password' => $request->password])) {
            if (Auth::user()->is_active) {
                // Jika login berhasil dan akun aktif, redirect ke dashboard
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            } else {
                // Jika akun tidak aktif, kembalikan ke halaman login dengan pesan error
                Auth::logout(); // Logout user yang telah login
                return back()->with('is_active', 'Akun anda dalam tahap review. Silahkan hubungi admin !');
            }
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return back()->with('nidn', 'ID Pengguna atau Kata Sandi salah.');
        }

        

        
    }

   

    public function logout(Request $request)
    {
        Auth::logout();

        // Jika Anda ingin melakukan sesuatu setelah logout, tambahkan logika di sini

        return redirect('/masuk'); // Redirect ke halaman beranda setelah logout
    }

}
