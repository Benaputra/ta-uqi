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
    <h6 class="m-0 font-weight-bold text-primary">Tabel Rekapan Absen Mata Kuliah {{$mataKuliah->name_matakuliah}}</h6>
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
                        <th>Sakit</th>
                        <th>Izin</th>
                        <th>Alpa</th>
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.mahasiswa_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('absen.matakuliah.index', $mataKuliah->id) }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'nim',
                    name: 'nim'
                },
                {
                    data: 'name_mahasiswa',
                    name: 'name_mahasiswa'
                },
                {
                    data: 'pertemuan',
                    name: 'pertemuan'
                },
                {
                    data: 'prodi_id',
                    name: 'prodi_id'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#create_record').click(function() {
            $('.modal-title').text('Form Tambah Data');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');

            $('#formModal').modal('show');
        });

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            var action_url = '';

            if ($('#action').val() == 'Add') {
                action_url = "{{ route('mahasiswa.store') }}";
            }

            if ($('#action').val() == 'Edit') {
                action_url = "{{ route('mahasiswa.update') }}";
            }

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: action_url,
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log('success: ' + data);
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success +
                        '</div>';
                        location.reload(true);
                        $('#sample_form')[0].reset();
                        $('#mahasiswa_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });

        $(document).on('click', '.edit', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $('#form_result').html('');

            $.ajax({
                url: "/admin/mahasiswa/edit/" + id + "/",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data) {
                    console.log('success: ' + data);
                    $('#nim').val(data.result.nim);
                    $('#name_mahasiswa').val(data.result.name_mahasiswa);
                    $('#kelas_id').val(data.result.kelas_id);
                    $('#prodi_id').val(data.result.prodi_id);
                    $('#email').val(data.result.email);
                    $('#hidden_id').val(id);
                    $('.modal-title').text('Form Edit Data');
                    $('#action_button').val('Update');
                    $('#action').val('Edit');
                    $('.editpass').hide();
                    $('#formModal').modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            })
        });

        var mahasiswa_id;

        $(document).on('click', '.delete', function() {
            $('.modal-title').text('Hapus Data');
            mahasiswa_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "/admin/mahasiswa/destroy/" + mahasiswa_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#mahasiswa_table').DataTable().ajax.reload();
                        location.reload(true);
                        alert('Data Deleted');
                    }, 200);
                }
            })
        });
    });
</script>
