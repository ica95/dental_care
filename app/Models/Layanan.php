<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Reservasi;


class Layanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'nama_layanan',
        'biaya',
        'foto'
    ];


    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
