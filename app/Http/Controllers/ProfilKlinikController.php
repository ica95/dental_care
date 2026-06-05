<?php

namespace App\Http\Controllers;

use App\Models\ProfilKlinik;
use Illuminate\Http\Request;

class ProfilKlinikController extends Controller
{
    public function index()
    {
        $profils = ProfilKlinik::all();

        return view('profil_klinik.index', compact('profils'));
    }

    public function create()
    {
        return view('profil_klinik.create');
    }

    public function store(Request $request)
    {
        $logo = null;

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->extension();

            $request->logo->move(
                public_path('images/logo'),
                $logo
            );
        }

        ProfilKlinik::create([
    'nama_klinik' => $request->nama_klinik,
    'alamat' => $request->alamat,
    'no_hp' => $request->no_hp,
    'email' => $request->email,
    'deskripsi' => $request->deskripsi,
    'logo' => $logo
]);
        return redirect('/profil_klinik');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $profil = ProfilKlinik::findOrFail($id);

        return view('profil_klinik.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = ProfilKlinik::findOrFail($id);

        $logo = $profil->logo;

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->extension();

            $request->logo->move(
                public_path('images/logo'),
                $logo
            );
        }

        $profil->update([
            'nama_klinik' => $request->nama_klinik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
'email' => $request->email,
            'deskripsi' => $request->deskripsi,
            'logo' => $logo
        ]);

        return redirect('/profil_klinik');
    }

    public function destroy($id)
    {
        $profil = ProfilKlinik::findOrFail($id);

        $profil->delete();

        return redirect('/profil_klinik');
    }
}