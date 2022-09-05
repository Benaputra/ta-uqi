@extends('layouts.master')

{{-- Link Link --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('title')
    <title>Edit Dosen | Presensi Teknik Elektro</title>
@endsection

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Dosen </h6>
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 table-responsive">
                <h1>Form Edit Data Dosen</h1>
                <form action="{{ route('dosen.update', $dosen) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input class="form-control" type="text" name="name_dosen" id="name_dosen"
                            value="{{ $dosen->name_dosen }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nip" id="nip" value="{{ $dosen->nip }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" id="username" value="{{ $dosen->user->name }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" id="email" value="{{ $dosen->user->email }}">
                    </div>
                    <button class="form-control btn btn-primary col-3" type="submit">Simpan</button>
                </form>
            </div>
        </div>

    </div>
@endsection
