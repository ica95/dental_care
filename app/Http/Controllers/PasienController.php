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
    | PROFIL PASIEN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pasien = Pasien::where(
            'user_id',
            Auth::id()
        )->first();

        return view(
            'pasien.index',
            compact('pasien')
        );
    }
    public function show($id)
{
    return redirect('/pasien');
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

    public function update(
        Request $request,
        $id
    )
    {
        $pasien = Pasien::findOrFail($id);

        $pasien->update([

            'nama_pasien' =>
                $request->nama_pasien,

            'jenis_kelamin' =>
                $request->jenis_kelamin,

            'tanggal_lahir' =>
                $request->tanggal_lahir,

            'alamat' =>
                $request->alamat,

            'no_hp' =>
                $request->no_hp

        ]);

        return redirect('/pasien')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }
}
