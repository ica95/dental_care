<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
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

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| CRUD DOKTER
|--------------------------------------------------------------------------
*/

Route::resource('dokter', DokterController::class);

/*
|--------------------------------------------------------------------------
| CRUD JADWAL DOKTER
|--------------------------------------------------------------------------
*/

Route::resource('jadwal_dokter', JadwalDokterController::class);

/*
|--------------------------------------------------------------------------
| CRUD LAYANAN
|--------------------------------------------------------------------------
*/

Route::resource('layanan', LayananController::class);

/*
|--------------------------------------------------------------------------
| CRUD RESERVASI
|--------------------------------------------------------------------------
*/

Route::resource('reservasi', ReservasiController::class);

/*
|--------------------------------------------------------------------------
| CRUD REKAM MEDIS
|--------------------------------------------------------------------------
*/

Route::resource('rekam_medis', RekamMedisController::class);

/*
|--------------------------------------------------------------------------
| CRUD PROFIL KLINIK
|--------------------------------------------------------------------------
*/

Route::resource('profil_klinik', ProfilKlinikController::class);