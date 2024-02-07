<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert(
            [
                [
                    'nama' => 'Admin',
                    'nidn' => 'admin',
                    'level' => 'Admin',
                    'password' => bcrypt('admin'),
                ],
                [
                    'nama' => 'Dosen 1',
                    'nidn' => 'dosen1',
                    'level' => 'Dosen',
                    'password' => bcrypt('dosen1'),
                ],
                [
                    'nama' => 'Mahasiswa 1',
                    'nidn' => 'mahasiswa1',
                    'level' => 'Mahasiswa',
                    'password' => bcrypt('mahasiswa1'),
                ],
                [
                    'nama' => 'Mahasiswa 2',
                    'nidn' => 'mahasiswa2',
                    'level' => 'Mahasiswa',
                    'password' => bcrypt('mahasiswa2'),
                ],
                [
                    'nama' => 'Dosen 2',
                    'nidn' => 'dosen2',
                    'level' => 'Dosen',
                    'password' => bcrypt('dosen2'),
                ]
            ]
        );

        DB::table('kelas')->insert(
            [
                [
                    'kode_kelas' => 'ALG2023',
                    'nama_kelas' => 'Algoritma dan Pemrograman',
                    'user_id' => '2'
                ],

            ]
        );

        DB::table('kelas_user')->insert(
            [
                [
                    'kelas_id' => '1',
                    'user_id' => '3'
                ],

            ]
        );

        DB::table('tugas')->insert(
            [
                [
                    'judul' => 'Tugas 1',
                    'deskripsi' => 'deskripsi tugas 1',
                    'tglmulai' => '2023-09-10',
                    'tglakhir' => '2023-09-10',
                    'link' => 'link tugas',
                    'kelas_id' => '1',
                    
                ],

            ]
        );

        DB::table('tugas_user')->insert(
            [
                [
                    'kelas_user_id' => '1',
                    'tugas_id' => '1',
                    'deskripsi' => 'deskripsi jawaban',
                    'link' => 'link',
                    
                    'nilai' => '90',
                    'tgl_kirim' => '2023-09-10'
                ],

            ]
        );
    }
}
