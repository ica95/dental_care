<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{	
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pasien',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
