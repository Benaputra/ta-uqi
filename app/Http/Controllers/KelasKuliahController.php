<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\KelasKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KelasKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::all();
        $jadwal = Jadwal::all();
        $matakuliah = Matakuliah::all();
        $kelas = Kelas::all();

        // $query = KelasKuliah::select(['tahun_ajaran','prodi_id', 'matakuliah_id', 'kelas_id', 'mahasiswa_id'])->get();
        // // dd($query);
        // return response()->json($query);

        if ($request->ajax()) {
            $data = KelasKuliah::with(['mahasiswa','jadwal', 'matakuliah', 'kelas'])->get();
            return DataTables::of($data)

                ->editColumn('mahasiswa_id', function ($data) {
                    return $data->mahasiswa->first()->name_mahasiswa;
                    // return "hehe";
                })
                ->editColumn('jadwal_id', function ($data) {
                    return $data->jadwal->hari;
                    // return "hehe";
                })
                ->editColumn('matakuliah_id', function ($data) {
                    return $data->matakuliah->name_matakuliah;
                    // return "hehe";
                })
                ->editColumn('kelas_id', function ($data) {
                    return $data->kelas->name_kelas;
                    // return "hehe";
                })
                ->addColumn('action', function ($data) {
                    return '
                <button type="buton" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                <button type="buton" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
                })
                ->make(true);
        }
        return view('pages.admin.kelaskuliah.index', compact('mahasiswa', 'jadwal', 'matakuliah', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $rules = array(
            'mahasiswa_id' => 'required',
            'jadwal_id' => 'required',
            'matakuliah_id' => 'required',
            'kelas_id' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'mahasiswa_id' => $request->mahasiswa_id,
            'jadwal_id' => $request->jadwal_id,
            'matakuliah_id' => $request->matakuliah_id,
            'kelas_id' => $request->kelas_id,
        );

        KelasKuliah::create($form_data);

        return response()->json(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelasKuliah  $kelasKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(KelasKuliah $kelasKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelasKuliah  $kelasKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(KelasKuliah $kelasKuliah, $id)
    {
        if (request()->ajax()) {
            $data = KelasKuliah::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelasKuliah  $kelasKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelasKuliah $kelasKuliah)
    {
        $rules = array(
            'mahasiswa_id' => 'required',
            'jadwal_id' => 'required',
            'matakuliah_id' => 'required',
            'kelas_id' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'mahasiswa_id' => $request->mahasiswa_id,
            'jadwal_id' => $request->jadwal_id,
            'matakuliah_id' => $request->matakuliah_id,
            'kelas_id' => $request->kelas_id,
        );

        KelasKuliah::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelasKuliah  $kelasKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelasKuliah $kelasKuliah, $id)
    {
        $data = KelasKuliah::findOrFail($id);
        $data->delete();
    }
}
