<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ProfilKlinikController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| AREA YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::resource(
    'pasien',
    PasienController::class
);

    Route::get(
        '/dashboard-admin',
        [AdminController::class, 'dashboard']
    );

    Route::resource(
        'dokter',
        DokterController::class
    );

    Route::resource(
        'jadwal_dokter',
        JadwalDokterController::class
    );

    Route::resource(
        'layanan',
        LayananController::class
    );

    Route::resource(
        'reservasi',
        ReservasiController::class
    );

    Route::resource(
        'rekam_medis',
        RekamMedisController::class
    );

    Route::resource(
        'profil_klinik',
        ProfilKlinikController::class
    );

});

/*
|--------------------------------------------------------------------------
| TEST LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/tes-logout', function () {

    Auth::logout();

    session()->invalidate();

    session()->regenerateToken();

    return redirect('/login');

});