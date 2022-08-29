<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class,'user_id','dosen_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
