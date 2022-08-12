<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Dosen::select('id', 'name', 'nip')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                <a class="btn btn-warning" href="' . route('dosen.edit', $data->id) . '"><i class="bi bi-pencil-square"></i>Edit</a>
                <button type="buton" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i>Delete</button>';
                })
                ->make(true);
        }
        return view('pages.admin.dosen.index');
    }

    public function store(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'password' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $user_dosen = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $simpan_user = $user_dosen->assignRole('dosen');
        $dosen = Dosen::create([
            'user_id' => $user_dosen->id,
            'name' => $request->name,
            'nip' => $request->nip,
        ]);
        return response()->json(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit($id, User $user)
    {

        $dosen = Dosen::with('user')->find($id);
        // return $dosen->toJson();
        return view('pages.admin.dosen.edit', compact('dosen', 'user'));
    }

    public function update($id,Request $request)
    {
        $dosen = Dosen::find($id);
        $dosen->name = $request->name;
        $dosen->nip = $request->nip;
        $dosen->save();
        return "Meueheehehe";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen, $id)
    {
        $data = Dosen::findOrFail($id);
        $data->delete();
    }
}
