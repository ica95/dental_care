<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();

        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'biaya'         => 'required|numeric|min:0',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('images/layanan'),
                $foto
            );
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'biaya'         => $request->biaya,
            'foto'          => $foto,
        ]);

        return redirect('/layanan')
            ->with('success', 'Layanan berhasil ditambahkan.');
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
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'biaya'         => 'required|numeric|min:0',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        $foto = $layanan->foto;

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if (
                $layanan->foto &&
                file_exists(public_path('images/layanan/' . $layanan->foto))
            ) {
                unlink(public_path('images/layanan/' . $layanan->foto));
            }

            $foto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('images/layanan'),
                $foto
            );
        }

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'biaya'         => $request->biaya,
            'foto'          => $foto,
        ]);

        return redirect('/layanan')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();

        return redirect('/layanan')
            ->with('success', 'Layanan berhasil dipindahkan ke Data Terhapus.');
    }

    public function trash()
    {
        $layanans = Layanan::onlyTrashed()->get();

        return view('layanan.trash', compact('layanans'));
    }

    public function restore($id)
    {
        Layanan::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect('/layanan/trash')
            ->with('success', 'Data berhasil dipulihkan.');
    }
}