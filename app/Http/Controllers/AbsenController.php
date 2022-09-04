<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\KelasKuliah;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{

    public function filter(){
        $kelas = Kelas::all();
        $matakuliah = Matakuliah::all();
        return view('pages.admin.absen.filter.index', compact('kelas','matakuliah'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMataKuliah(Request $request, $id)
    {
        // $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::find($id);
        $jadwal = Jadwal::where('matakuliah_id', $matakuliah->id)->first();
        $kelas = Kelas::where('id', $jadwal->kelas_id)->first();
        $mahasiswa = Mahasiswa::where('kelas_id', $kelas->id)->get();
        $absen = Absen::select('mahasiswa_id')->groupBy('mahasiswa_id')->where('jadwal_id',$jadwal->id)->get();
        // dd($mahasiswa->first()->absen);
        // $mata_kuliah=Matakuliah::all();
        // $rekapAbsen=[];
        // foreach($mata_kuliah as $makul){
        //     foreach($mahasiswa as $mhs){
        //         $hadir=0;
        //         $alpa=0;
        //         $sakit=0;
        //         $izin=0;
        //         $absenMakul=[];
        //         foreach($mhs->absen as $absen){
        //             if($absen->jadwal->matakuliah_id == $makul->id && $absen->mahasiswa_id == $mhs->id){
        //                 if($absen->keterangan == 'hadir'){
        //                     $hadir++;
        //                 }else if($absen->keterangan == 'alpa'){
        //                     $alpa++;
        //                 }else if($absen->keterangan == 'sakit'){
        //                     $sakit++;
        //                 }else if($absen->keterangan == 'izin'){
        //                     $izin++;
        //                 }
        //             }
        //         }
        //         $absenMakul=[
        //             'nama_mahasiswa'=>$mhs->name_mahasiswa,
        //             'mata_kuliah'=>$makul->name_matakuliah,
        //             'makul_id'=>$makul->id,
        //             'hadir'=>$hadir,
        //             'alpa'=>$alpa,
        //             'sakit'=>$sakit,
        //             'izin'=>$izin,
        //         ];
        //         $rekapAbsen[]=$absenMakul;
        //     }
        // }
        // dd($mahasiswa);

        if ($request->ajax()) {
            return DataTables::of($mahasiswa)
                ->addIndexColumn()
                ->addColumn('action', function ($mahasiswa) {
                    return '
                    <button type="buton" name="edit" id="' . $mahasiswa->nim . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                    <button type="buton" name="edit" id="' . $mahasiswa->nim . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
                })
                ->addColumn('pertemuan', function ($row){
                    $i = 0;
                    foreach ($row->absen as $item){
                        $mataKuliah = $item->jadwal->matakuliah->id;
                        // dd($i);
                        $jadwal = Jadwal::where('matakuliah_id', $mataKuliah)->first();
                        if($jadwal->id == $row->kelas_id){
                            $i++;
                        }
                    }
                    return $i;
                })
                ->make(true);
        }
        return view('pages.admin.absen.index', compact('mahasiswa','mataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswas = KelasKuliah::where('jadwal_id', $request->jadwal_id)->get();

        $presensi = [];
        foreach ($siswas as $siswa) {
            $presensi[$siswa->id] = array(
                'mahasiswa_id' => $request['mahasiswa_id' . $siswa->id],
                'dosen_id' => $request['dosen_id' . $siswa->id],
                'jadwal_id' => $request['jadwal_id'],
                'keterangan' => $request['keterangan' . $siswa->id],
                'pertemuan' => $request['pertemuan']
            );
        }
        // dd($presensi);
        foreach ($presensi as $item) {
            Absen::create([
                'mahasiswa_id' => $item['mahasiswa_id'],
                'dosen_id' => $item['dosen_id'],
                'jadwal_id' => $item['jadwal_id'],
                'keterangan' => $item['keterangan'],
                'pertemuan' => $item['pertemuan']
            ]);
        }

        // return response()->json(['success' => 'Data berhasil ditambahkanss']);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen, $id)
    {
        if (request()->ajax()) {
            $data = Absen::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $rules = array(
            'mahasiswa_id' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'mahasiswa_id' => $request->mahasiswa_id,
        );

        Absen::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen, $id)
    {
        $data = Absen::findOrFail($id);
        $data->delete();
    }
}
