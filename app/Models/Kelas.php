<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function kelaskuliah()
    {
        return $this->hasMany(Kelaskuliah::class);
    }
    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
