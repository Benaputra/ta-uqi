<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'user_id'
    ];

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

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }

    public function kelaskuliah()
    {
        return $this->belongsTo(Kelaskuliah::class);
    }
    public function jadwalMhs()
    {
        return $this->hasManyThrough(KelasKuliah::class, User::class);
    }
}
