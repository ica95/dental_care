<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
        public function index()
    {
        $layanans = Layanan::all();

        return view(
            'layanan.index',
            compact('layanans')
        );
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('images/layanan'),
                $foto
            );
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect('/layanan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $foto = $layanan->foto;

        if ($request->hasFile('foto')) {

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('images/layanan'),
                $foto
            );
        }

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect('/layanan');
    }

    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();

        return redirect('/layanan');
    }
}