<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard-admin');
            }

            return redirect('/dashboard-pasien');
        }

        return back()->with(
            'error',
            'Email atau Password salah'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | TAMPIL REGISTER
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        return view('auth.register');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'jenis_kelamin' => 'required',

            'tanggal_lahir' => 'required',

            'alamat' => 'required',

            'no_hp' => 'required',

            'password' => [
                'required',
                'min:6',
                'confirmed'
            ]
        ]);

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => 'pasien'
        ]);

        Pasien::create([

            'user_id' => $user->id,

            'nama_pasien' => $request->name,

            'jenis_kelamin' => $request->jenis_kelamin,

            'tanggal_lahir' => $request->tanggal_lahir,

            'alamat' => $request->alamat,

            'no_hp' => $request->no_hp
        ]);

        return redirect('/login')->with(
            'success',
            'Registrasi berhasil'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}