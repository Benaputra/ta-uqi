<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class, 'mahasiswa_id', 'id');
    }

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class,'kelas_kuliahs');
    }
    public function jadwalMhs()
    {
        return $this->hasManyThrough(KelasKuliah::class, User::class);
    }
}
