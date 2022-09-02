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
        $getKelasMhs = KelasKuliah::with('jadwal.matakuliah', 'mahasiswa')
            ->where('mahasiswa_id', '=', auth()->user()->id)
            ->get();

        $getKelasDosen = Jadwal::with('dosen', 'matakuliah', 'kelas', 'ruangan', 'semester', 'prodi')
            ->where('dosen_id', '=', auth()->id())
            ->get();


        return view ('dashboard', compact('getKelasMhs', 'getKelasDosen'));
    }

    public function show_kelas($id){
        $kelasByMhs = KelasKuliah::with(['jadwal','mahasiswa'])
        ->where('jadwal_id','=', $id)->get();

        // return $kelasByMhs->toJson();
        return view('pages.dosen.detail_kelas', compact('kelasByMhs'));
    }

    public function show_rekap_mhs(){
        $mataKuliah = Matakuliah::with('jadwal.absen')->first();
        $rekapAbseMhs=[];
        $alpa=0;
        $izin=0;
        $sakit=0;
        
        foreach($mataKuliah->jadwal as $mahasiswa){
            foreach($mahasiswa->absen as $absenMhs){
                if($absenMhs->mahasiswa_id == auth()->user()->id){
                    $rekapAbsenMhs[] = $absenMhs;
                    if($absenMhs->keterangan == 'alpa'){
                        $alpa++;
                    }else if($absenMhs->keterangan == 'izin'){
                        $izin++;
                    }else if($absenMhs->keterangan == 'sakit'){
                        $sakit++;
                    }
                }
            }     
        }
        $rekap=[
            'mata_kuliah'=>$mataKuliah->name_matakuliah,
            'rekap_absen'=>$rekapAbsenMhs,
            'alpa'=>$alpa,
            'izin'=>$izin,
            'sakit'=>$sakit
        ];
        
        // $rekapAbsen->jadwal->kelaskuliah->mahasiswa->where('mahasiswa_id','=',auth()->id())->get();

        dd($rekap);
        return view('pages.mahasiswa.rekap_absen',compact('rekapAbsenMhs'));
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
