<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('profil')
            ->join('users', 'profil.id_akun', '=', 'users.id')
            ->where('profil.id_akun', Auth::user()->id)
            ->first();


        return view('homeAdmin', compact('data'));
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
    public function update(Request $request)
    {
        $request->validate([
            'foto_akun' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = profile::where('id_akun',Auth::user()->id)->first();

        // Simpan gambar baru
        $file = $request->file('foto_akun');
        $newPhotoName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/img/admin/dashboard'), $newPhotoName);

        // Update path gambar di database
        $user->foto_akun = '/storage/img/admin/dashboard/' . $newPhotoName;
        $user->save();

        return redirect()->back()->with('update','profile telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
