<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilKlinik extends Model
{
    protected $fillable = [
        'nama_klinik',
        'alamat',
        'no_hp',
        'email',
        'deskripsi',
        'logo'
    ];
}