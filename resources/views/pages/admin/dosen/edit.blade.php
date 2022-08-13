@extends('layouts.master')

{{-- Link Link --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Dosen </h6>
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12 table-responsive">
                <h1>HEHEHEHEHHEHE</h1>
                <form action="{{ route('dosen.update', $dosen) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" value="{{ $dosen->name }}">
                    <input type="text" name="nip" id="nip" value="{{ $dosen->nip }}">
                    <input type="text" name="username" id="username" value="{{ $dosen->user->name }}">
                    <input type="text" name="email" id="email" value="{{ $dosen->user->email }}">
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>

    </div>
@endsection
