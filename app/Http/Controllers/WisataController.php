<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = DB::table('profil')
            ->join('users', 'profil.id_akun', '=', 'users.id')
            ->where('profil.id_akun', Auth::user()->id)
            ->first();
            
        return view('/tambahWisata',compact('profil'));
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
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengelola upload file
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('storage/img/index/wisata'), $imageName);
            $imagePath = 'storage/img/index/wisata/' . $imageName;
        }

        // Buat data wisata baru
        $wisata = new Wisata();
        $wisata->nama_wisata = $request->input('nama_wisata');
        $wisata->alamat = $request->input('alamat');
        $wisata->deskripsi = $request->input('deskripsi');
        $wisata->harga_tiket = $request->input('harga_tiket');
        $wisata->latitude = $request->input('latitude');
        $wisata->longitude = $request->input('longitude');
        $wisata->foto = $imagePath; // Simpan path file di database
        $wisata->save();


        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('tambah_wisata')->with('success', 'Data wisata berhasil ditambahkan!');
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
