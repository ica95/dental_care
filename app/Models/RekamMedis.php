<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    protected $fillable = [

        'pasien_id',
        'dokter_id',
        'reservasi_id',
        'tanggal_periksa',
        'diagnosa',
        'tindakan',
        'resep_obat',
        'catatan',
        'biaya'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE PASIEN
    |--------------------------------------------------------------------------
    */

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE DOKTER
    |--------------------------------------------------------------------------
    */

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE RESERVASI
    |--------------------------------------------------------------------------
    */

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}