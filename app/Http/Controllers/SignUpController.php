<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'emailSign' => 'required|email|max:255|unique:users,email',
            'passwordSign' => 'required|min:8|max:12',
            'passwordVer' => 'required|max:12|min:8|same:passwordSign',
        ]);

        $data = [
            'email' => $request->input('emailSign'),
            'password' => bcrypt($request->input('passwordSign')),
        ];
        

        User::create($data);

        return redirect()->back()->with('success', 'User registered successfully!');
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
