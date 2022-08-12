<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class,'matakuliah_id','id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id','id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class,'ruangan_id','id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }
}
