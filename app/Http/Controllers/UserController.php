<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data user dari database
        $users = User::where('level', 'Dosen')->get();
        return view('pengguna.dosen.index', compact('users'),[
            'title' => 'Daftar Pengguna'
        ]);
    }

    public function mahasiswa_index()
    {
        // Mengambil semua data user dari database
        $users = User::where('level', 'Mahasiswa')->get();
        return view('pengguna.mahasiswa.index', compact('users'),[
            'title' => 'Daftar Pengguna'
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:users,nidn',
            'level' => 'required|in:Admin,Dekan,Wakil Dekan,Dosen,Ketua Prodi,Tendik,Mahasiswa',
            'password' => 'required|min:8',
        ]);

        // Menyimpan data user baru ke database
        User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'level' => $request->level,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'nidn' => 'required|unique:users,nidn',
                'password' => 'required',
            ],
            [
                'nidn.unique' => 'Penambahan dosen gagal. NIDN sudah terdaftar.'
            ]
        );

        User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Akun dosen berhasil ditambahkan');
    }


    public function mahasiswa_register(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama' => 'required',
                'nidn' => 'required|unique:users,nidn',
                'password' => 'required',
            ],
            [
                'nidn.unique' => 'Penambahan mahasiswa gagal. NIM sudah terdaftar.'
            ]
        );

        User::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'level' => 'Mahasiswa',
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Akun mahasiswa berhasil ditambahkan');
    }

    public function update_dosen(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form Edit
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            
        ]);

        // Temukan data berdasarkan id
        $data = User::find($id);

        // Pastikan data ditemukan
        if ($data) {
            // Update data dengan data baru
            $data->nama = $request->nama;
            $data->nidn = $request->nidn;
          
            $data->save();

            // Jika Anda ingin melakukan sesuatu setelah data diupdate, tambahkan logika di sini

            // Redirect ke halaman tertentu setelah data berhasil diupdate
            return back()->with('success', 'Akun dosen berhasil diupdate.');
        } else {
            // Jika data tidak ditemukan, berikan pesan error atau tindakan yang sesuai
            return back()->with('error', 'Akun dosen tidak ditemukan.');
        }
    }

    public function update_mahasiswa(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form Edit
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required',
            
        ]);

        // Temukan data berdasarkan id
        $data = User::find($id);

        // Pastikan data ditemukan
        if ($data) {
            // Update data dengan data baru
            $data->nama = $request->nama;
            $data->nidn = $request->nidn;
          
            $data->save();

            // Jika Anda ingin melakukan sesuatu setelah data diupdate, tambahkan logika di sini

            // Redirect ke halaman tertentu setelah data berhasil diupdate
            return back()->with('success', 'Akun mahasiswa berhasil diupdate.');
        } else {
            // Jika data tidak ditemukan, berikan pesan error atau tindakan yang sesuai
            return back()->with('error', 'Akun mahasiswa tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_dosen($id)
    {
        
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return back()->with('success', 'Akun dosen berhasil dihapus.');
        } else {
            return back()->with('error', 'Akun dosen tidak ditemukan.');
        }
    }

    public function destroy_mahasiswa($id)
    {
        
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return back()->with('success', 'Akun mahasiswa berhasil dihapus.');
        } else {
            return back()->with('error', 'Akun mahasiswa tidak ditemukan.');
        }
    }


}
