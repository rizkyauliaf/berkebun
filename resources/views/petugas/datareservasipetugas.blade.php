@extends('layoutpetugas.master')
@section('content')
@include('layoutpetugas.navbar')
@include('layoutpetugas.sidebar')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DATA RESERVASI</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="">Pilih Paket :</label>
                <select name="id_paket" id="id_paket" class="form-control">
                    @foreach ($paket as $data)
                    <option value="{{$data->id_paket}}">{{$data->nama_paket}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary mt-4" id="btnFilter">FILTER</button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pesan</th>
                        <th>Tanggal Pesan</th>
                        <th>Jenis Paket</th>
                        <th>Jumlah Orang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function() {

        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('datareservasipetugas') }}",
                data: function(d) {
                    d.id_paket = $('#id_paket').val()
                }
            },
            paginate: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_pesan',
                    name: 'nama_pesan'
                },
                {
                    data: 'tgl_pesan',
                    name: 'tgl_pesan'
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket'
                },
                {
                    data: 'jumlah_pesan',
                    name: 'jumlah_pesan'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#btnFilter').click(function() {
            table.draw();
        });
    });

    function Konfirmasicetak($id) {
        Swal.fire({
            title: 'Apakah Anda Yakin Akan Mencetak Data Ini?',
            // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location.href = "{{ url('petugascetak') }}/" + $id;
            }
        })
    }
</script>
@endsection