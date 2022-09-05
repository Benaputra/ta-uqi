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
    <title>Rekapan Absen| Presensi Teknik Elektro</title>
@endsection

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Rekapan Absen Mata Kuliah {{ $jadwal->matakuliah->name_matakuliah }}
    </h6>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped table-bordered mahasiswa_datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Pertemuan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
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
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.mahasiswa_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('absen.index', $jadwal->id) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'nim',
                    name: 'nim'
                },
                {
                    data: 'mahasiswa_id',
                    name: 'mahasiswa_id'
                },
                {
                    data: 'pertemuan',
                    name: 'pertemuan'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'aksi',
                    name: 'aksi'
                },
            ]
        });
    });
</script>
