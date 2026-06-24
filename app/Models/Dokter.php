<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalDokter;
use App\Models\Reservasi;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokter',
        'foto'
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalDokter::class);
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
    public function rekamMedis()
    {
    return $this->hasMany(RekamMedis::class);
    }
}
