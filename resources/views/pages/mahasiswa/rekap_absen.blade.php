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
                        <thead class="">
                            <tr>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Matakuliah
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Hadir
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Sakit
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Izin
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Tidak Hadir
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Total Pertemuan
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Status Kompen
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Surat Peringatan
                                </th>
                         </tr>
                        </thead>
                        <tbody>
                                <tr class="">
                                    <td class=" border border-slate-700 py-4 px-6">
                                        {{ $absen->first()->jadwal->matakuliah->name_matakuliah }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6" align="center">
                                        {{ $hadir }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6" align="center">
                                        {{ $sakit }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6" align="center">
                                        {{ $izin }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6" align="center">
                                        {{ $tidak_hadir }}
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{ $pertemuan }} Pertemuan
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{$kompen}} Jam
                                    </td>
                                    <td class="border border-slate-700 py-4 px-6">
                                        {{$sp}}
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script></script>
@endsection
