<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $matakuliah = Matakuliah::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $dosen = Dosen::all();
        $ruangan = Ruangan::all();
        $prodi = Prodi::all();

        if ($request->ajax()) {
            $data = Jadwal::select(['id', 'hari', 'jam','matakuliah_id', 'semester_id','kelas_id','dosen_id','ruangan_id','prodi_id'])->get();
            return DataTables::of($data)

            ->editColumn('matakuliah_id', function ($data) {
                return $data->matakuliah->name;
            })
            ->editColumn('semester_id', function ($data) {
                return $data->semester->name;
            })
            ->editColumn('kelas_id', function ($data) {
                return $data->kelas->name;
            })
            ->editColumn('dosen_id', function ($data) {
                return $data->dosen->name;
            })
            ->editColumn('ruangan_id', function ($data) {
                return $data->ruangan->name;
            })
            ->editColumn('prodi_id', function ($data) {
                return $data->prodi->name;
            })
            ->addColumn('action', function ($data) {
                return '
                <button type="buton" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                <button type="buton" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
            })
            ->make(true);
        }
        // return view('pages.admin.jadwal.index', compact('matakuliah', 'semester', 'kelas', 'dosen', 'ruangan', 'prodi'));
        return view('pages.admin.jadwal.index', compact('semester', 'kelas','dosen', 'ruangan', 'prodi', 'matakuliah'));
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
            'hari' => 'required',
            'jam' => 'required',
            'matakuliah_id' => 'required',
            'semester_id' => 'required',
            'kelas_id' => 'required',
            'dosen_id' => 'required',
            'ruangan_id' => 'required',
            'prodi_id' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'hari' => $request->hari,
            'jam' => $request->jam,
            'matakuliah_id' => $request->matakuliah_id,
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
            'dosen_id' => $request->dosen_id,
            'ruangan_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
        );

        Jadwal::create($form_data);

        return response()->json(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal, $id)
    {
        if (request()->ajax()) {
            $data = Jadwal::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $rules = array(
            'hari' => 'required',
            'jam' => 'required',
            'matakuliah_id' => 'required',
            'semester_id' => 'required',
            'kelas_id' => 'required',
            'dosen_id' => 'required',
            'ruangan_id' => 'required',
            'prodi_id' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'hari' => $request->hari,
            'jam' => $request->jam,
            'matakuliah_id' => $request->matakuliah_id,
            'semester_id' => $request->semester_id,
            'kelas_id' => $request->kelas_id,
            'dosen_id' => $request->dosen_id,
            'ruangan_id' => $request->ruangan_id,
            'prodi_id' => $request->prodi_id,
        );

        Jadwal::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal, $id)
    {
        $data = Jadwal::findOrFail($id);
        $data->delete();
    }
}
