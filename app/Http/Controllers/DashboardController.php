<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Dokumen;
use App\Models\Dashboard;
use App\Models\Kelasuser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $dosen = $user->dosenProfile;

        $userid = $user->id;
        $valid = 0;
        
        // dd($kelas);
        $dokumen = Dokumen::where('user_id', $userid)->count();
    
        
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
    
        return view('dashboard.index', compact(['dosen','profil','kelas','dokumen']), [
            'title' => 'Dashboard'
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
