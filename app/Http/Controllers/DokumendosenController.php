<?php

namespace App\Http\Controllers;

use App\Models\Dokumendosen;
use Illuminate\Http\Request;

class DokumendosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tendik.dokumen.dosen.index', [
            'title' => 'Dokumen Dosen'
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
    public function show(Dokumendosen $dokumendosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumendosen $dokumendosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumendosen $dokumendosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumendosen $dokumendosen)
    {
        //
    }
}
