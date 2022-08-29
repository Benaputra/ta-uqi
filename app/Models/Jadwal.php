<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //     'hari',
    //     'jam',
    //     'matakuliah_id',
    //     'semester_id',
    //     'kelas_id',
    //     'dosen_id',
    //     'ruangan_id',
    //     'prodi_id',
    // ];

    public function matakuliahs()
    {
        return $this->belongsToThrough(Matakuliah::class,KelasKuliah::class);
    }

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
        return $this->belongsTo(Dosen::class,'dosen_id','user_id');
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

    public function kelaskuliah()
    {
        return $this->belongsTo(KelasKuliah::class);
    }
}
