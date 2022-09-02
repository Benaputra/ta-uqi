<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'jadwal_id',
        'dosen_id',
        'jam_absen',
        'pertemuan',
        'tanggal_absen',
        'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id', 'mahasiswa_id');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
