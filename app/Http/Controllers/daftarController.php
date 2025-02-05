<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class daftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Wisata::paginate(10);
        //  dd($data);
        $profil = DB::table('profil')
            ->join('users', 'profil.id_akun', '=', 'users.id')
            ->where('profil.id_akun', Auth::user()->id)
            ->first();

        return view('daftarWisata',compact('data','profil'));
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
        $wisata = Wisata::findOrFail($id);
        $wisata->update($request->all());
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('table_wisata')
        -> where('id',$request->input('id'))
        -> delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
