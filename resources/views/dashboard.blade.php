@extends('layouts.master')
@section('title')
    <title>Presensi Teknik Elektro</title>
@endsection
{{-- Link Link --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('header-table')
    @role('mahasiswa')
        <h6 class="m-0 font-weight-bold text-primary">Absensi Mahasiswa</h6>
    @endrole
    @role('dosen')
        <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
    @endrole
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 table-responsive bdr">

                @role('mahasiswa')
                    <table
                        class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    Kode Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Hari
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Jam
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getKelasMhs as $item)
                                <tr class="">
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->matakuliah->kode_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->matakuliah->name_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->hari }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_selesai }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        <a href="{{ url('dashboard/show_rekap_mhs/'.$item->jadwal->id) }}">
                                            <button class="form-control btn btn-success">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endrole

                @role('dosen')
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kode Matakuliah
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Matakuliah
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Program Studi
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Semester
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Hari
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Jam
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Ruangan
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Detail
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Rekapan Absensi
                                </th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getKelasDosen as $items)
                                <tr class="">
                                    <td class="py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->matakuliah->kode_matakuliah }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->matakuliah->name_matakuliah }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->prodi->name_prodi }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->semester->name_semester }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->hari }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->jam_mulai }} - {{ $items->jam_selesai }}

                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->ruangan->name_ruangan }}

                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="{{ route('dashboard_showKelas', ['id' => $items->id]) }}">
                                            <button class="form-control btn btn-success">Detail</button>
                                        </a>
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        <a href="{{ url('dashboard/show_rekap_dsn/'. $items->id) }}">
                                            <button class="form-control btn btn-success">Rekapan</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endrole
            </div>
        </div>
    </div>

    <script></script>
@endsection
