@extends('layouts.master')

{{-- Link Link --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 table-responsive bdr">
                <form method="POST" action="{{ route('absen.store') }}">
                    <table class="table table-striped">
                        <h3>
                           Matakuliah {{$jadwal->matakuliah->name_matakuliah}} Kelas {{$jadwal->kelas->name_kelas}}
                        </h3>
                        <thead class="">
                            <tr>
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Pertemuan
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Keterangan
                                </th>
                         </tr>
                        </thead>
                        <tbody>
                            @foreach ($absen as $item)
                                <tr class="">
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $item->mahasiswa[0]->name_mahasiswa }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->pertemuan }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $item->keterangan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script></script>
@endsection
