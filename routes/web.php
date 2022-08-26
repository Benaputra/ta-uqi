<?php

use App\Models\User;
use App\Models\Jadwal;
use App\Models\KelasKuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KelasKuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/adminkunya', function () {
    return "hheheeh";
});

Route::get('/dashboard', function (KelasKuliah $kelasMhs) {
    // $kelasMhs = User::with('kelasKuliah')
    // ->where('id','=',auth()->user()->id)
    // ->get();
    // // dd($kelasMhs);
    // // return $kelasMhs->toJson();

    $jadwal = DB::table('jadwals')
        ->join('matakuliahs', 'matakuliah_id', '=', 'matakuliahs.id')
        ->join('dosens', 'dosen_id', '=', 'dosens.id')
        ->join('kelas', 'kelas_id', '=', 'kelas.id')
        // ->join('semesters', 'semester_id', '=','semesters.id')
        ->select(
            'jadwals.*',
            'matakuliahs.name_matakuliah',
            'dosens.name_dosen',
            'kelas.name_kelas'
        )
        ->get();
    $kelasMhs = DB::table('kelas_kuliahs')
        ->join('mahasiswas', 'mahasiswa_id' , '=', 'mahasiswas.id')
        ->join('users', 'user_id' , '=', 'users.id')
        // ->where('mahasiswa.user_id', '=', auth()->user()->mahasiswa_id)
        ->select('mahasiswas.name_mahasiswa','users.id')
        ->get();

    return $kelasMhs->toJson();
    return view('dashboard', compact('jadwal'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


//Routing Prodi
Route::get('/admin/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::post('/admin/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/admin/prodi/edit/{id}', [ProdiController::class, 'edit']);
Route::post('/admin/prodi/update', [ProdiController::class, 'update'])->name('prodi.update');
Route::get('/admin/prodi/destroy/{id}/', [ProdiController::class, 'destroy']);

//Routing Ruangan
Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/admin/ruangan/edit/{id}', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::post('/admin/ruangan/update', [RuanganController::class, 'update'])->name('ruangan.update');
Route::get('/admin/ruangan/destroy/{id}/', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

//Routing Semester
Route::get('/admin/semester', [SemesterController::class, 'index'])->name('semester.index');
Route::post('/admin/semester', [SemesterController::class, 'store'])->name('semester.store');
Route::get('/admin/semester/edit/{id}', [SemesterController::class, 'edit']);
Route::post('/admin/semester/update', [SemesterController::class, 'update'])->name('semester.update');
Route::get('/admin/semester/destroy/{id}/', [SemesterController::class, 'destroy']);

//Routing Mahasiswa
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/admin/mahasiswa/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::get('/admin/mahasiswa/destroy/{id}/', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

//Routing Dosen
Route::get('/admin/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('/admin/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/admin/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('/admin/dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/admin/dosen/destroy/{id}/', [DosenController::class, 'destroy'])->name('dosen.destroy');

//Routing Kelas
Route::get('/admin/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::post('/admin/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/admin/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::post('/admin/kelas/update', [KelasController::class, 'update'])->name('kelas.update');
Route::get('/admin/kelas/destroy/{id}/', [KelasController::class, 'destroy'])->name('kelas.destroy');

//Routing Matakuliah
Route::get('/admin/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::post('/admin/matakuliah', [MatakuliahController::class, 'store'])->name('matakuliah.store');
Route::get('/admin/matakuliah/edit/{id}', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
Route::post('/admin/matakuliah/update', [MatakuliahController::class, 'update'])->name('matakuliah.update');
Route::get('/admin/matakuliah/destroy/{id}/', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');

//Route Jadwal
Route::get('/admin/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::post('/admin/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/admin/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::post('/admin/jadwal/update', [JadwalController::class, 'update'])->name('jadwal.update');
Route::get('/admin/jadwal/destroy/{id}/', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

//Route Absen
Route::get('/admin/absen', [AbsenController::class, 'index'])->name('absen.index');
Route::post('/admin/absen', [AbsenController::class, 'store'])->name('absen.store');
Route::get('/admin/absen/edit/{id}', [AbsenController::class, 'edit'])->name('absen.edit');
Route::post('/admin/absen/update', [AbsenController::class, 'update'])->name('absen.update');
Route::get('/admin/absen/destroy/{id}/', [AbsenController::class, 'destroy'])->name('absen.destroy');

//Route Kelas Mahasiswa
Route::get('/admin/kelaskuliah', [KelasKuliahController::class, 'index'])->name('kelaskuliah.index');
Route::post('/admin/kelaskuliah', [KelasKuliahController::class, 'store'])->name('kelaskuliah.store');
Route::get('/admin/kelaskuliah/edit/{id}', [KelasKuliahController::class, 'edit'])->name('kelaskuliah.edit');
Route::post('/admin/kelaskuliah/update', [KelasKuliahController::class, 'update'])->name('kelaskuliah.update');
Route::get('/admin/kelaskuliah/destroy/{id}/', [KelasKuliahController::class, 'destroy'])->name('kelaskuliah.destroy');

require __DIR__ . '/auth.php';
