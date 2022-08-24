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
    <button type="button" name="create_record" id="create_record" class="btn btn-primary float-end">Tambah Data</button>
    <h6 class="m-0 font-weight-bold text-primary">Kelas Mahasiswa Tabel</h6>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered kelaskuliah_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mahasiswa ID</th>
                            <th>Jadwal ID</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="sample_form" class="form-horizontal">
                    <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Form Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <div class="form-group">
                            <label>Tahun Ajaran : </label>
                            <input type="text" name="tahun_ajaran" placeholder="Nomor Induk Mahasiswa" id="tahun_ajaran" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>NIM Mahasiswa : </label>
                            <select class="form-select" name="mahasiswa_id" id="mahasiswa_id">
                                <option value="">Silahkan pilih NIM Mahasiswa</option>
                                @foreach ($mahasiswa as $item)
                                    @if (old('mahasiswa_id') == $item->id)
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->nim }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jadwal : </label>
                            <select class="form-select" name="jadwal_id" id="jadwal_id">
                                <option value="">Silahkan pilih matakuliah</option>
                                @foreach ($jadwal as $item)
                                    @if (old('jadwal_id') == $item->id)
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->hari }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="action_button" id="action_button" value="Add" class="btn btn-info" />
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.kelaskuliah_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kelaskuliah.index') }}",
            columns: [
                {data : 'id', name: 'id'},
                {data : 'mahasiswa_id', name: 'mahasiswa_id'},
                {data : 'jadwal_id', name: 'jadwal_id'},
                {data : 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#create_record').click(function(){
            $('.modal-title').text('Form Tambah Data');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');

            $('#formModal').modal('show');
        });

        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action').val() == 'Add')
            {
                action_url = "{{ route('kelaskuliah.store') }}";
            }

            if($('#action').val() == 'Edit')
            {
                action_url = "{{ route('kelaskuliah.update') }}";
            }

            $.ajax({
                type: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: action_url,
                data:$(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log('success: '+data);
                    var html = '';
                    if(data.errors)
                    {
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if(data.success)
                    {
                        html = '<div class="alert alert-success">' +data.success + '</div>';
                        location.reload(true);
                        $('#sample_form')[0].reset();
                        $('#kelaskuliah_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });

        $(document).on('click', '.edit', function(event){
            event.preventDefault();
            var id = $(this).attr('id');
            $('#form_result').html('');

            $.ajax({
                url :"/admin/kelaskuliah/edit/"+id+"/",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType:"json",
                success:function(data)
                {
                    console.log('success: '+data);
                    $('#tahun_ajaran').val(data.result.tahun_ajaran);
                    $('#prodi_id').val(data.result.prodi_id);
                    $('#mahasiswa_id').val(data.result.mahasiswa_id);
                    $('#matakuliah_id').val(data.result.matakuliah_id);
                    $('#kelas_id').val(data.result.kelas_id);
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

        var kelaskuliah_id;

        $(document).on('click', '.delete', function(){
            $('.modal-title').text('Hapus Data');
            kelaskuliah_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url:"/admin/kelaskuliah/destroy/"+kelaskuliah_id,
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    setTimeout(function(){
                        $('#confirmModal').modal('hide');
                        $('#kelaskuliah_table').DataTable().ajax.reload();
                        location.reload(true);
                        alert('Data Deleted');
                    }, 200);
                }
            })
        });
    });
</script>
