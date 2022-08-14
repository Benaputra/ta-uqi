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
    <button type="button" name="create_record" id="create_record" class="btn btn-primary float-end" data-bs-toggle="modal"
        data-bs-target="#tambahDosen">Tambah Data</button>
    <h6 class="m-0 font-weight-bold text-primary">Dosen Tabel</h6>
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12 table-responsive bdr">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosens as $dosen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dosen->name }}</td>
                                <td>{{ $dosen->nip }}</td>
                                <td><a class="btn btn-warning btn-sm"
                                        href="{{ route('dosen.edit', ['id' => $dosen->id]) }}"><i
                                            class="bi bi-pencil-square"></i>Edit</a>
                                    <form action="{{ route('dosen.destroy', ['id' => $dosen->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dosen</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="tambahDosen" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form" class="form-horizontal" action="{{ route('dosen.store') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Form Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result"></span>
                            <div class="form-group">
                                <label>Username : </label>
                                <input type="text" name="username" placeholder="Username" id="username"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Nama Dosen : </label>
                                <input type="text" name="name" placeholder="Nama Dosen" id="name"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>NIP Dosen : </label>
                                <input type="text" name="nip" placeholder="Nomor Induk Pegawai" id="nip"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Email Dosen : </label>
                                <input type="email" name="email" placeholder="Email" id="email"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Password : </label>
                                <input type="password" name="password" placeholder="Password" id="password"
                                    class="form-control" />
                            </div>
                            <input type="hidden" name="action" id="action" value="Add" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="action_button" id="action_button" value="Add"
                                class="btn btn-info" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Konfirmasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin: 0;">Apakah anda yakin ingin menghapus data ini?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
