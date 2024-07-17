<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'user' || !Auth::check()) {
            $id = $request->query('id');
            $nama = $request->query('nama');
            $harga = $request->query('harga');
            $alamat = $request->query('alamat');
            $deskripsi = $request->query('deskripsi');
            $foto = $request->query('foto');
            $userId = Auth::id();
            return view('reservasi', compact('id', 'nama', 'harga', 'alamat', 'deskripsi', 'foto', 'userId'));
        } else {
            return redirect()->route('index');
        }        
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
        // dd($request);
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'visitor' => 'required|integer',
            'total_harga' => 'required|numeric',
            'id_akun' => 'required|exists:users,id',
        ]);

        $reservasi = [
            'nama' => $request->input('nama'),
            'tanggal' => $request->input('tanggal'),
            'visitor' => $request->input('visitor'),
            'total_harga' => $request->input('total_harga'),
            'id_wisata' => $request->input('id_wisata'),
            'id_akun' => $request->input('id_akun'),
        ];

        reservasi::create($reservasi);

        return redirect()->route('index')->with('reservasi_success', 'Reservasi berhasil disimpan');
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
