<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasKuliah extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class,'id','mahasiswa_id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class,'id','matakuliah_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }
}
