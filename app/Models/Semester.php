<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelaskuliah()
    {
        return $this->hasMany(Kelaskuliah::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'id','semester_id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }
}
