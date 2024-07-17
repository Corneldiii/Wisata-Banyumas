<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/login');
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

    public function authentication(Request $request)
    {
        $credentials =  $request->validate([
            // dd($request),
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::user()->id);


            $cekprofil = profile::where('id_akun', Auth::user()->id)->get();

            // dd($cekprofil);

            if($cekprofil->count() == 0){
                $profil = [
                    'id_akun' => Auth::user()->id,
                ];

                profile::create($profil);
            }
    
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('homeAdmin'))->with('login_success','Welcome admin,'.Auth::user()->email).'!';
            } else {
                return redirect()->intended(route('index'))->with('login_success','Welcome,'.Auth::user()->email).'!';
            }
        }
        // dd('gagal');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
