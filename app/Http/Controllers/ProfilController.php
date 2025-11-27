<?php

namespace App\Http\Controllers;

use App\Models\Prakata;
use Illuminate\Http\Request;
use App\Models\ProfilSekolah as Profil;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get the 'visi' column value from the first Profil record
        $visi = Profil::first();
        return view('front.visiMisi', compact('visi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function struktur()
    {
        return view('front.strukturOrganisasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function prakata()
    {
        $prakata = Prakata::first();
        return view('front.prakata', compact('prakata'));
    }

    /**
     * Display the specified resource.
     */
    public function sejarah()
    {
        return view('front.sejarah');
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
