<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absen;

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
        $id = $request->id;
        $keterangan = $request->keterangan;
        $mahasiswa_id = $request->mahasiswa_id;
        $jadwal_id = $request->jadwal_id;
        $tanggal_absen = Carbon::now();
        $jam_absen = Carbon::now();

        $kelasByMhs = KelasKuliah::with('jadwal','mahasiswa')
        ->where('jadwal_id','=', $id)->get();



        // foreach ($kelasByMhs as $items) {
        //     $saveAbsen[] = array(
        //         'keterangan' => $request['keterangan'],
        //         'mahasiswa_id' => $request['mahasiswa_id'],
        //         'jadwal_id' => $request['jadwal_id' ],
        //         'tanggal_absen' => $request['tanggal_absen'],
        //         'jam_absen' => $request['jam_absen'],
        //     );
        // }

        // $saveAbsen = [];
        //     foreach($kelasByMhs as $key =>$value) {
        //         array_push($saveAbsen, [
        //             'keterangan'=>$value,
        //             'mahasiswa_id'=>$value,
        //             'jadwal_id'=>$value,
        //             'tanggal_absen'=> Carbon::now()->toDateString(),
        //             'jam_absen'=>Carbon::now()->toDateString(),
        //         ]);
        //     }


        // for ($i=0; $i<2; $i++){
        //     $saveAbsen = array([
        //         // 'id' =>$id[$i],
        //         'keterangan' => $keterangan[$i],
        //         'mahasiswa_id' => $mahasiswa_id[$i],
        //         'jadwal_id' => $jadwal_id[$i],
        //         'tanggal_absen' => $tanggal_absen->toDateString(),
        //         'jam_absen' => $jam_absen->toTimeString(),
        //     ]);
        // }
        $saveAbsen = [
            // 'id' =>$id[$i],
            'keterangan' => $keterangan,
            'mahasiswa_id' => $mahasiswa_id,
            'jadwal_id' => $jadwal_id,
            'tanggal_absen' => $tanggal_absen->toDateString(),
            'jam_absen' => $jam_absen->toTimeString(),
        ];
        // return dd($saveAbsen);
        Absen::insert($saveAbsen);
        return back();
    }
}
