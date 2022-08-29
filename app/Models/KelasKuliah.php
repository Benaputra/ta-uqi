<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasKuliah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class,'user_id','mahasiswa_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id','jadwal_id');
    }

    // public function getMatakuliah()
    // {
    //     return $this->hasManyThrough(
    //         Matakuliah::class,
    //         Jadwal::class,
    //         'id',
    //         'matakuliah_id',
    //         'jadwal_id',
    //         'id'
    //     );
    // }
}
