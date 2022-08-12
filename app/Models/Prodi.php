<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id','prodi_id');
    }

    public function kelaskuliah()
    {
        return $this->hasMany(Kelaskuliah::class);
    }
}
