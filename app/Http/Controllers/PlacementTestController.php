<?php

namespace App\Http\Controllers;

use App\Models\PlacementTest;
use Illuminate\Http\Request;

class PlacementTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('placement_test.index', [
            'title' => 'Pengumuman Placement Test'
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
    public function show(Request $request)
    {
        $nim = $request->nim;
        $getdata = PlacementTest::where('nim', $nim)->first();
        
        if (!$getdata) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        

        return view('placement_test.show', [
            'title' => 'Pengumuman Placement Test',
            'data' => $getdata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlacementTest $placementTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlacementTest $placementTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlacementTest $placementTest)
    {
        //
    }
}
