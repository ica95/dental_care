<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();

        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('images/dokter'),
                $foto
            );
        }

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'foto' => $foto
        ]);

        return redirect('/dokter');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);

        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $foto = $dokter->foto;

        if ($request->hasFile('foto')) {

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('images/dokter'),
                $foto
            );
        }

        $dokter->update([
            'nama_dokter' => $request->nama_dokter,
            'foto' => $foto
        ]);

        return redirect('/dokter');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);

        $dokter->delete();

        return redirect('/dokter');
    }
}