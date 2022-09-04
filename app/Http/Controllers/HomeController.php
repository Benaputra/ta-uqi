<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Matakuliah;

class HomeController extends Controller
{
    public function index()
    {
        // $getMhs = KelasKuliah::with('mahasiswa')->get();
        // dd($getMhs);
        // foreach ($getMhs as $mhs) {
        //     foreach ($mhs as $authMhs) {
        //         if($authMhs  == auth()->id()){
        //             return $authMhs;
        //         }
        //     }
        // }
        $getKelasMhs = KelasKuliah::with('jadwal.matakuliah', 'mahasiswa')
            ->where('mahasiswa_id', '=', auth()->user()->id)
            ->get();

        $getKelasDosen = Jadwal::with('dosen', 'matakuliah', 'kelas', 'ruangan', 'semester', 'prodi')
            ->where('dosen_id', '=', auth()->id())
            ->get();

        // return $getMhs->toJson();
        return view ('dashboard', compact('getKelasMhs', 'getKelasDosen'));
    }

    public function show_kelas($id){
        $kelasByMhs = KelasKuliah::with(['jadwal','mahasiswa'])
        ->where('jadwal_id','=', $id)->get();
        $absen = Absen::where('jadwal_id', $kelasByMhs->first()->jadwal_id)->orderBy('pertemuan','DESC')->first();
        // dd($absen);
        // return $kelasByMhs->toJson();
        return view('pages.dosen.detail', compact('kelasByMhs','absen'));
    }

    public function show_rekap_dsn($id){
        $absen = Absen::where('jadwal_id',$id)->get();
        $jadwal = Jadwal::where('id',$id)->first();
        return view('pages.dosen.rekap_absen_mahasiswa',compact('absen','jadwal'));

    }

    public function show_rekap_mhs($id){
        $absen = Absen::where('jadwal_id',$id)->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
        return view('pages.mahasiswa.rekap_absen',compact('absen'));
    }

    public function detail($id)
    {
        $mahasiswa_id = auth()->user()->semester;

        dd($mahasiswa_id);
        $jadwal = Absen::with('mahasiswa')->where('jadwal_id', $id)->where('mahasiswa_id', $mahasiswa_id);
        $alpa = $jadwal->where('keterangan', 'Absen')->get();
        $sakit = $jadwal->where('keterangan', 'Sakit')->get();
        $hadir = $jadwal->where('keterangan', 'Hadir')->get();
        // dd($sakit);

        return view('pages.mahasiswa.detail', [
            'alpaCount' => count($alpa) == [] ? 0 : count($alpa),
            'alpaName' => $alpa->first() == null ? 'Tidak Ada Data' : $alpa->first()->mahasiswa->first()->name_mahasiswa,
            'alpaKet' => $alpa->first() == null ? 'Tidak Ada Data' : $alpa->first()->keterangan,
            'sakitCount' => count($sakit) == [] ? 0 : count($sakit),
            'sakitName' => $sakit->first() == null ? 'Tidak Ada Data' : $sakit->first()->mahasiswa->first()->name_mahasiswa,
            'sakitKet' => $sakit->first() == null ? 'Tidak Ada Data' : $sakit->first()->keterangan,
            'hadirCount' => count($hadir) == [] ? 0 : count($hadir),
            'hadirName' => $hadir->first() == null ? 'Tidak Ada Data' : $hadir->first()->mahasiswa->first()->name_mahasiswa,
            'hadirKet' => $hadir->first() == null ? 'Tidak Ada Data' : $hadir->first()->keterangan,
        ]);
    }
}
