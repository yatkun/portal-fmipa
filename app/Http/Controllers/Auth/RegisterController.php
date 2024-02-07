<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {


        // Validasi data yang dikirim dari form registrasi
        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required',
        //     'nidn' => 'required|unique:users,nidn',
        //     'password' => 'required|min:8',
        // ]);

        // $request->validate([
        //     'nama' => 'required',
        //     'nidn' => 'required|unique:users,nidn',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        $this->validate(
            $request,
            [
                'nama' => 'required',
                'nidn' => 'required|unique:users,nidn',
                'password' => 'required',
            ],
            [
                'nidn.unique' => 'NIDN sudah terdaftar'
            ]
        );

        // if ($validator->fails()) {
        //     dd($validator->errors());
        // }
        // Menyimpan data user baru ke database
        User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'password' => Hash::make($request->password),
            'level' => 'Mahasiswa'
        ]);

        return redirect()->route('login.form')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }
}
