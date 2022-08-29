<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $getKelasMhs = KelasKuliah::with('jadwal', 'mahasiswa')
            ->where('mahasiswa_id', '=', auth()->user()->id)
            ->get();

        $getKelasDosen = Jadwal::with('dosen', 'matakuliah', 'kelas', 'ruangan', 'semester', 'prodi')
            ->where('dosen_id', '=', auth()->id())
            ->get();

        // $getDataMhs = KelasKuliah::with('jadwal', 'mahasiswa')
        //     ->where('jadwal_id', '=', '$jadwal')
        //     ->groupBy('mahasiswa_id')
        //     ->get();
        // return $getKelasDosen->toJson();

        return view ('dashboard', compact('getKelasMhs', 'getKelasDosen'));
    }

    public function show_kelas($id){
        $kelasByMhs = KelasKuliah::with('jadwal','mahasiswa')
        ->where('jadwal_id','=', $id)->get();

        // return $kelasByMhs->toJson();
        return view('pages.dosen.detail_kelas', compact('kelasByMhs'));
    }

    public function save_absen(Request $request)
    {
        $hadir = $request->hadir;
        $alpha = $request->alpha;
        $saveAbsen = [

        ];
    }
}
