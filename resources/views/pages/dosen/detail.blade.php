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
                                <th scope="col" class="py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    NIM
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <select class="form-control" name="pertemuan" id="pertemuan">
                                <option value="">Silahkan pilih pertemuan</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> --}}
                            <div class="row">
                                <div class="col-4">
                                    Pertemuan Terakhir {{$absen ? $absen->pertemuan : '0'}}
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="pertemuan" id="pertemuan">
                                </div>
                            </div>
                            @foreach ($kelasByMhs as $items)
                                <tr class="">
                                    <td class="py-4 px-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->mahasiswa->first()->nim }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $items->mahasiswa->first()->name_mahasiswa }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <form action="{{ route('absen.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id{{ $items->id }}"
                                                value="{{ $items->id }}">
                                            <label for="">Hadir</label>
                                            <input class=" {{ $items->id }}" type="radio"
                                                name="keterangan{{ $items->id }}" value="Hadir">
                                            <hr>
                                            <label for="">Sakit</label>
                                            <input class=" {{ $items->id }}" type="radio"
                                                name="keterangan{{ $items->id }}" value="Sakit">
                                            <hr>
                                            <label for="">Izin</label>
                                            <input class=" {{ $items->id }}" type="radio"
                                                name="keterangan{{ $items->id }}" value="Absen">

                                            <input type="hidden" name="mahasiswa_id{{ $items->id }}"
                                                value="{{ $items->mahasiswa->first()->id }}">
                                            <input type="hidden" name="dosen_id{{ $items->id }}"
                                                value="{{ auth()->id() }}">
                                    </td>
                                </tr>
                            @endforeach
                            <input type="hidden" name="jadwal_id" value="{{ $items->jadwal_id }}">
                        </tbody>
                    </table>
                    <hr>
                    <button
                        class=" justify-center float:left inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        type="submit">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script></script>
@endsection
