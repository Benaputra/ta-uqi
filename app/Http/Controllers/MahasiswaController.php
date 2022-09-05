<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{

    public static function prodi(){
        $prodi = Prodi::all();
        return $prodi;
    }

    public static function kelas(){
        $kelas = Kelas::all();
        return $kelas;
    }

    public function index(Request $request, $id)
    {
        $prodi = Prodi::find($id);
        $kelas = Kelas::all();

        if ($request->ajax()) {
            $data = Mahasiswa::where('prodi_id', $id);
            return DataTables::of($data)
            ->editColumn('kelas_id', function ($data) {
                return $data->kelas->name_kelas;
            })
            ->editColumn('prodi_id', function ($data) {
                return $data->prodi->name_prodi;
            })
            ->editColumn('email', function ($data) {
                return $data->user->email;
            })
            ->addColumn('action', function ($data) {
                return '
                <button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>
                <button type="button" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
            })
            ->make(true);
        }
        return view('pages.admin.mahasiswa.index', compact('prodi','kelas'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'nim' => 'required',
            'name_mahasiswa' => 'required',
            'kelas_id' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $user_mhs = User::create([
            'name' => $request->name_mahasiswa,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $simpan_user = $user_mhs->assignRole('mahasiswa');
        $dosen = Mahasiswa::create([
            'user_id' => $user_mhs->id,
            'name_mahasiswa' => $request->name_mahasiswa,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
        ]);


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
            'name_mahasiswa' => 'required',
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
            'name_mahasiswa' => $request->name_mahasiswa,
            'kelas_id' => $request->kelas_id,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
        );

        $mahasiswa = Mahasiswa::find($request->hidden_id);
        $mahasiswa->name_mahasiswa = $request->name_mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->user->email = $request->email;
        $mahasiswa->push();

        // Mahasiswa::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Mahasiswa $mahasiswa, $id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->delete();
    }
}
