@extends('layouts.master')

{{-- Link Link --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
{{-- <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css"> --}}
<link rel="stylesheet" href="{{asset('css/custom.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title')
    <title>Rekapan Absen Mahasiswa | Presensi Teknik Elektro</title>
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 table-responsive bdr">
                <form method="POST" action="{{ route('absen.store') }}">
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col" class=" border border-slate-600 py-3 px-6">
                                    No
                                </th>
                                <th scope="col" class="border border-slate-600 py-3 px-6">
                                    Nama Matakuliah
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
                                        {{ $item->jadwal->matakuliah->name_matakuliah }}
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

    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    @endsection
