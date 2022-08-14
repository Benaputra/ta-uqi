<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Semester;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{

    public function index(Request $request)
    {
        $prodi = Prodi::all();
        $kelas = Kelas::all();

        if ($request->ajax()) {
            $data = Mahasiswa::select('id','user_id','nim', 'name', 'kelas_id', 'prodi_id')->get();
            return DataTables::of($data)
            ->editColumn('kelas_id', function ($data) {
                return $data->kelas->name;
            })
            ->editColumn('prodi_id', function ($data) {
                return $data->prodi->name;
            })
            ->editColumn('email', function ($data) {
                return $data->user->email;
            })
            ->addColumn('action', function ($data) {
                return '
                <button type="buton" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                <button type="buton" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
            })
            ->make(true);
        }
        return view('pages.admin.mahasiswa.index', compact('prodi', 'kelas'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'nim' => 'required',
            'name' => 'required',
            'kelas_id' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $pass = $request->password;
        $postpass = Hash::make($pass);

        $form_data = array(
            'nim' => $request->nim,
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
            'password' => $postpass,
        );

        Mahasiswa::create($form_data);

        return response()->json(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit(Mahasiswa $mahasiswa, $id)
    {
        if (request()->ajax()) {
            $data = Mahasiswa::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = array(
            'nim' => 'required',
            'name' => 'required',
            'kelas_id' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'nim' => $request->nim,
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
        );

        Mahasiswa::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Mahasiswa $mahasiswa, $id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();
    }
}
