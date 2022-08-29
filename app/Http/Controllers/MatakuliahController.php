<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Semester;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prodi = Prodi::all();
        $semester = Semester::all();

        if ($request->ajax()) {
            $data = Matakuliah::select('id', 'kode_matakuliah', 'name_matakuliah', 'semester_id', 'prodi_id')->get();
            return DataTables::of($data)
            ->editColumn('semester_id', function ($data) {
                return $data->semester->name_semester;
            })
            ->editColumn('prodi_id', function ($data) {
                return $data->prodi->name_prodi;
            })
                ->addColumn('action', function ($data) {
                    return '
                    <button type="buton" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                    <button type="buton" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
                })
                ->make(true);
        }

        return view('pages.admin.matakuliah.index', compact('prodi', 'semester'));
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
        // $rules = array(
        //     'kode_matakuliah' => 'required',
        //     'name_matakuliah' => 'required',
        //     'semester_id' => 'required',
        //     'prodi_id' => 'required',
        // );

        // $error = Validator::make($request->all(), $rules);

        // if ($error->fails()) {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }

        $form_data = array(
            'kode_matakuliah' => $request->kode_matakuliah,
            'name_matakuliah' => $request->name_matakuliah,
            'semester_id' => $request->semester_id,
            'prodi_id' => $request->prodi_id,
        );

        Matakuliah::create($form_data);

        return response()->json(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah, $id)
    {
        if (request()->ajax()) {
            $data = Matakuliah::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        // $rules = array(
        //     'kode_matakuliah' => 'required',
        //     'name_matakuliah' => 'required',
        //     'semester_id' => 'required',
        //     'prodi_id' => 'required',
        // );

        // $error = Validator::make($request->all(), $rules);

        // if ($error->fails()) {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }

        $form_data = array(
            'kode_matakuliah' => $request->kode_matakuliah,
            'name_matakuliah' => $request->name_matakuliah,
            'semester_id' => $request->semester_id,
            'prodi_id' => $request->prodi_id,
        );

        Matakuliah::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah, $id)
    {
        $data = Matakuliah::findOrFail($id);
        $data->delete();
    }
}
