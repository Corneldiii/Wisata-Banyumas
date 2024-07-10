<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class updateDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->query('id');
        $nama = $request->query('nama');
        $harga = $request->query('harga');
        $alamat = $request->query('alamat');
        $deskripsi = $request->query('deskripsi');
        $latitude = $request->query('latitude');
        $longitude = $request->query('longitude');

        return view('/update', compact('id', 'nama', 'harga', 'alamat','deskripsi', 'latitude', 'longitude'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
