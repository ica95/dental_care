<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PASIEN
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $pasien = Pasien::where(
            'user_id',
            Auth::id()
        )->first();

        return view(
            'pasien.dashboard',
            compact('pasien')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DATA PASIEN (UNTUK ADMIN)
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pasiens = Pasien::whereHas('user', function ($query) {
            $query->where('role', 'pasien');
        })->get();

        return view(
            'pasien.index',
            compact('pasiens')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PROFIL PASIEN SENDIRI
    |--------------------------------------------------------------------------
    */

    public function show()
    {
        $pasien = Pasien::where(
            'user_id',
            Auth::id()
        )->first();

        return view(
            'pasien.show',
            compact('pasien')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PROFIL PASIEN
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);

        return view(
            'pasien.edit',
            compact('pasien')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFIL PASIEN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'nama_pasien'   => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp
        ]);

        return redirect('/pasien')->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }
}