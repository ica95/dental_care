<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservasi;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'foto'
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
