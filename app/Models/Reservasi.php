<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [

        'pasien_id',
        'dokter_id',
        'layanan_id',
        'tanggal_reservasi',
        'jam_reservasi',
        'keluhan',
        'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}